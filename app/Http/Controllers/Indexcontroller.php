<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Indexcontroller extends Controller
{
    public function test(){
    	$name="肖战";
    	return view('hello',['name'=>$name]);
    }

    public function dologin(){
    	$post = request()->all();
    	dd($post);
    }
     public function login(){
    	$post = request()->all();
    	  	dump($post);
    return view('login');
    }
    public function goods($id){
    	echo 'id是'.$id;
    }
     public function getgoods($id,$goods_name='肖战'){
    	echo 'id是'.$id;
    	echo 'name是'.$goods_name;
    }
}
