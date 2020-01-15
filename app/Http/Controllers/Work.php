<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkModel;
class Work extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $wname = request()->wname??'';
        $where = [];
        if($wname){
            $where[] = ['wname','like',"%$wname%"];
             $data = WorkModel::where($where)->orderBy('wid','desc')->paginate(2);
//        接收全部值
        $query = request()->all();
        return view('admin.work.index',['data'=>$data,'query'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $post=$request ->except('_token');
   //    dd($post);
      //$res=DB::table('brand')->insert($post);
            //文件上传
     if($request->hasFile('w_pic')){
       $post['w_pic'] =$this->upload('w_pic');
} 

      //可以用create,save,insert进行添加。但是save需要实例化，指向最后才可以用save
      $res=WorkModel::insert($post);
      if($res){
        return  redirect('/work');
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
         $data=WorkModel::find($id);
        return view('admin.work.edit',['data'=>$data]);
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
         $res=WorkModel::where('wid',$id)->update($post);
          if($res !==false){
            return redirect('/work');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $res=WorkModel::destroy($id);
       if($res){
            return redirect('/work');
        }
    }
}
