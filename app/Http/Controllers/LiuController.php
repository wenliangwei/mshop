<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class LiuController extends Controller
{
    
    public function login()
    {
    	return view('liu/login');
    }
    public function login_do()
    {
    	$register_name = request()->register_name;
    	// dd($register_name);
    	$register_pwd = request()->register_pwd;
    	$res = DB::table('register')->where('register_name',$register_name)->where('register_pwd',$register_pwd)->first();
    	if($res){
    		session(['register_id'=>$res->register_id]);
    		// dd(session('register_id'));
    		return redirect('/liu/add');
    	}
    }
    public function add()
    {
    	// redis缓存
    	$redis=new \Redis();
    	$redis->connect('127.0.0.1','6379');
        $num=$redis->incr('num');
        // dd($num);
        echo "浏览量：$num<br/>";

        $query = request()->all();
        $data = DB::table('liu')->first();


    	return view('liu/add',['data'=>$data]);
    }
    public function add_do(Request $request)
    {
    	$data = request()->all();
    	$register_name = session('register_name');
    	$data['add_time'] = time();
    	// dd($register_name);

    	// $re = DB::table('register')->where('register_name',$register_name)->first();
    	unset($data['_token']);
    	// $info = DB::table('liu')->insert([
    	// 	// 'name'=>$register_name,
    	// 	'yan'=>$data,
    	// 	'add_time'=>time()
    	// ]);
    	$info = DB::table('liu')->insert($data);
    	// dd($info);
    	if($info){
    		return redirect('liu/add');
    	}
    }
}
