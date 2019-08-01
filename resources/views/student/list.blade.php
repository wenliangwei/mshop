<link href="{{asset('css/page2.css')}}" rel="stylesheet" type="text/css">
<h2><a href="{{url('student/add')}}">添加</a></h2>
<form action="">
	学生姓名：<input type="text" name="stu_name" value="{{$query['stu_name']??''}}">
    <button>搜索</button>
</form>
<table border="1">
	<tr>
		<td>学生id</td>
		<td>学生姓名</td>
		<td>学生性别</td>
		<td>学生年龄</td>
		<td>操作</td>
	</tr>
	@foreach($data as $v)
	<tr align="center">
		<td>{{$v->stu_id}}</td>
		<td>{{$v->stu_name}}</td>
		<td>{{$v->stu_sex}}</td>
		<td>{{$v->stu_age}}</td>
		<td>
			<a href="del/{{$v->stu_id}}">删除</a>
			<a href="edit/{{$v->stu_id}}">|修改</a>
		</td>
	</tr>
	@endforeach
</table>
{{$data->appends($query)->links()}}