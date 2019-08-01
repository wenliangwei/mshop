    @extends('layout.common')
	@section('title','')
	@section('content')
	
	<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>注册</h3>
			</div>
			<div class="register">
				<div class="row">
					<form action="{{url('/login/register_do')}}" method="post">
					@csrf
						<div class="input-field">
							<input type="text" name="register_name" class="validate" placeholder="姓名" required>
						</div>
						<div class="input-field">
							<input type="email" name="register_email" placeholder="邮箱" class="validate" required>
						</div>
						<div class="input-field">
							<input type="password" name="register_pwd" placeholder="密码" class="validate" required>
						</div>
						<button class="btn button-default">注册</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
	

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->

	@endsection
