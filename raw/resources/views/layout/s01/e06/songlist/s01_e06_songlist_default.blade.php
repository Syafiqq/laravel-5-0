<?php
/** @var \App\Http\Requests\Request $request */
$request = \Illuminate\Support\Facades\Request::getFacadeRoot();
$prefix  = $request->route()->getPrefix();
if (!isset($songs))
{
    $songs = [];
}
?>

@extends('root.root-0')

@section('head-title')
    <title>Song List</title>
@endsection

@section('head-description')
    <meta name="description" content="Song List">
@endsection

@section('body-content')
    <h1>List Of Songs</h1>
    <div class="ui list">
        @foreach($songs as $k => $song)
            <div class="item">
                <i class="music icon"></i>
                <div class="content">
                    <a href="{{url("{$prefix}/songs/${k}")}}">{{$song}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
