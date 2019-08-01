<form action="{{url('student/edit_do/'.$data->stu_id)}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<table border="1">
		<tr>
			<td>学生姓名：</td>
			<td><input type="text" name="stu_name" value="{{$data->stu_name}}"></td>
		</tr>
		<tr>
			<td>学生性别：</td>
			<td>
				<input type="radio" name="stu_sex" value="男" {{$data->stu_sex=='男'?'checked':''}}>男
				<input type="radio" name="stu_sex" value="女" {{$data->stu_sex=='女'?'checked':''}}>女
			</td>
		</tr>
		<tr>
			<td>学生年龄：</td>
			<td><input type="text" name="stu_age" value="{{$data->stu_age}}"></td>
		</tr>
		<tr>
			<td>点击修改：</td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>