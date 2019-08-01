<?php

namespace App\Http\Controllers\Che;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CheController extends Controller
{
    //
    public function add()
    {
    	return view('/che/add');
    }
    public function add_do(Request $request)
    {
    	$data = $request->except(['_token']);
        $info = DB::table('che')->insert($data);
        if($info){
        	return redirect('che/list');
        }
    }
    public function list()
    {
    	$redis = new \Redis();
        $redis->connect('127.0.0.1','6379');

         //搜索
        $query=request()->all();
        if(!empty($query['dian']) || !empty($query['dao'])){
            $redis->incr('num');
            $num=$redis->get('num');
            echo "访问".$num."次"."<br/>";
        }

    	// dd($query);
        $where = [];
        if($query['dian']??''){
            $where[] = ['dian','like',"%$query[dian]%"];
        }
        if($query['dao']??''){
            $where[] = ['dao','like',"%$query[dao]%"];
        }
        $data = DB::table('che')->where($where)->orderBy('id','desc')->paginate(4);
        // dd($data);
    	return view('/che/list',['data'=>$data,'query'=>$query]);
    }
    public function edit($id)
    {
       $data = DB::table('che')->where(['id'=>$id])->decrement('number',1);
       if($data){
        return redirect('che/list');
       }
    }
}
