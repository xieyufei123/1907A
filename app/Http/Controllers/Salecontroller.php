<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleModel;

class Salecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=SaleModel::get();

        return view('admin.sale.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
           if($request->hasFile('img')){
       $post['img'] =$this->upload('img');
}
        $res=SaleModel::insert($post);
        if($res){
            return redirect('/sale');
        }
    }
   public function upload($filename){
        if ( request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $res=SaleModel::destroy($id);
       if($res){
        if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
            return redirect('/sale');
        }
    }
    public function xiangqing($id){
        $data = SaleModel::find($id);
        return view('admin.sale.xiangqing',['data'=>$data]);
    }
}
