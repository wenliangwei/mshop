<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
	//注册
  	public function register(){
  		return view('login.register');
  	}
  	//注册执行
  	public function register_do(Request $request){
        $data = $request->except(['_token']);
        $info = DB::table('register')->insert($data);
        if($info){
            return redirect('login/login');
        }
    }
    // 登录
    public function login(){
  		return view('login.login');
  	}
  	// 登录执行
  	public function login_do(Request $request){
        $res = $request->all();
       // $register_name = request()->register_name;
       // $register_pwd = request()->register_pwd;
        $res = DB::table('register')->where('register_name',$res['register_name'])->where('register_pwd',$res['register_pwd'])->first();
        // dd($res);
        if($res){
            session(['register_id'=>$res->register_id,'register_name'=>$res->register_name]);
            //dd(session('register_id'));
             return redirect('/liu/add');
        }
    }
}
