@extends('root.root-0')

@section('head-title')
    <title>Song Detail</title>
@endsection

@section('head-description')
    <meta name="description" content="Song Detail">
@endsection

@section('body-content')
    @unless(/** @var \App\Song $song */$song == null)
        <h1>Detail Of Song [{{$song->getAttribute('song')}}]</h1>
        <h2>Lyric Of Song [{{$song->getAttribute('lyric')}}]</h2>
    @endunless
@endsection
