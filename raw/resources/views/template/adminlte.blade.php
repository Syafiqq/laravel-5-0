<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdminLTE 2 | Lockscreen</title>
    <meta name="description" content="">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="manifest" href="/manifest.min.json">
    <link rel="apple-touch-icon" href="/icon.png">
    {{-- Place favicon.ico in the root directory --}}

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="/assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    {{-- Optional theme --}}
    <link rel="stylesheet" href="/assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="/assets/vendor/ionicons/dist/css/ionicons.min.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    {{-- Adminlte --}}
    <link rel="stylesheet" href="/assets/vendor/admin-lte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/vendor/admin-lte/dist/css/skins/skin-black.min.css">

    <link rel="stylesheet" href="/assets/vendor/html5-boilerplate/dist/css/normalize.min.css">
    <link rel="stylesheet" href="/assets/vendor/html5-boilerplate/dist/css/main.min.css">
</head>
<body class="hold-transition lockscreen">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an
    <strong>outdated</strong>
                          browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a>
                          to improve your experience and security.
</p>
<![endif]-->
{{-- Automatic element centering --}}
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="../../index2.html">
            <b>Admin</b>
            LTE
        </a>
    </div>
    {{-- User name --}}
    <div class="lockscreen-name">John Doe</div>

    {{-- START LOCK SCREEN ITEM --}}
    <div class="lockscreen-item">
        {{-- lockscreen image --}}
        <div class="lockscreen-image">
            <img src="/assets/vendor/admin-lte/dist/img/user1-128x128.jpg" alt="User Image">
        </div>
        {{-- /.lockscreen-image --}}

        {{-- lockscreen credentials (contains the form) --}}
        <form class="lockscreen-credentials">
            <div class="input-group">
                <input type="password" class="form-control" placeholder="password">

                <div class="input-group-btn">
                    <button type="button" class="btn">
                        <i class="fa fa-arrow-right text-muted"></i>
                    </button>
                </div>
            </div>
        </form>
        {{-- /.lockscreen credentials --}}

    </div>
    {{-- /.lockscreen-item --}}
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="login.html">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-2016
        <b>
            <a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a>
        </b>
        <br>
        All rights reserved
    </div>
</div>
{{-- Modernizr --}}
<script type="text/javascript" src="/assets/vendor/html5-boilerplate/dist/js/vendor/modernizr-3.5.0.min.js"></script>
{{-- Jquery --}}
<script type="text/javascript" src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script src="/assets/vendor/jquery/dist/jquery.min.js"><\/script>')</script>
{{-- Plugins --}}
<script type="text/javascript" src="/assets/vendor/html5-boilerplate/dist/js/plugins.min.js"></script>
{{-- Popper --}}
<script type="text/javascript" src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
{{-- Bootstrap --}}
<script type="text/javascript" src="/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
{{-- Slimscroll --}}
<script type="text/javascript" src="/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
{{-- Fastclick --}}
<script type="text/javascript" src="/assets/vendor/fastclick/lib/fastclick.min.js"></script>
{{-- Adminlte --}}
<script type="text/javascript" src="/assets/vendor/admin-lte/dist/js/adminlte.min.js"></script>
{{-- Custom --}}
<script type="text/javascript" src="/assets/js/template/adminlte/template-adminlte.min.js"></script>
<script type="text/javascript" src="/assets/js/common/service-worker-logging.min.js"></script>
</body>
</html>
