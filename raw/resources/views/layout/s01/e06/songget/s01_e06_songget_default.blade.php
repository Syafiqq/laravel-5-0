<?php
if (!isset($song))
{
    $song = null;
}
?>

@extends('root.root-0')

@section('head-title')
    <title>Song Detail</title>
@endsection

@section('head-description')
    <meta name="description" content="Song Detail">
@endsection

@section('body-content')
    @unless($song == null)
        <h1>Detail Of Song [{{$song['song']}}]</h1>
        <h2>Lyric Of Song [{{$song['lyric']}}]</h2>
    @endunless
@endsection
