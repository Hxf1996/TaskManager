@include('errors/_errors')
{!! Form::open(['route'=>['tasks.store','project'=>$project->id],'class'=>'form-inline']) !!}
    <td class="first-cell">
        {!! Form::text('name',null,['placeholder'=>'有什么需要完成的任务么？','class'=>'form-control']) !!}
    </td>
    <td class="icon-cell">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-plus"></i>
        </button>
    </td>
{!! Form::close() !!}