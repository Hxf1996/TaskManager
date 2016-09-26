/**
 * Created by Hu on 2016/9/26.
 */
var ctxBar = $('#barChart');
var data = {
    labels: $('#bar-data').data('names'),
    datasets: [
    {
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        data: $('#bar-data').data('projects'),
    }]
};
var barChart = new Chart(ctxBar, {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        title:{
            display: true,
            text: '总任务的对比',
            fontSize:30
        },
        legend: {
            display: false
        }
    }
});