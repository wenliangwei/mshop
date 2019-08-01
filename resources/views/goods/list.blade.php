<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品展示</title>
</head>
<link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
<body>	
<form action="">
	商品名称：<input type="text" name="goods_name" value="{{$query['goods_name']??''}}">
	<button>搜索</button>
</form>
	<table border="1">
		<tr>
			<td>商品id：</td>
			<td>商品名称：</td>
			<td>商品数量：</td>
			<td>商品图片：</td>
			<td>商品价格：</td>
			<td>添加时间：</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr align="center">
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_number}}</td>
			<td><img src="{{$v->goods_file}}" width="100px"></td>
			<td>{{$v->goods_price}}</td>
			<td>{{date('Y-m-d',$v->goods_time)}}</td>
			<td>
				<a href="del/{{$v->goods_id}}">删除</a>
				<a href="{{url('/goods/edit',['id'=>$v->goods_id])}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
	{{$data->appends($query)->links()}}
</body>
</html>