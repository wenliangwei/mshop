<form action="{{url('student/add_do')}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<table border="1">
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
		<tr>
			<td>学生姓名：</td>
			<td><input type="text" name="stu_name"></td>
		</tr>
		<tr>
			<td>学生性别：</td>
			<td>
				<input type="radio" name="stu_sex" value="男" checked>男
				<input type="radio" name="stu_sex" value="女">女
			</td>
		</tr>
		<tr>
			<td>学生年龄：</td>
			<td><input type="text" name="stu_age"></td>
		</tr>
		<tr>
			<td>点击添加：</td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>