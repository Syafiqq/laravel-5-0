@extends('root.root-0')

@section('head-css')
    @parent
    {{-- Custom --}}
    <link rel="stylesheet" href="/assets/css/layout/lesson4/response/lesson4_response_default.min.css">
@endsection

@section('body-post-js')
    @parent
    {{-- Custom --}}
    <script type="text/javascript" src="/assets/js/layout/lesson4/response/lesson4_response_default.min.js"></script>
@endsection

@section('body-content')
    Valid Response
@endsection