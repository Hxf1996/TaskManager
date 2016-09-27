@extends('layouts.app')

@section('content')
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300"></canvas>
        <div id="pie-data" data-todo={{ $toDoCount }} data-done={{ $doneCount }} data-total={{ $total }}></div>
    </div>
    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
        <div id="bar-data"
             data-names={{ json_encode($names,JSON_UNESCAPED_UNICODE) }}
             data-projects={!! json_encode(TasksCountArray($projects)) !!}>
        </div>
    </div>
    <div class="container col-md-4">
        <canvas id="radarChart" width="300" height="300"></canvas>
    </div>
@endsection

@section('customjs')
    <script src="{{ asset('js/charts.js') }}"></script>
    <script>
        var ctxRadar = $('#radarChart');
        var data = {
            labels: ["任务总数", "已完成", "未完成"],
            datasets: [
                 <?php
                    $i = 0;
                    foreach ($projects as $project):
                        $name = $project->name;
                        $totalPP = $project->tasks()->count();
                        $toDoPP = $project->tasks()->where('completed',0)->count();
                        $donePP = $project->tasks()->where('completed',1)->count();
                        echo '{';
                 ?>
                    label: "<?php echo $name?>",
                    backgroundColor: "{{ rand_color() }}",
                    borderColor: "{{ rand_color() }}",
                    pointBackgroundColor: "{{ rand_color() }}",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "{{ rand_color() }}",
                    data: [<?php echo $totalPP.','.$toDoPP.','.$donePP?>]
                <?php
                    ($i+1) == $project->count() ? print '}' : print '},';
                    endforeach;
                ?>
            ]
        };
        var myRadarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: data,
            options: {
                responsive: true,
                title:{
                    display: true,
                    text: '各项目的任务完成情况',
                    fontSize:30
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });
    </script>
@endsection