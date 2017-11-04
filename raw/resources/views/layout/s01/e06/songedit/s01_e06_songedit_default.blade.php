<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($song))
{
    /** @var \App\Song $song */
    $song = null;
}
?>

@extends('root.root-0')

@section('head-title')
    <!--suppress HtmlFormInputWithoutLabel -->
    <title>Song Edit</title>
@endsection

@section('head-description')
    <meta name="description" content="Song Edit">
@endsection

@section('head-css')
    @parent
    <link rel="stylesheet" href="{{url('/assets/css/layout/s01/e06/songedit/s01_e06_songedit_default.min.css')}}">
@endsection

@section('body-content')
    <h3 class="ui center aligned header">Edit Song</h3>
    <div class="ui container">
        {!! $form->model($song, ['url' => "/s01/e06/songs/{$song->getAttribute('id')}/edit", 'method' => 'patch', 'class' => 'ui form']) !!}
        <div class="field required">
            <label>Song</label>
            {!! $form->input('text','song', null, ['placeholder' => 'Song', 'required'=> true]) !!}
        </div>
        <div class="field required">
            <label>Lyrics</label>
            {!! $form->textarea('lyric', null, ['placeholder' => 'Lyrics',  'required'=> true]) !!}
        </div>
        {!! $form->button('Submit', ['type' => 'Submit', 'class' => 'ui button right floated']) !!}
        {!! $form->close() !!}
    </div>
@endsection
