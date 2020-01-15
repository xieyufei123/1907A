<?php


namespace App\Http\Controllers;
use App\LoginModel;
use Illuminate\Http\Request;


class Checklogin extends Controller
{
    public function index(){
        return view('admin.checklogin.Checklogin');
    }


    public function do(Request $request){
        $post = $request ->except('_token');
        $user = LoginModel::where($post)->first();
        if($user){
            session(['admin'=>$user]);
            request()->session()->save();
            return redirect('/goods');

        }
    }


    public function logout(){
        session(['admin'=>null]);
        request()->session()->save();
        return redirect('/checklogin');
    }
}