<div class="charts">
    <div class="chart-card">
        <h3>Events per Month</h3>
        <canvas id="eventsPerMonth" width="400" height="200"></canvas>
    </div>
    <div class="chart-card">
        <h3>Tickets per Event</h3>
        <canvas id="ticketsPerEvent" width="400" height="200"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data vanuit PHP
    const labelsEvents = <?= json_encode($labelsEvents ?? []) ?>;
    const dataEvents = <?= json_encode($dataEvents ?? []) ?>;
    const labelsTickets = <?= json_encode($labelsTickets ?? []) ?>;
    const dataTickets = <?= json_encode($dataTickets ?? []) ?>;

    // Minimalistische stijl opties
    const minimalistOptions = {
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: false
            },
            tooltip: {
                backgroundColor: '#fff',
                titleColor: '#222',
                bodyColor: '#222',
                borderColor: '#eee',
                borderWidth: 1
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#888',
                    font: {
                        size: 13
                    }
                }
            },
            y: {
                grid: {
                    color: '#eee'
                },
                ticks: {
                    color: '#888',
                    font: {
                        size: 13
                    },
                    beginAtZero: true
                }
            }
        },
        layout: {
            padding: 10
        },
        backgroundColor: '#fff',
    };

    // Events per maand
    new Chart(document.getElementById('eventsPerMonth').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labelsEvents,
            datasets: [{
                label: '',
                data: dataEvents,
                backgroundColor: 'rgba(54, 162, 235, 0.12)',
                borderColor: 'rgba(54, 162, 235, 0.5)',
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: minimalistOptions
    });

    // Tickets per event
    new Chart(document.getElementById('ticketsPerEvent').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labelsTickets,
            datasets: [{
                label: '',
                data: dataTickets,
                backgroundColor: 'rgba(255, 99, 132, 0.12)',
                borderColor: 'rgba(255, 99, 132, 0.5)',
                borderWidth: 2,
                borderRadius: 6
            }]
        },
        options: minimalistOptions
    });
</script>