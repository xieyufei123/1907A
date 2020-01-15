<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewModel;
use App\Fenlei;
use DB;

class Newcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=NewModel::get();
        $nname=request()->nname??'';
       $page=request()->page?:1;
       $data=cache('data_'.$page.'_'.$nname);
        if(!$data){
            echo '走数据库';
         $where=[];
        if($nname){
            $where[]=['nname','like',"%$nname%"];
        }
        $data=DB::table('new')->where($where)->paginate(3);

   cache(['data_'.$page.'_'.$nname=>$data],40);
     }
    //     $nname=session('admin')['nname'];
    //     // $result=$this->memcache();
    //     // dd($result);
    //     // dd($user_name);
     $query=request()->all();
         return view('admin.new.index',['data'=>$data,'nname'=>$nname,'query'=>$query]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //无限极分类
        // //aa();
        $data=Fenlei::get();
         // $data=NewModel::get();
        // $data=Tree($data);
        //dump($data);
        return view('admin.new.create',['data'=>$data]);
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
           $post['ctime']=time();
       $res=NewModel::create($post);
       if($res){
           return redirect('/new');
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
}
