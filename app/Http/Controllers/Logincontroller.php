<?php


namespace App\Http\Controllers;
use App\LoginModel;
use Illuminate\Http\Request;


class Logincontroller extends Controller
{
    public function index(){
        return view('admin.login.index');
    }


    public function do(Request $request){
        $post = $request ->except('_token');
        $user = LoginModel::where($post)->first();
        if($user){
            session(['admin'=>$user]);
            request()->session()->save();
            return redirect('/message');

        }
    }


    public function logout(){
        session(['admin'=>null]);
        request()->session()->save();
        return redirect('/login');
    }
}