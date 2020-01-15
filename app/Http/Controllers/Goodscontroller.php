<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsModel;
use App\CateModel;
use App\Brand;
use DB;
use App\CartModel;
use Illuminate\Support\Facades\Redis;
class Goodscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //    $data=GoodsModel::get();
     //    $goods_name=request()->goods_name??'';
     //    $where=[];
     //    if($goods_name){
     //    $where[]=['goods_name','like',"%goods_name%"];
     // }
     //    $goods_price=request()->goods_price??'';
     // if($goods_price){
     //    $where[]=['goods_price','=',$goods_price];
     // }
     // $data = GoodsModel::where($where)->orderBy('gid','desc')->paginate(2);
     // //        接收全部值
      
     //    if(request()->ajax()){
     //        return view('admin.goods.ajaxindex',['data'=>$data,'query'=>$query]);
     //    }
     //        return view('admin.goods.index',['data'=>$data,'query'=>$query]);
          $query = request()->all();
       $pageSize=config('app.pageSize');
       $data=GoodsModel::select('goods.*','brand.brand_name','category.cate_name')
       ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
       ->leftjoin('category','goods.cate_id','=','category.cate_id')
       ->paginate($pageSize);
      //dd($data);
       return view('admin.goods.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::get();
        $cate=CateModel::get();
        $cate=createTree($cate);
        // dd($cate);
        // dd($brand);
        return view('admin.goods.create',['brand'=>$brand,
            'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //第一种验证
        // $validatedData = request()->validate([
        //   'goods_name' => 'required|unique:goods|max:255',
        //   'goods_price' => 'required',
        //   // 'body' => 'required',
        // ],
        // [
        //     'goods_name.required'=>"goods_name is null",
           
        //     'goods_price.required'=>'goods_price is null',
        // ]
      //);
        $post = $request -> except('_token');
//        单文件上传
        if($request->hasFile('goods_img')){
            $post['goods_img'] = upload('goods_img');
        }
//        多文件上传
        if(isset($post['goods_imgs'])){
            $post['goods_imgs'] = moreupload('goods_imgs');
            $post['goods_imgs'] = implode('|',$post['goods_imgs']);
        }
        $post['add_time'] = time();
        $post['update_time'] = time();


        $res = GoodsModel::insert($post);
        if($res){
            return redirect('/goods');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //访问量
        $res=Redis::setnx('show_'.$id,1);//之前没有访问 初始化1
      if(!$res){
        Redis::incr('show_'.$id);
      }
    
       $current=Redis::get('show_'.$id);

         $data = GoodsModel::find($id);
        return view('admin.goods.show',['goods'=>$data,'current'=>$current]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



         $data=GoodsModel::find($id);
        return view('admin.goods.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $post=$request->except('_token');
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        $res=Goods::where('gid',$id)->update($post);
         if($res !==false){
            return redirect('/goods');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $res=GoodsModel::destroy($id);
       if($res){
        if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
            return redirect('/goods');
        }
    }
    // //添加购物车
    public function addcart(){
        $gid=request()->gid;
        $buy_number=1;
       //判断用户是否登录
      if(!$this->islogin()){
            // echo json_encode(['code'=>'00001','msg'=>'未登录，请登陆']);die;
      
      //未登录存入cookie
      
    }
    //登录存入db
    $this->addDBcart($gid,$buy_number);
}
public function addDBcart($gid,$buy_number){
    
    //求商品信息
    $goods=GoodsModel::where('gid',$gid)->first();
    //dd($goods);die;
    //判断库存
    if($goods->goods_num<$buy_number){
         echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
    }
    $user_id=session('admin')->user_id;
    //dd($user_id);die;
    //判断是否用户之间购买过
    $cart=CartModel::where(['goods_id'=>$gid,'user_id'=>$user_id])->first();
    //dd($cart);die;
    if($cart){
        //更新购买数量
        
 //判断库存
    if($cart->buy_number+$buy_number>$goods->goods_num){
         echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
    }

        $res = CartModel::where(['goods_id'=>$gid,'user_id'=>$user_id])->increment('buy_number');
        if($res){echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;}

    }
    //没有购买够则正常添加数据
    
    //求价格
   $goods_price= GoodsModel::where('gid',$gid)->value('goods_price');
    $data=[
        'user_id'=>$user_id,
        'goods_id'=>$gid,
        'buy_number'=>1,
        'addtime'=>time(),
        'goods_price'=>$goods->goods_price,

    ];
    $res = CartModel::create($data);
    //dd($data);
    if($res){
        echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
    }
}
    public function islogin(){
        $user=session('admin');
       if(!$user){
        return false;
       } 
       return true;
    }
}
