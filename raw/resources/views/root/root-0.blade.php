@section('head-title')
    <title>Title</title>
@endsection

@section('head-description')
    <meta name="description" content="Root">
@endsection

@section('head-property')
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Web Manifest--}}
    <link rel="manifest" href="/manifest.min.json">
    {{-- Favicon--}}
    <link rel="apple-touch-icon" href="/icon.png">
@endsection

@section('head-css')
    {{-- Normalize --}}
    <link rel="stylesheet" href="/assets/vendor/html5-boilerplate/dist/css/normalize.min.css">
    {{-- Main --}}
    <link rel="stylesheet" href="/assets/vendor/html5-boilerplate/dist/css/main.min.css">
    {{-- Semantic-UI --}}
    <link rel="stylesheet" href="/assets/vendor/semantic-generated/dist/semantic.min.css">
    {{----}}
@endsection

@section('body-upgrade-browser')
<!--[if lte IE 9]>
    <p class="browserupgrade">You are using an
        <strong>outdated</strong>
                              browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a>
                              to improve your experience and security.
    </p>
    <![endif]-->
@endsection

@section('body-post-js')
    {{-- Modernizr --}}
    <script type="text/javascript" src="/assets/vendor/html5-boilerplate/dist/js/vendor/modernizr-3.5.0.min.js"></script>
    {{-- Jquery --}}
    <script type="text/javascript" src="/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">window.jQuery || document.write('<script src="/assets/vendor/jquery/dist/jquery.min.js"><\/script>')</script>
    {{-- Plugins --}}
    <script type="text/javascript" src="/assets/vendor/html5-boilerplate/dist/js/plugins.min.js"></script>
    {{-- Semantic-UI --}}
    <script type="text/javascript" src="/assets/vendor/semantic-generated/dist/semantic.min.js"></script>
@endsection

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('head-meta')
    @yield('head-title')
    @yield('head-description')
    @yield('head-property')
    @yield('head-css')
    @yield('head-js')
</head>
<body>
@yield('body-pre-css')
@yield('body-pre-js')
@yield('body-upgrade-browser')
@yield('body-content')
@yield('body-post-css')
@yield('body-post-js')
</body>
</html>
