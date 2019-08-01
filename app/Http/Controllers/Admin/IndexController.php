<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
	//后台首页
    public function index()
    {
    	return view('admin/index');
    }
    // 注册
    public function register(){
        return view('admin/register');
    }
    //注册执行
    public function register_do(Request $request){
        $data = $request->except(['_token']);
        $info = DB::table('register')->insert($data);
        if($info){
            return redirect('admin/login');
        }
    }
    //登录
    public function login(){
        return view('admin.login');
    }
    //登录执行
    public function login_do(){
        $register_name = request()->register_name;
        $register_pwd = request()->register_pwd;
        $res = DB::table('register')->where('register_name',$register_name)->where('register_pwd',$register_pwd)->first();
        if($res){
            session(['register_id'=>$res->register_id]);
            //dd(session('register_id'));
            return redirect('admin/index');
        }
    }
    //用户
    public function user(){
        return view('admin/user');
    }
    //用户添加执行
    public function user_do(Request $request){
        $data = $request->except(['_token']);
        // dd($data);
        $data['reg_time'] = time();
        // dd($data);
        $res = DB::table('user')->insert($data);
        if($res){
            return redirect('admin/user_list');
        }
    }
    //用户列表
    public function user_list()
    {
        $query = request()->all();
        $data = DB::table('user')->paginate(3);

        return view('admin/user_list',['data'=>$data]);
    }
    //用户删除
    public function user_del(Request $request)
    {
        $id = $request->all();
        $data = DB::table('user')->where(['id'=>$id])->delete();
        if($data){
            return redirect('admin/user_list');
        }
    }
    //商品添加
    public function goods_add()
    {
    	return view('admin.goods_add');
    }
    //商品执行
    public function goods_adddo(Request $request)
    {
    	$data=$request->all();
        //上传图片
        $path = $request->file('g_img')->store('gods');
        //拼接路径
        $g_img=asset('storage'.'/'.$path);
        // dd($g_img);
        $data['g_img']=$g_img;
        //添加时间
        $data['g_time']=time();
        unset($data['_token']);
        $res=DB::table('gods')->insert($data);
        // dd($res);
        if ($res){
            return redirect('admin/goods_list');
        }
    }
    //商品展示
    public function goods_list()
    {
    	//redis缓存
    	// $redis=new \Redis();
    	// $redis->connect('127.0.0.1','6379');
        //$num=$redis->incr('num');
        //echo $num."<br/>";

    	$query = request()->all();
    	// dd($query);
        $where = [];
        if($query['g_name']??''){
            $where[] = ['g_name','like',"%$query[g_name]%"];
        }
        $data = DB::table('gods')->where($where)->orderBy('g_id','desc')->paginate(4);
        // dd($data);
        // $data = DB::orderBy('g_time','desc')->get();

    	return view('admin.goods_list',['data'=>$data,'query'=>$query]);
    }
    //商品删除
    public function goods_del($g_id){
        $data = DB::table('gods')->where(['g_id'=>$g_id])->delete();
        if($data){
            return redirect('admin/goods_list');
        }
    }
    //商品修改
    public function goods_edit($g_id){
    	$data = DB::table('gods')->where('g_id',$g_id)->first();
    	// dd($data);
    	return view('/admin/goods_edit',['data'=>$data]);
    }

    public function goods_edit_do(Request $request,$g_id){
        $data = $request->all();
        // dd($data);
        if(isset($data['g_img'])){
            $path = $request->file('g_img')->store('gods');
            //拼接路径
            $g_img=asset('storage'.'/'.$path);
            // dd($g_img);
            $data['g_img']=$g_img;
            // dd($data);
        }
        unset($data['_token']);
        $data['g_time']=time();
        // dd($data);
        $where=[
            'g_id'=>$data['g_id'],
        ];
        $res=DB::table('gods')->where($where)->update($data);
        // dd($res);
        if ($res){
            // echo 13212;     
            return redirect('admin/goods_list');
        }else{
            echo '失败';   
        }
    }
}
