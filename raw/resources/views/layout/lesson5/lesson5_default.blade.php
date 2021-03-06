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
if (isset($abc))
{
    $data['abc'] = $abc;
}
if (isset($composer))
{
    $data['composer'] = $composer;
}
if (isset($profile_composer))
{
    $data['profile_composer'] = $profile_composer;
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
                    @if(is_array($v))
                        <div class="item">{{var_export($v, true)}}</div>
                    @else
                        <div class="item">{{$v}}</div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="item">{{var_export($var, true)}}</div>
        @endif
        <div class="ui divider"></div>
    @endforeach
@endsection