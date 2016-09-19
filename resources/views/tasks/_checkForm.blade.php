{!! Form::open(['route'=> ['tasks.check',$toDoTask->id],'method'=> 'post']) !!}
    <button type="submit" class="btn btn-success btn-sm">
        <i class="fa fa-check"></i>
    </button>
{!! Form::close() !!}