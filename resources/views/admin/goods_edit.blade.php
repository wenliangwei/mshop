@extends('layout1.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
@section('body')
	<form action="{{url('/admin/goods_edit_do/'.$data->g_id)}}" method="post"  enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="g_id" value="{{$data->g_id}}"><br>
		商品名称：<input type="text" name="g_name" value="{{$data->g_name}}"><br>
		商品图片：<img src="{{$data->g_img}}" width="100px" alt=""><input type="file" name="g_img"><br>
		商品价格：<input type="text" name="g_price" value="{{$data->g_price}}"><br>
		商品库存：<input type="text" name="g_ku" value="{{$data->g_ku}}"><br>
		提交按钮：<input type="submit" value="修改"><br>
	</form>
</body>
</html>
@endsection