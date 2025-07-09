<h1>Dashboard</h1>

<canvas id="eventsPerMonth" width="400" height="200"></canvas>
<canvas id="ticketsPerEvent" width="400" height="200" style="margin-top:40px;"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Data vanuit PHP
const labelsEvents = <?= json_encode($labelsEvents ?? []) ?>;
const dataEvents = <?= json_encode($dataEvents ?? []) ?>;
const labelsTickets = <?= json_encode($labelsTickets ?? []) ?>;
const dataTickets = <?= json_encode($dataTickets ?? []) ?>;

// Events per maand
new Chart(document.getElementById('eventsPerMonth').getContext('2d'), {
    type: 'bar',
    data: {
        labels: labelsEvents,
        datasets: [{
            label: 'Events per maand',
            data: dataEvents,
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
        }]
    }
});

// Tickets per event
new Chart(document.getElementById('ticketsPerEvent').getContext('2d'), {
    type: 'bar',
    data: {
        labels: labelsTickets,
        datasets: [{
            label: 'Tickets per event',
            data: dataTickets,
            backgroundColor: 'rgba(255, 99, 132, 0.5)'
        }]
    }
});
</script>