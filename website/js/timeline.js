const img = new Image(16, 16);
img.src = 'https://i.stack.imgur.com/Q94Tt.png';

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            data: [
                { x: "2020-03-22", y: 0 },
                { x: "2020-04-01", y: 0 },
                { x: "2020-04-02", y: 0 },
                { x: "2020-04-03", y: 0 },
                { x: "2020-04-08", y: 0 },
                { x: "2020-04-12", y: 0 },
                { x: "2020-04-15", y: 0 }
            ],
            pointStyle: img,
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    display: false,
                },
                gridLines: {
                    display: false
                }
            }],
            xAxes: [{
                type: 'time',
                time: {
                    unit: 'day',
                    tooltipFormat: 'MMM DD'
                },
                gridLines: {
                    display:false
                }
            }]
        }
    }
});