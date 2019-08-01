<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>周考三</title>
</head>
<body>
<form action="{{url('goods/add_do')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>商品名称：</td>
			<td><input type="text" name="goods_name"></td>
		</tr>
		<tr>
			<td>商品数量：</td>
			<td><input type="text" name="goods_number"></td>
		</tr>
		<tr>
			<td>商品图片：</td>
			<td><input type="file" name="goods_file"></td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text" name="goods_price"></td>
		</tr>
		<tr>
			<td>提交按钮：</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>
</body>
</html>