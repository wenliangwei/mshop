<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GoodsController extends Controller
{
    //添加
    public function add(){
    	return view('goods.add');
    }
    public function add_do(Request $request){
    	$data = request()->all();
    	// dd($data);
    	$file = $request->file('goods_file')->store('goods');
    	$goods_file = asset('storage'.'/'.$file);
    	// dd($goods_file);
    	$data['goods_file'] = $goods_file;
    	$data['goods_time'] = time();
    	unset($data['_token']);
    	$info = DB::table('goods')->insert($data);
    	// dd($info);
    	if($info){
    		return redirect('goods/list');
    	}
    }
    public function list()
    {
    	// redis缓存
    	$redis=new \Redis();
    	$redis->connect('127.0.0.1','6379');
        $num=$redis->incr('num');
        // dd($num);
        echo "访问人数：$num<br/>";

    	$query = request()->all();
    	// dd($query);
        $where = [];
        if($query['goods_name']??''){
            $where[] = ['goods_name','like',"%$query[goods_name]%"];
        }
        $data = DB::table('goods')->where($where)->orderBy('goods_id','desc')->paginate(4);
        // dd($data);

    	return view('goods/list',['data'=>$data,'query'=>$query]);
    }
    
    public function del($goods_id)
    {
        $res=DB::table('goods')->where('goods_id','=',$goods_id)->delete();
        //dd($res);
        if ($res) {
            return redirect('/goods/list');
        }
    }

    public function edit($goods_id){
    	$data = DB::table('goods')->where('goods_id',$goods_id)->first();
    	// dd($data);
    	return view('/goods/edit',['data'=>$data]);
    }
    public function edit_do(Request $request,$goods_id){
        $data = $request->all();
        if(isset($data['goods_file'])){
            $path = $request->file('goods_file')->store('goods');
            //拼接路径
            $goods_file=asset('storage'.'/'.$path);
            $data['goods_file']=$goods_file;
        }
        unset($data['_token']);
        $data['goods_time']=time();
        $where=[
            'goods_id'=>$data['goods_id'],
        ];
        $res=DB::table('goods')->where($where)->update($data);
        if ($res){
            // echo 13212;     
            return redirect('/goods/list');
        }else{
            echo '失败';   
        }
    }
}