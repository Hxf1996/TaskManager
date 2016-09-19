<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTask-{{ $toDoTask->id }}">
    <i class="fa fa-cog"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editTask-{{ $toDoTask->id }}" tabindex="-1" role="dialog" aria-labelledby="editTaskLabel-{{ $toDoTask->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::model($toDoTask,['route'=> ['tasks.update',$toDoTask],'method'=> 'PATCH']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editTaskLabel-{{ $toDoTask->id }}">编辑任务</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('title','任务名称：',['class'=> 'control-label']) !!}
                        {!! Form::text('title',null,['class'=> 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title','所属项目：',['class'=> 'control-label']) !!}
                        {!! Form::select('projectList',$projects,null,['class'=> 'form-control']) !!}
                    </div>
                    @include('errors/_errors')
                </div>
                <div class="modal-footer">
                    {!! Form::submit('编辑任务',['class'=> 'btn btn-default']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>