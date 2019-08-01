	@extends('layout.common')
	@section('title','')
	@section('content')
	
	<!-- login -->
	<script src={{asset('js/jquery-3.3.1.min.js')}}></script>
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>登录</h3>
			</div>
			<div class="login">
				<div class="row">
					<form action="{{url('login/login_do')}}" method="post" class="col s12">
						@csrf
						<div class="input-field">
							<input type="text" name="register_name"  id="register_name" class="validate" placeholder="姓名" required>
						</div>
						<div class="input-field">
							<input type="password" name="register_pwd"  id="register_pwd" class="validate" placeholder="密码" required>
						</div>
						<a href=""><h6>忘记 密码 ?</h6></a>
						<button id="bt" class="btn button-default">登录</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection
{{--	<script>--}}
{{--    $(function(){--}}
{{--        $.ajaxSetup({--}}
{{--           headers: {--}}
{{--               'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')--}}
{{--           }--}}
{{--        });--}}

{{--        $("#bt").click(function(){--}}
{{--            var register_name = $("#register_name").val();--}}
{{--           // console.log(name);--}}
{{--            var register_pwd = $("#register_pwd").val();--}}
{{--            $.post(--}}
{{--                "login_do",--}}
{{--                {register_name:register_name,register_pwd:register_pwd},--}}
{{--                function(msg){--}}
{{--                    if(msg.code==1){--}}
{{--                        alert('登录成功');--}}
{{--                        location.href="/index"--}}
{{--                    }else{--}}
{{--                        alert('登录失败');--}}
{{--                    }--}}
{{--                }--}}
{{--            );--}}
{{--            return false;--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}