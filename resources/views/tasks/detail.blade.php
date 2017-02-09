@extends('layouts.app')
@section('customHeader')
    <meta name="token" id="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
@endsection
@section('content')
<div id="app" class="container">
    <h1 class="text-muted">{{ $task->title }}</h1>

    <step-list :steps="steps" @toggle="toggleCompletion" @remove="removeStep" @edit="editStep" @add="addStep" @complete="completeAll" type="remaings"></step-list>

    <step-list :steps="steps" @toggle="toggleCompletion" @remove="removeStep" @clear="clearAll" type="completed"></step-list>
</div>
@endsection

@section('customjs')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection