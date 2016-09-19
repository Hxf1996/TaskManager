@extends('layouts/App')

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
                    @foreach($toDoTasks as $toDoTask)
                        <tr>
                            <td class="first-cell">{{ $toDoTask->title }}</td>
                            <td class="icon-cell">@include('tasks/_checkForm')</td>
                            <td class="icon-cell">@include('tasks/_editForm')</td>
                            <td class="icon-cell">@include('tasks/_deleteForm')</td>
                        </tr>
                    @endforeach

                    {{ $toDoTasks->links() }}
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

                    {{ $toDoTasks->links() }}
                </table>
            </div>
        </div>
    </div>
@endsection