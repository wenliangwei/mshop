<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台-注册</title>
    <link rel="stylesheet" href="/admin/dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/admin/dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/admin/dist/css/styles.css">
</head>
<body>
<form action="{{url('/admin/register_do')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="page-wrapper flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4">
                        <div class="card-header text-center text-uppercase h4 font-weight-light">
                            注册
                        </div>

                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">注册用户名：</label>
                                <input type="text" name="register_name">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">注&nbsp;册&nbsp;密&nbsp;码&nbsp;：</label>
                                <input type="password" name="register_pwd">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">点击注册</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="/admin/dist/vendor/jquery/jquery.min.js"></script>
<script src="/admin/dist/vendor/popper.js/popper.min.js"></script>
<script src="/admin/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/dist/vendor/chart.js/chart.min.js"></script>
<script src="/admin/dist/js/carbon.js"></script>
<script src="/admin/dist/js/demo.js"></script>
</body>
</html>
