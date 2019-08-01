
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function add(){
    	 return view('/student/add');
    }
    public function add_do(Request $request){
    	$info=$request->except(['_token','id']);

    	$validator = \Validator::make($request->all(), [
            'stu_name' => 'required|unique:student|max:5',
          	'stu_age' => 'required'
        ],
        [
            'stu_name.required'=>'学生名必填',
            'stu_name.unique'=>'学生名已存在',
            'stu_name.max'=>'学生名称长度5位以内',
            'stu_age.required'=>'学生年龄必填'
        ]);
        if ($validator->fails()) {
            return redirect('student/add')->withErrors($validator)->withInput();
        }
    	// dd($data);
    	$data = DB::table('student')->insert($info);
    	if($data){
    		return redirect('student/list');
    	}else{
    		return error('添加失败','student/add');
    	}
    }
    public function list(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num = $redis->get('num');
        echo"访问人数：".$num;
    	// $pagesize=config('app.pageSize');
    	// $data = DB::table('student')->paginate(2);
        $query = request()->all();
        $where = [];
        if($query['stu_name']??''){
                $where[] = ['stu_name','like',"%$query[stu_name]%"];
        }
        $data = DB::table('student')->where($where)->orderBy('stu_id','desc')->paginate(3);
    	// dd($data);
    	 return view('/student/list',['data'=>$data,'query'=>$query]);
    }
    public function del($stu_id){
    	$data = DB::table('student')->where(['stu_id'=>$stu_id])->delete();
    	if($data){
    		return redirect('student/list');
    	}else{
    		return error('删除失败','student/list');
    	}
    }
    public function edit($stu_id){
        $data = DB::table('student')->where('stu_id',$stu_id)->first();
        return view('student/edit',['data'=>$data]);
    }
    public function edit_do(Request $request,$stu_id){
    	$data = $request->except(['_token']);
    	// dd($data);
        $res = DB::table('student')->where(['stu_id'=>$stu_id])->update($data);
        if($res){
            return redirect('student/list');
        }
    }
}
