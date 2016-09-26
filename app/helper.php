<?php
function TasksCountArray($projects){
    $counts = [];
    foreach ($projects as $project){
        $perCount = $project->tasks->count();
        array_push($counts,$perCount);
    }
    return $counts;
}