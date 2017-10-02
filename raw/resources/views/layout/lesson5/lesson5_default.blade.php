<?php
if (!isset($data))
{
    $data = [];
}
if (isset($otherData))
{
    $data['otherData'] = $otherData;
}
if (isset($other_other_data))
{
    $data['otherOtherData'] = $other_other_data;
}

?>

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
    @foreach(empty($data) ? [] : $data as $key => $var)
        <h1 class="ui header">{{$key}}</h1>
        @if(is_array($var))
            <div class="ui list">
                @foreach(empty($var) ? [] : $var as $v)
                    <div class="item">{{$v}}</div>
                @endforeach
            </div>
        @else
            <div class="item">{{var_export($var, true)}}</div>
        @endif
        <div class="ui divider"></div>
    @endforeach
@endsection