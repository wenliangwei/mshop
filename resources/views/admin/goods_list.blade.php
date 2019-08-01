@extends('layout1.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台商品添加</title>
	<link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
@section('body')
<h3><a href="{{url('admin/goods_add')}}">商品添加</a></h3>
<form action="">
	商品名称：<input type="text" name="g_name" value="{{$query['g_name']??''}}">
	<button>搜索</button>
</form>
<form action="">
<table border="1">
	<tr align="center">
		<td>商品id</td>
		<td>商品名称</td>
		<td>商品库存</td>
		<td>商品图片</td>
		<td>商品价格</td>
		<td>商品添加时间</td>
		<td>操作</td>
	</tr>
	@if($data)
	@foreach($data as $v)
	<tr align="center">
		<td>{{$v->g_id}}</td>
		<td>{{$v->g_name}}</td>
		<td>{{$v->g_ku}}</td>
		<td><img src="{{$v->g_img}}" alt="" width="100px"></td>
		<td>{{$v->g_price}}</td>
		<td>{{date('Y-m-d H:s:m',$v->g_time)}}</td>
		<td>
			<a href="{{url('admin/goods_del',['g_id'=>$v->g_id])}}">删除 ||</a>
			<a href="/admin/goods_edit/{{$v->g_id}}"> 修改</a>
		</td>
	</tr>
	@endforeach
	@endif
</table>
{{$data->appends($query)->links()}}
</form>
</body>
</html>
@endsection