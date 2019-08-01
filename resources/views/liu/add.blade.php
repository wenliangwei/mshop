<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>月考 - 留言</title>
</head>
<body>
	<h3>留言内容</h3>
	<form action="{{url('liu/add_do')}}" method="post">
		@csrf
		内容：<br>
		<input type="test" name="yan"><br>
		<input type="submit" value="发布">
	</form>
	<br>
	<br>
	<br>
	<h3>留言列表</h3>
	<form action="">
		1
	</form>
	<table border="1">
		<tr>
			<td>编号：</td>
			<td>内容：</td>
			<td>姓名：</td>
			<td>时间：</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->yan}}</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
	</table>
</body>
</html>