<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台 - 登录</title>
    <link rel="stylesheet" href="/admin/dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/admin/dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/admin/dist/css/styles.css">
    <script src='/js/jquery-3.3.1.min.js'></script>
    {{--    令牌--}}
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        登录
                    </div>
                <form action="{{url('/admin/login_do')}}" method="post">
                @csrf
                    {{--    令牌--}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                
                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">用户名</label>
                            <input type="text" name="register_name" id="register_name">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">密码：</label>
                            <input type="password" name="register_pwd" id="register_pwd">
                        </div>

                        <div class="custom-control mt-4">
                            <input type="hidden" class="custom-control-input" id="login">
                            <label class="" for="login"></label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button id="bit" class="btn-primary px-5">登录</button>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-link">忘记密码?</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/admin/dist/vendor/jquery/jquery.min.js"></script>
<script src="/admin/dist/vendor/popper.js/popper.min.js"></script>
<script src="/admin/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/dist/vendor/chart.js/chart.min.js"></script>
<script src="/admin/dist/js/carbon.js"></script>
<script src="/admin/dist/js/demo.js"></script>
</body>
</html>
<script>
    // $(function(){
    //     $.ajaxSetup({
    //        headers: {
    //            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    //        }
    //     });

    //     $("#btn").click(function(){
    //         var register_name = $("#register_name").val();
    //        // console.log(name);
    //         var register_pwd = $("#register_pwd").val();
    //         $.post(
    //             "login_do",
    //             {register_name:register_name,register_pwd:register_pwd},
    //             function(msg){
    //                 if(msg.code==1){
    //                     alert('登录成功');
    //                     location.href="/admin/index"
    //                 }else{
    //                     alert('登录失败');
    //                 }
    //             }
    //         );
    //         return false;
    //     })
    // });
</script>
