@extends('layout1.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
@section('body')
	<form>
		<table border="1">
			<tr align="center">
				<td>用户I&nbsp;D：</td>
				<td>用户姓名：</td>
				<td>用户等级：</td>
				<td>添加时间：</td>
				<td>操作</td>
			</tr>
			@foreach($data as $v)
			<tr align="center">
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->state}}</td>
				<td>{{date('Y-m-d H:s:m',$v->reg_time)}}</td>
				<td>
					<a href="{{url('/admin/user_list')}}?id={{$v->id}}">删除 || </a>
					<a href="{{url('/admin/user_edit')}}?id={{$v->id}}">修改</a>
				</td>
			</tr>
			@endforeach
		</table>
		{{$data->links()}}
	</form>
</body>
</html>
@endsection