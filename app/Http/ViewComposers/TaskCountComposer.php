<?php
namespace App\Http\ViewComposers;


use App\Repositories\TasksRepository;
use Illuminate\View\View;

class TaskCountComposer{
    function __construct(TasksRepository $task){
        $this->task = $task;
    }

    public function compose(View $view){
        $view->with([
            'total' => $this->task->total(),
            'toDoCount' => $this->task->toDoCount(),
            'doneCount' => $this->task->doneCount(),
        ]);
    }
}