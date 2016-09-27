@extends('layouts/app')

@section('content')
    <div class="container tasks-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">待完成</a>
            </li>
            <li role="presentation">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">已完成</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            {{--待完成列表--}}
            <div role="tabpanel" class="active tab-pane" id="profile">
                <table class="table table-striped">
                    <thead>@include('tasks/_createForm')</thead>
                    @foreach($toDoTasks as $toDoTask)
                        <tr>
                            <td class="date-cell">{{ $toDoTask->updated_at->subWeek()->diffForHumans() }}</td>
                            <td class="first-cell">{{ link_to_route('tasks.show',$toDoTask->title,$toDoTask->id) }}</td>
                            <td class="icon-cell">@include('tasks/_checkForm')</td>
                            <td class="icon-cell">@include('tasks/_editForm')</td>
                            <td class="icon-cell">@include('tasks/_deleteForm')</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{--已完成列表--}}
            <div role="tabpanel" class="tab-pane" id="messages">
                <table class="table table-striped">
                    @foreach($doneTasks as $doneTask)
                        <tr>
                            <td>{{ $doneTask->title }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection