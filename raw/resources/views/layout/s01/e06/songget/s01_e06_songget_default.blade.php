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
    <h1>Detail Of Song [{{$song}}]</h1>
@endsection
