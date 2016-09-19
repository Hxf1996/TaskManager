@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($projects)
            @foreach($projects as $project)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <ul class="icon-bar">
                            <li>
                                @include('projects/_deleteForm')
                            </li>
                            <li>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editModal-{{ $project->id }}">
                                    <i class="fa fa-btn fa-cog"></i>
                                </button>
                            </li>
                        </ul>
                        <a href="{{ route('projects.show',$project->id) }}">
                            <img src="{{ asset('thumbnail').'/'.$project->thumbnail }}" alt="...">
                            <div class="caption">
                                <h4 class="text-center">{{ $project->name }}</h4>
                            </div>
                        </a>
                    </div>
                    @include('projects/_editModel')
                </div>
            @endforeach
        @endif
        <div class="col-sm-6 col-md-3 project-model">
            @include('projects/_createProjectModel')
        </div>
    </div>
</div>

@endsection

@section('customjs')
    <script>
        $(document).ready(function () {
            $('.icon-bar').hide();
            $('.thumbnail').hover(function () {
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
@endsection
