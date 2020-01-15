<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('student')->paginate(2);
        return view('admin.student.index',['data'=>$data]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.student.create');
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
    //dd($post);
       $res=DB::table('student')->insert($post);
       //dd($res);
       if($res){
        //redirect实现跳转
        return redirect('/student');
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
          $data=DB::table('student')->where('student_id',$id)->first();
        return view('admin.student.edit',['data'=>$data]);
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
        $post=$request ->except('_token');
    //dd($post);
       $res=DB::table('student')->where('student_id',$id)->update($post);
       //dd($res);
       if($res!==false){
        //redirect实现跳转
        return redirect('/student');
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
        $res=DB::table('student')->where('student_id',$id)->delete();
         if($res){
            return redirect('/student');
        }
}
}
