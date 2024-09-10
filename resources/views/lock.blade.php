<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('admin.title')}} | Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @if(!is_null($favicon = Admin::favicon()))
        <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    <link rel="stylesheet" href="{{ Admin::asset("open-admin/css/styles.css")}}">
    <script src="{{ Admin::asset("bootstrap5/bootstrap.bundle.min.js")}}"></script>
    <![endif]-->
    <style>
        hold-transition .content-wrapper, body.hold-transition .right-side, body.hold-transition .main-footer, body.hold-transition .main-sidebar, body.hold-transition .left-side, body.hold-transition .main-header > .navbar, body.hold-transition .main-header .logo {
            -webkit-transition: none;
            -o-transition: none;
            transition: none
        }
        .lockscreen {
            background: #d2d6de
        }

        .lockscreen-logo {
            font-size: 35px;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 300
        }

        .lockscreen-logo a {
            color: #444
        }

        .lockscreen-wrapper {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 10%
        }

        .lockscreen .lockscreen-name {
            text-align: center;
            font-weight: 600
        }

        .lockscreen-item {
            border-radius: 4px;
            padding: 0;
            background: #fff;
            position: relative;
            margin: 10px auto 30px auto;
            width: 290px
        }

        .lockscreen-image {
            border-radius: 50%;
            position: absolute;
            left: -10px;
            top: -25px;
            background: #fff;
            padding: 5px;
            z-index: 10
        }

        .lockscreen-image > img {
            border-radius: 50%;
            width: 70px;
            height: 70px
        }

        .lockscreen-credentials {
            margin-left: 70px
        }

        .lockscreen-credentials .form-control {
            border: 0
        }

        .lockscreen-credentials .btn {
            background-color: #fff;
            border: 0;
            padding: 0 10px
        }

        .lockscreen-footer {
            margin-top: 10px
        }


    </style>
</head>
<body class="hold-transition lockscreen">

<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="#">{{config('admin.name')}}</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name" style="text-align: center">{{ Admin::user()->name }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ Admin::user()->avatar }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->
        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="post" action="{{ route('laravel-admin-unlock') }}">
            <div class="input-group mb-3">

                <input type="password" class="form-control" {{ old('password') ? 'style=color:red;' : '' }} placeholder="{{ trans('admin.password') }}" name="password" value="{{ old('password') }}"/>

                {{ csrf_field() }}
                <button type="submit" class="btn btn-outline-secondary"><i class="icon-sign-in-alt text-muted"></i></button>

            </div>
        </form>
        <!-- /.lockscreen credentials -->
    </div>

    <div class="text-center">
        <a href="{{ admin_base_path('auth/logout') }}">{{ trans('admin.logout') }}</a>
    </div>
</div>
<!-- /.center -->
</body>
</html>
