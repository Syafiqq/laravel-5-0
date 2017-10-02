@extends('root.root-0')
@section('head-title')
    <title>Lesson 5</title>
@endsection

@section('head-description')
    <meta name="description" content="Lesson5">
@endsection

@section('head-css')
    @parent
    {{-- Custom --}}
    <link rel="stylesheet" href="/assets/css/layout/lesson5/lesson5_default.min.css">
    {{----}}
@endsection

@section('body-post-js')
    {{-- Custom --}}
    <script type="text/javascript" src="/assets/js/layout/lesson5/lesson5_default.min.js"></script>
@endsection

@section('body-content')
    <div class="ui list">
        @foreach(empty($variable) ? [] : $variable as $var)
            <div class="item">{{$var}}</div>
        @endforeach
    </div>
@endsection