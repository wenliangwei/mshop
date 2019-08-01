<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{	
	/** 首页 + 商品列表 */
    public function index()
    {
    	$data = DB::table('goods')->paginate(2);
    	// dd($data);
    	return view('index.index',['data'=>$data]);
    }
    /** 商品详情 */
    public function detail(){
    	$goods_id = request()->goods_id;
    	$data = DB::table('goods')->where(['goods_id'=>$goods_id])->get();
    	// dd($data);

		return view('index.detail',['data'=>$data]);
    }
    //商品详情---获取总价
    public function price(){
        $goods_id=request()->goods_id;
        $buy_num=request()->buy_num;
        $res=DB::table('goods')->where('goods_id',$goods_id)->get();
        $count=$res[0]->goods_price;
        $total=$buy_num*$count;
        echo $total;
    }
    /** 点击加入购物车 */
    public function cart_mix(Request $request){
    	$goods_id = $request->all();
    	$register_id = session('register_id');
    	$data = DB::table('goods')->where('goods_id',$goods_id)->first();
    	$res = DB::table('cart')->where('g_id',$goods_id)->insert([
            'register_id'=>$register_id,
            'g_name'=>$data->goods_name,
            'g_id'=>$data->goods_id,
            'g_img'=>$data->goods_file,
            'g_price'=>$data->goods_price,
            'add_time'=>time()
        ]);
    	// dd($res);
    	if($res){
    		return redirect()->action('Index\IndexController@cart_list');
    	}
    }
    /** 购物车列表 */
    public function cart_list(){
    	$register_id = session('register_id');
    	$data = DB::table('cart')->where('register_id',$register_id)->where(['state'=>1])->get();
    	// dd($data);
    	$g_price = DB::table('cart')->where(['state'=>1])->where('register_id',$register_id)->select('g_price')->get();
    	$total = 0;
    	foreach ($g_price as $k=>$v) {
    		$total += $v->g_price;
    	}
    	// dd($info);
    	return view('/index/cart_list',['data'=>$data],['total'=>$total]);
    }
    /** 购物车进入订单页 */
    public function order_do(Request $request){
    	//接受购物车列表传过来的id
        $id = $request->get('id');
        //去除点右边拼接的
        $id = trim($id,',');
        //接受用户id
        $register_id = session('register_id');
        // dd($register_id);
        //生成订单号
        $oid = time().rand(1000,9999).$register_id;
        //查询单价
        $g_price = DB::table('cart')->where('register_id',$register_id)->where(['state'=>1])->select('g_price')->get();
        $pay_money = 0;
        // 循环遍历出单价   求出总和
        foreach ($g_price as $k=>$v){
            $pay_money += $v->g_price;
        }
        //入库  订单表 order
        $res = DB::table('order')->insert([
            'register_id'=>$register_id,
            'oid'=>$oid,
            'pay_money'=>$pay_money,
            'add_time'=>time()
        ]);
        $pride = DB::table('cart')->where('register_id',$register_id)->select('g_id')->get();
        // 循环遍历 求出订单表总价
        $g_id = 0;
        foreach ($pride as $k=>$v){
            $g_id = $v->g_id;
        }
        //根据商品id查出商品id信息
        $g_id = explode(',',$g_id);
        //dd($g_id);
        $data = DB::table('goods')->where('goods_id',$g_id)->get();
        //因为查出来是二维数组  要遍历
        $info = [];
        foreach ($data as $k=>$v){
            $info[] = [
                'oid' => $oid,
                'g_id' => $v->goods_id,
                'g_name' => $v->goods_name,
                'g_img' => $v->goods_file,
                'add_time' => time()
            ];
        }
        $re = DB::table('order_detail')->insert($info);
        // dd($re);
        $req = DB::table('cart')->where('register_id',$register_id)->update(['state'=>2]);
        if($re){
            return redirect()->action('Index\IndexController@order',['oid'=>$oid]);
        }
    }
    /** 订单页 */
    public function order(Request $request){
    	$oid = $request->get('oid');
        //dd($oid);
        $where = ['oid'=>$oid,'state'=>1];
        $res = DB::table('order_detail')->where($where)->get();
        //dd($res);
        $data = DB::table('order')->where('oid',$oid)->select('pay_money')->get();

        return view('/index/order',['res'=>$res,'data'=>$data]);
    }
    /** 支付 */
}
