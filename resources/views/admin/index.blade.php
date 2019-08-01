<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/admin/dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/admin/dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/admin/dist/css/styles.css">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <img src="/admin/dist/imgs/logo.png" alt="logo">
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/admin/dist/imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    <span class="small ml-1 d-md-down-none">用户名</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    
                    <div class="dropdown-header">Settings</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-lock"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">

                    <li class="nav-item">
                        <a href="{{url('/admin/index')}}" class="nav-link active">
                            <i class="icon icon-speedometer"></i> 表盘
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 商品管理 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('/admin/goods_add')}}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品添加
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/goods_list')}}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品列表
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/goods_edit')}}" class="nav-link">
                                    <i class="icon icon-target"></i> 商品修改
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i> 用户管理 <i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{url('/admin/user')}}" class="nav-link">
                                    <i class="icon icon-target"></i> 添加用户
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            @section('body')
            @show
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
