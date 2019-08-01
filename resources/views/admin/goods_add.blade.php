@extends('layout1.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台 - 商品</title>
</head>
<body>
@section('body')
	<form action="{{url('admin/goods_adddo')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		名称：<input type="text" name="g_name"><br>
		图片: &nbsp;&nbsp;<input type="file" name="g_img"><br>
		价格: &nbsp;&nbsp;<input type="text" name="g_price"><br>
		库存: &nbsp;&nbsp;<input type="text" name="g_ku"><br>
		提交：&nbsp;<input type="submit" value="添加"><br>
	</form>
</body>
</html>
@endsection