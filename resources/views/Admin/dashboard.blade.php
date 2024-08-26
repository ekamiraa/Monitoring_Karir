@extends('layouts.master')

@section('title', 'Sistem Monitoring Karir')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Dashboard</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Posisi yang Dilamar
        </div>
        <div class="card-body">
            <canvas id="positionChart" width="100%" height="30"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Distribusi Area
                </div>
                <div class="card-body"><canvas id="areaChart" width="100%" height="100"></canvas></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Distribusi Regional
                </div>
                <div class="card-body"><canvas id="regionalChart" width="100%" height="100"></canvas></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Distribusi Umur
                </div>
                <div class="card-body"><canvas id="ageChart" width="100%" height="100"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Distribusi Jenis Kelamin
                </div>
                <div class="card-body"><canvas id="genderChart" width="100%" height="100"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Distribusi Pengalaman Kerja
                </div>
                <div class="card-body"><canvas id="experienceChart" width="100%" height="100"></canvas></div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <canvas id="myChart" width="100%" height="30"></canvas>
    </div>
</div>
<script>
    // Chart Posisi yang Dilamar
    const positionData = JSON.parse('{!! json_encode($position) !!}');

    console.log(positionData); // Add this to debug

    new Chart(
        document.getElementById('positionChart'), {
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
                labels: positionData.map(d => d.posisi),
                datasets: [{
                    label: 'Total',
                    data: positionData.map(d => d.total),
                    backgroundColor: 'rgba(52, 152, 219,0.2)',
                    borderColor: 'rgba(52, 152, 219,1.0)',
                    borderWidth: 1
                }]
            }
        }
    );


    // Chart Distribusi Umur
    const ageData = JSON.parse('{!! json_encode($age) !!}');

    console.log(ageData); // Add this to debug

    const ageGroups = {
        '17 - 19': 0,
        '20 - 25': 0,
        '26 - 30': 0,
        '31 - 40': 0,
        '41+': 0
    };

    console.log(ageGroups);

    ageData.forEach(d => {
        if (d.umur >= 17 && d.umur <= 19) ageGroups['17 - 19'] += d.total;
        if (d.umur >= 20 && d.umur <= 25) ageGroups['20 - 25'] += d.total;
        else if (d.umur >= 26 && d.umur <= 30) ageGroups['26 - 30'] += d.total;
        else if (d.umur >= 31 && d.umur <= 40) ageGroups['31 - 40'] += d.total;
        else if (d.umur >= 41) ageGroups['41+'] += d.total;
    });

    new Chart(
        document.getElementById('ageChart'), {
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
                labels: Object.keys(ageGroups),
                datasets: [{
                    label: 'Total',
                    data: Object.values(ageGroups),
                    backgroundColor: 'rgba(52, 152, 219,0.2)',
                    borderColor: 'rgba(52, 152, 219,1.0)',
                    borderWidth: 1
                }]
            }
        }
    );


    // Chart Distribusi Umur
    const areaData = JSON.parse('{!! json_encode($area) !!}');

    console.log(areaData); // Add this to debug

    const processedAreaData = {
        labels: [],
        totals: []
    };

    console.log(processedAreaData); // Add this to debug

    areaData.forEach(d => {
        if (d.total > 5) {
            processedAreaData.labels.push(d.area_nama);
            processedAreaData.totals.push(d.total);
        } else {
            const index = processedAreaData.labels.indexOf("OTHER");
            if (index === -1) {
                processedAreaData.labels.push("OTHER");
                processedAreaData.totals.push(d.total);
            } else {
                processedAreaData.totals[index] += d.total;
            }
        }
    });

    new Chart(
        document.getElementById('areaChart'), {
            type: 'doughnut',
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
                labels: processedAreaData.labels,
                datasets: [{
                    label: 'Total',
                    data: processedAreaData.totals,
                    backgroundColor: processedAreaData.labels.map((_, index) => {
                        return index % 2 === 0 ?
                            'rgba(52, 152, 219, 0.5)' // First color
                            :
                            'rgba(75, 192, 192, 0.5)'; // Second color
                    }),

                    borderWidth: 1
                }]

            }
        }
    );

    // Regional Data Chart
    const regionalData = JSON.parse('{!! json_encode($regional) !!}');
    console.log(regionalData);

    const regionalChartCtx = document.getElementById('regionalChart').getContext('2d');

    const labels = regionalData.map(d => d.regional_nama);
    const data = regionalData.map(d => d.total);

    new Chart(regionalChartCtx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total',
                data: data,
                backgroundColor: labels.map((_, index) => {
                    return index % 2 === 0 ?
                        'rgba(52, 152, 219, 0.5)' // First color
                        :
                        'rgba(75, 192, 192, 0.5)'; // Second color
                }),

                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    // Gender Data Chart
    const genderData = JSON.parse('{!! json_encode($gender) !!}');
    console.log(genderData);

    const genderChartctx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderChartctx, {
        type: 'bar',
        data: {
            labels: genderData.map(d => d.jk),
            datasets: [{
                label: 'Total',
                data: genderData.map(d => d.total),
                backgroundColor: 'rgba(52, 152, 219,0.2)',
                borderColor: 'rgba(52, 152, 219,1.0)',
                borderWidth: 1
            }]
        },
    });

    // Work Experience Data Chart
    const experienceData = JSON.parse('{!! json_encode($experience) !!}');
    console.log(experienceData);

    const experienceChartCtx = document.getElementById('experienceChart').getContext('2d');
    new Chart(experienceChartCtx, {
        type: 'bar',
        data: {
            labels: experienceData.map(d => d.pengalaman),
            datasets: [{
                label: 'Total',
                data: experienceData.map(d => d.total),
                backgroundColor: 'rgba(52, 152, 219,0.2)',
                borderColor: 'rgba(52, 152, 219,1.0)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection