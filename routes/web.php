<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	session(['register_id'=>88]);
// 	request()->session()->forget('register_id');
//     return view('welcome');
// });

//前台
Route::get('/','Index\IndexController@index');
//前台
Route::prefix('/')->group(function(){
	Route::get('/','Index\IndexController@index');
	Route::get('detail','Index\IndexController@detail');//商品详情页
	Route::get('price','Index\IndexController@price');//商品详情页---获取总价
	Route::get('/cart_mix','Index\IndexController@cart_mix');//商品详情页---点击加入购物车
    Route::get('/cart_list','Index\IndexController@cart_list');//购物车列表
    Route::get('/order','Index\IndexController@order');//订单页
    Route::get('/order_do','Index\IndexController@order_do');//购物车列表进入订单
});
/** 后台 */
Route::prefix('/admin')->middleware('login')->group(function(){
	Route::get('/index','Admin\IndexController@index');//首页
	Route::get('/register','Admin\IndexController@register');//注册
    Route::post('/register_do','Admin\IndexController@register_do');
    Route::get('/login','Admin\IndexController@login');//登录
    Route::post('/login_do','Admin\IndexController@login_do');
    Route::get('user','Admin\IndexController@user');//用户
    Route::post('user_do','Admin\IndexController@user_do');
    Route::get('user_del','Admin\IndexController@user_del');//用户删除
    Route::get('user_list','Admin\IndexController@user_list');//用户列表
	Route::get('/goods_add','Admin\IndexController@goods_add');//商品添加
	Route::any('/goods_adddo','Admin\IndexController@goods_adddo');
	Route::get('/goods_list','Admin\IndexController@goods_list');//商品展示
	Route::any('/goods_del/{g_id}','Admin\IndexController@goods_del');//商品删除
	Route::get('/goods_edit/{g_id}','Admin\IndexController@goods_edit');//商品修改
	Route::any('/goods_edit_do/{g_id}','Admin\IndexController@goods_edit_do');//修改执行
});
//前台登入注册
Route::prefix('/login')->group(function(){
	Route::get('register','Login\LoginController@register'); //注册
	Route::post('register_do','Login\LoginController@register_do');//注册执行
	Route::get('login','Login\LoginController@login'); //登录
	Route::post('login_do','Login\LoginController@login_do'); //登录执行
});
// 学生信息
Route::prefix('/student')->middleware('login')->group(function(){
	Route::get('/add','StudentController@add');//学生添加
	Route::post('/add_do','StudentController@add_do');
	Route::get('/list','StudentController@list');//学生展示
	Route::get('del/{stu_id}','StudentController@del');//学生删除
	Route::get('edit/{stu_id}','StudentController@edit');//学生修改
	Route::post('edit_do/{stu_id}','StudentController@edit_do');
});
//商品信息
Route::prefix('/goods')->middleware('Goods')->group(function(){
	Route::get('/add','GoodsController@add');//商品添加
	Route::post('/add_do','GoodsController@add_do');
	Route::get('list','GoodsController@list');//商品展示
	Route::any('/del/{goods_id}','GoodsController@del');//商品删除
	Route::get('/edit/{goods_id}','GoodsController@edit');//商品修改
	Route::post('/edit_do/{goods_id}','GoodsController@edit_do');//修改执行
});
//火车票
Route::prefix('che')->group(function(){
	Route::get('add','Che\cheController@add');
	Route::post('add_do','Che\cheController@add_do');
	Route::get('list','Che\cheController@list');
	Route::any('edit/{id}','Che\cheController@edit');
});

//月考
Route::prefix('liu')->middleware('login')->group(function(){
	Route::get('login','LiuController@login');//登录
	Route::post('login_do','LiuController@login_do');//登录执行
	Route::any('add','LiuController@add');//内容
	Route::post('add_do','LiuController@add_do');
});
Route::get('wen','WenController@wen');

