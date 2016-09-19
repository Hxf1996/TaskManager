{!! Form::open(['route'=> ['tasks.destroy',$toDoTask->id],'method'=> 'DELETE']) !!}
<button type="submit" class="btn btn-danger btn-sm">
    <i class="fa fa-close"></i>
</button>
{!! Form::close() !!}