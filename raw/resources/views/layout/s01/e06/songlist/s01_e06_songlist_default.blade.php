<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
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
        @foreach($songs as /** @var \App\Song $song */ $song)
            <div class="item">
                <i class="music icon"></i>
                <div class="content">
                    <a href="{{route('s01.e06.songs.show', ['songs' => $song->getAttribute('id')])}}">{{$song->getAttribute('song')}}</a>
                    {!! $form->model($song, ['route' => ['s01.e06.songs.destroy', $song->getAttribute('id')], 'method' => 'delete', 'class' => 'ui form']) !!}
                    {!! $form->button('<i class="trash icon"></i>', ['type' => 'Submit', 'class' => 'ui button']) !!}
                    {!! $form->close() !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
