<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bname=request()->bname?? '';
        $where=[];
        if($bname) {
            $where[] = ['bname', 'like', "%$bname%"];
        }
        $data=Book::where($where)->orderBy('id','desc')->paginate(2);
        $query=request()->all();
        return view('admin.book.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
         'bname' => 'required|unique:book|max:255',
            'man' => 'required',
            //'body' => 'required',
       ],[
           'bname.required'=>"商品名字不能为空",
            'man.required'=>"作者不能为空",
           'bname.unique'=>'商品名字不能重复',

       ]);
        $post=$request ->except('_token');
        if($request->hasFile('face')){
            $post['face'] =$this->upload('face');

        }

        $res=Book::insert($post);
        if($res){

            return redirect('/book');
        }
    }
    public function upload($filename){

        if (request()->file($filename)->isValid()) {
              //接受文件
            $photo = request()->file($filename);
            //上传文件
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
        //
    }
    public function sendemail()
    {
//        收件人
        Mail::to('1683587578@qq.com')->send(new SendCode());
    }
}
