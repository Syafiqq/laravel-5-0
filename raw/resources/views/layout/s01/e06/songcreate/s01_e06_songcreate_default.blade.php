<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
?>

@extends('root.root-0')

@section('head-title')
    <!--suppress HtmlFormInputWithoutLabel -->
    <title>Song Create</title>
@endsection

@section('head-description')
    <meta name="description" content="Song Create">
@endsection

@section('head-css')
    @parent
    <link rel="stylesheet" href="{{url('/assets/css/layout/s01/e06/songcreate/s01_e06_songcreate_default.min.css')}}">
@endsection

@section('body-content')
    <h3 class="ui center aligned header">Insert new song here</h3>
    <div class="ui container">
        {!! $form->open(['route' => 's01.e06.songs.store', 'method' => 'post', 'class' => 'ui form']) !!}
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
