<h1>BEER BASE</h1>
<div class="main-page">



  <div class="chart-container">
    <h2>Beer Ratings</h2>
    <canvas id="beerRatingsChart"></canvas>
  </div>


  <div class="chart-container">
    <h2>Alcohol Percentages by Beer Type</h2>
    <canvas id="alcoholPercentageChart"></canvas>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx1 = document.getElementById('beerRatingsChart').getContext('2d');
    const beerRatingsChart = new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Beer One', 'Beer Two', 'Beer Three'], // Replace with actual beer names
        datasets: [{
          label: 'Average Rating',
          data: [4.5, 3.8, 4.0], // Replace with actual rating data
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
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

    const ctx2 = document.getElementById('alcoholPercentageChart').getContext('2d');
    const alcoholPercentageChart = new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['Lager', 'IPA', 'Stout'], // Replace with actual beer types
        datasets: [{
          label: 'Average Alcohol Percentage',
          data: [4.8, 5.5, 6.0], // Replace with actual alcohol percentage data
          backgroundColor: 'rgba(153, 102, 255, 0.2)',
          borderColor: 'rgba(153, 102, 255, 1)',
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
</div>