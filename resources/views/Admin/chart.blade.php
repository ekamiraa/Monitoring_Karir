<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <title>Coba</title>
</head>

<body>
    <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>

    <script>
        // Data yang akan digunakan dalam chart
        const data = [
            { year: 2017, count: 10 },
            { year: 2018, count: 20 },
            { year: 2019, count: 30 },
            { year: 2020, count: 40 },
            { year: 2021, count: 50 }
        ];

        // Membuat chart
        new Chart(
            document.getElementById('acquisitions'),
            {
                type: 'bar',
                options: {
                    animation: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                },
                data: {
                    labels: data.map(row => row.year),
                    datasets: [
                        {
                            label: 'Acquisitions by year',
                            data: data.map(row => row.count),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                }
            }
        );
    </script>
</body>

</html>