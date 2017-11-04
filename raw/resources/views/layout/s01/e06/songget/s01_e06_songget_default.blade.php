@extends('root.root-0')

@section('head-title')
    <title>Song Detail</title>
@endsection

@section('head-description')
    <meta name="description" content="Song Detail">
@endsection

@section('head-css')
    @parent
    <link rel="stylesheet" href="{{url('/assets/css/layout/s01/e06/songget/s01_e06_songget_default.min.css')}}">
@endsection


@section('body-content')
    @unless(/** @var \App\Song $song */$song == null)
        <h1 class="ui center aligned header">{{$song->getAttribute('song')}}</h1>
        <div class="ui container">
            <p class="">{!! nl2br($song->getAttribute('lyric')) !!}</p>
        </div>
    @endunless
@endsection
