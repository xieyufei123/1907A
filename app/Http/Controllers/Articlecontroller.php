<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleModel;
use DB;
class Articlecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title = request()->title??'';
        $where = [];
        if($title){
            $where[] = ['title','like',"%$title%"];
        }
        // $class request()->class??'';
        //   if($class){
        //     $where[] = ['class','=','class'];
        // }
         $query = request()->all();
        $data=ArticleModel::where($where)->paginate(2);
          return view('admin.article.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *b
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        if(request()->hasFile('a_img')){
       $post['a_img'] =$this->upload('a_img');
    }
    $post['add_time']=time();
    
          $validatedData = request()->validate([
          'title' => 'required|unique:article|max:255',
          
          
        ],
        [
            'title.required'=>"文章标题必填",
            'title.unique' => '文章标题已存在！',
            
        ]
      );
    
        
       $res=ArticleModel::create($post);
       if($res){
           return redirect('/article');
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
         }
        exit('没有文件上传，或者文件上传失败');
      
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data=ArticleModel::find($id);
        return view('admin.article.edit',['data'=>$data]);    }

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
        $res=ArticleModel::where('article_id',$id)->update($post);
          //$brand=new Brand();
      //$brand->brand_name=$post['brand_name'];
      //$brand->brand_url=$post['brand_url'];
      //$brand->brand_descj=$post['brand_desc'];
      //$res=$brand->save();
        if($res !==false){
            return redirect('/article');
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
   
       //   $res=DB::table('article')->where('article_id','=',$id)->delete();
     $res= ArticleModel::destroy($id);
       if($res){
        if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
            return redirect('/article');
        }
    }
}
