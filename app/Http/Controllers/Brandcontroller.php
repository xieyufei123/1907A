<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;
//use App\Http\Requests\StoreBlogPost;
class Brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *展示一个资源的列表（列表页）
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //Cookie::queue('test','aaa',1);
       // echo Cookie::get('test');die;
       
       
       // // cache 门面
       //  Cache::put('key', 'value', $seconds);//存储
       //  Cache::put('key');//获取
       //  Cache::forget('key');//删除
       //  //全局辅助函数
       //  cache(['key' => 'value'], $seconds);//存储
       // $value = cache('key');cache(['key' => 'value'], $seconds);//获取




      $brand_name = request()->brand_name??'';
        $brand_desc = request()->brand_desc ?? '';
        $page = request()->page?:1;
//        echo 'brand_'.$page.'_'.$brand_name;
//        $data必须要和查询数据库的变量一致
        $data = Cache::get('brand_'.$page.'_'.$brand_name.'_'.$brand_desc);//获取
//        dump($data);
        if(!$data) {

            $where = [];
            if ($brand_name) {
                $where[] = ['brand_name', 'like', "%$brand_name%"];
            }

            if ($brand_desc) {
                $where[] = ['brand_desc', 'like', "%$brand_desc%"];
            }
//        DB::connection()->enableQueryLog();
//        $data = DB::table('brand')->orderBy('brand_id','desc')->paginate(2);
            $data = Brand::where($where)->orderBy('brand_id', 'desc')->paginate(2);
            Cache::put('brand_'.$page.'_'.$brand_name.'_'.$brand_desc, $data, 60); //存储
        }
//        $data = DB::table('brand')->orderBy('brand_id','desc')->paginate(2);
      
//        接收全部值
        $query = request()->all();
        if(request()->ajax()){
            return view('admin.brand.ajaxindex',['data'=>$data,'query'=>$query]);
        }else{
            return view('admin.brand.index',['data'=>$data,'query'=>$query]);
        }
       
    }
    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加页面
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //第一种验证
        $validatedData = request()->validate([
          'brand_name' => 'required|unique:brand|max:255|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
          'brand_url' => 'required',
          // 'body' => 'required',
        ],
        [
            'brand_name.required'=>"品牌名称不能为空",
           'brand_name.regex'=>'品牌名称必须是中文字母数字下划线组成！',
            'brand_name.unique'=>'品牌名字不能重复',
            'brand_url.required'=>'品牌地址不能为空',
        ]
      );


        //except排除谁谁谁，如果排除多个用数组
        //例如【'_token','brand_name']
        //only表示只接受谁谁谁
        $post=$request ->except('_token');




        // //第三种
        // $validator = Validator::make($post, [
        // //    'brand_name' => 'required|unique:brand|max:255',
        // //     'brand_name' => [
        // //         'required',
        // //         'unique:brand',
        // //         'max:255',
        // //         'regex:/^[\x{4e00}-\x{9fa5}]+$/u',
        // //     ],
        // //     'brand_url' => 'required',
        // // ],[
        // //     'brand_name.required'=>'品牌名称必填！',
        // //     'brand_name.regex'=>'品牌名称必须是中文字母数字下划线组成！',
        // //     'brand_name.unique'=>'品牌名称已存在！',
        // //     'brand_url.required'=>'品牌网站必填！',
        // // ]);
        // if ($validator->fails()) {
        //     return redirect('brand/create')
        //         ->WITH('data',$post)
        //         ->withErrors($validator)
        //         ->withInput();
        // }
      // dd($post);
      //$res=DB::table('brand')->insert($post);
            //文件上传
     if($request->hasFile('brand_logo')){
       $post['brand_logo'] =$this->upload('brand_logo');
}

      //可以用create,save,insert进行添加。但是save需要实例化，指向最后才可以用save
      $res=Brand::create($post);
      //$brand=new Brand();
      //$brand->brand_name=$post['brand_name'];
      //$brand->brand_url=$post['brand_url'];
      //$brand->brand_desc=$post['brand_desc'];
      //$res=$brand->save();


       if($res){
        //redirect实现跳转
            return redirect('/brand');
           }
       }

       //单个文件上传
       public function upload($filename){
        //request()全局辅助函数
        if (request()->file($filename)->isValid()) {
            //接收的文件
            $photo = request()->file($filename);
        //保存的文件
        $store_result = $photo->store('uploads');
        return  $store_result;
        exit('没有文件上传，或者文件上传失败');
       }
}
    /**
     * Display the specified resource.
     *详情页展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DB的话用first获取单个模型
       // $data=DB::table('brand')->where('brand_id',$id)->first();
       $data=Brand::find($id);
        return view('admin.brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //可以用all,post，input来接受所有的值
        $post=$request->except('_token');
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        $res=Brand::where('brand_id',$id)->update($post);
          //$brand=new Brand();
      //$brand->brand_name=$post['brand_name'];
      //$brand->brand_url=$post['brand_url'];
      //$brand->brand_descj=$post['brand_desc'];
      //$res=$brand->save();
        if($res !==false){
            return redirect('/brand');
        }
        //dd($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //$res=DB::table('brand')->where('brand_id',$id)->delete();
      $res=Brand::destroy($id);
       if($res){
            return redirect('/brand');
        }
    }
    public  function checkOnly(){
        $brand_name = request()->brand_name;
        $where = [];
        if($brand_name){
          $where['brand_name']  = $brand_name;
        }
        $count=Brand::where($where)->count();
        echo inval($count);
        // echo $brand_name;
    }
}
