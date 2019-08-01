<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品-修改</title>
</head>
<body>
	<form action="{{url('goods/edit_do/'.$data->goods_id)}}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="goods_id" value="{{$data->goods_id}}">
	商品名称：<input type="text" name="goods_name" value="{{$data->goods_name}}"><br>
	商品数量：<input type="text" name="goods_number" value="{{$data->goods_number}}"><br>
	商品图片：<img src="{{$data->goods_file}}" width="100px" alt=""><input type="file" name="goods_file"><br>
	商品价格：<input type="text" name="goods_price" value="{{$data->goods_price}}"><br>
	提交按钮：<input type="submit" value="修改"></td><br>
</form>
</body>
</html>