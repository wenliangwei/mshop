@extends('layout1.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
@section('body')
	<form action="{{url('/admin/user_do')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table border="1">
			<tr>
				<td>用户名称：</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>用户密码：</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td>用户等级：</td>
				<td>
					<select name="state">
						<option value="普通用户">普通用户</option>
						<option value="管理员用户">管理员用户</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="用户添加"></td>
			</tr>
		</table>
	</form>
</body>
</html>
@endsection