<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart test</title>

    <style>
        #myChart {
            width: 100%;
            height: 100px;
        }
    </style>
</head>
<body>

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.umd.js" integrity="sha512-CMF3tQtjOoOJoOKlsS7/2loJlkyctwzSoDK/S40iAB+MqWSaf50uObGQSk5Ny/gfRhRCjNLvoxuCvdnERU4WGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Sample event data
    const events = [
        { date: '2023-01-01', title: 'Event 1' },
        { date: '2023-02-15', title: 'Event 2' },
        { date: '2023-03-10', title: 'Event 3' },
        // Add more events as needed
    ];

    // Prepare data for Chart.js
    const chartData = {
        labels: [],
        datasets: [{
            label: 'Events',
            data: [],
            backgroundColor: 'rgba(75, 192, 192, 0.8)',
        }],
    };

    // Populate chartData with event dates and labels
    events.forEach(event => {
        chartData.labels.push(event.date);
        chartData.datasets[0].data.push({ x: new Date(event.date), y: 0 });
    });

    // Chart.js configuration
    const options = {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day', // Display the x-axis labels as days
                    displayFormats: {
                        day: 'MMM D, YYYY', // Format for displaying the dates
                    },
                },
                ticks: {
                    source: 'labels',
                },
            },
            y: {
                display: false, // Hide the y-axis
            },
        },
    };

    // Create the chart
    const eventChart = new Chart('myChart', {
        type: 'line',
        data: chartData,
        options: options,
    });

</script>

</body>
</html>