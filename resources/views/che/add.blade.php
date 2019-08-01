<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{url('che/add_do')}}" method="post">
	@csrf
		<table>
			<tr>
				<td>车次</td>
				<td><input type="text" name="checi"></td>
			</tr>
			<tr>
				<td>出发站</td>
				<td><input type="text" name="dian"></td>
			</tr>
			<tr>
				<td>出发时间</td>
				<td><input type="text" name="add_time"></td>
			</tr>
			<tr>
				<td>价格</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>到达站</td>
				<td><input type="text" name="dao"></td>
			</tr>
			<tr>
				<td>到达时间</td>
				<td><input type="text" name="dao_time"></td>
			</tr>
			<tr>
				<td>车票数量</td>
				<td><input type="text" name="number"></td>
			</tr>
			<tr>
				<td>购买车票</td>
				<td><input type="submit" value="订购"></td>
			</tr>
		</table>
	</form>
</body>
</html>