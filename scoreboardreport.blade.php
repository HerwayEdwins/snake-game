<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Snake Game Reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  </head>
  <body>
    <canvas id="topScorersChart" width="400" height="200"></canvas>
    <canvas id="userDistributionChart" width="400" height="200"></canvas>
    <button onclick="downloadChartsAsPDF()">Download as PDF</button>

    <script>
      document.addEventListener("DOMContentLoaded", async () => {
        const scores = JSON.parse(localStorage.getItem("snakeGameScores")) || [];

        // Extract user names and scores
        const users = scores.map(score => score.user);
        const userScores = scores.map(score => score.score);

        // Get the top 5 scorers
        const topScorers = users.slice(0, 5);
        const topScores = userScores.slice(0, 5);

        // Get user distribution data
        const scoreRanges = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        const userDistributionData = Array.from({ length: scoreRanges.length - 1 }, (_, index) => {
          const rangeStart = scoreRanges[index];
          const rangeEnd = scoreRanges[index + 1];
          const usersInRange = users.filter((user, i) => userScores[i] >= rangeStart && userScores[i] < rangeEnd);
          return usersInRange.length;
        });

        // Create a bar chart for top scorers
        const topScorersCtx = document.getElementById("topScorersChart").getContext("2d");
        const topScorersChart = new Chart(topScorersCtx, {
          type: 'bar',
          data: {
            labels: topScorers,
            datasets: [{
              label: 'Top Scorers',
              data: topScores,
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

        // Create a pie chart for user distribution
        const userDistributionCtx = document.getElementById("userDistributionChart").getContext("2d");
        const userDistributionChart = new Chart(userDistributionCtx, {
          type: 'pie',
          data: {
            labels: scoreRanges.slice(1),
            datasets: [{
              data: userDistributionData,
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true
          }
        });

        // Save charts as base64 images
        const topScorersChartBase64 = await getChartAsBase64Image(topScorersChart);
        const userDistributionChartBase64 = await getChartAsBase64Image(userDistributionChart);

        // Store base64 images in localStorage
        localStorage.setItem("topScorersChartBase64", topScorersChartBase64);
        localStorage.setItem("userDistributionChartBase64", userDistributionChartBase64);
      });

      async function getChartAsBase64Image(chartInstance) {
        const canvas = await html2canvas(chartInstance.canvas, { scale: 3 }); // You can adjust the scale value
        return canvas.toDataURL("image/png");
      }

      function downloadChartsAsPDF() {
        // Retrieve base64 images from localStorage
        const topScorersChartBase64 = localStorage.getItem("topScorersChartBase64");
        const userDistributionChartBase64 = localStorage.getItem("userDistributionChartBase64");

        const chartsContainer = document.createElement('div');
        chartsContainer.innerHTML = `<img src="${topScorersChartBase64}" style="width: 400px; height: 200px;" /><img src="${userDistributionChartBase64}" style="width: 400px; height: 200px;" />`;

        const pdfOptions = {
          margin: 10,
          filename: 'snake_game_reports.pdf',
          image: { type: 'jpeg', quality: 2 },
          html2canvas: { scale: 25 }, // You can adjust the scale value
          jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().from(chartsContainer).set(pdfOptions).save();
      }
    </script>
  </body>
</html>
