
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Snake Game Scoreboard</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url('{{asset("assets/images/snake-game-1680-x-1050-background-6syqer1fr6oahe0b.jpg")}}') no-repeat center fixed;

        background-position: center;
        color: black;
      }

      h1 {
        text-align: center;
        padding: 20px;
        color: white;
      }

      table {
        width: 50%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); /* Dark box shadow */
      }

      th, td {
        padding: 15px;
        text-align: center;
      }

      th {
        background-color: #333; /* Dark gray background for header */
      }

      tbody {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for body */
      }

      a {
        display: block;
        text-align: center;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #333; /* Dark gray background for the button */
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.8); /* Dark box shadow */
        width: 10%;
      }

      a:hover {
        background-color: #555; /* Darker gray background on hover */
      }
    </style>
  </head>
  <body>
    <h1>Snake Game Scoreboard</h1>
    <button onclick="clearLocalStorage()">Clear Scoreboard</button>
    <table>
      <thead>
        <tr>
          <th style="color: white">User</th>
          <th style="color: white">High Score</th>
        </tr>
      </thead>
      <tbody id="scoreboardBody"></tbody>
    </table>
    <a href=" {{ route('gameplay-easy') }}">Back to Game</a>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        displayScores();
      });

      function displayScores() {
        const scoreboardBody = document.getElementById("scoreboardBody");

        // Retrieve scores from local storage
        const scores = JSON.parse(localStorage.getItem("snakeGameScores")) || [];

        // Display scores in the scoreboard
        scores.forEach(score => {
          const row = document.createElement("tr");
          row.innerHTML = `<td>${score.user}</td><td>${score.score}</td>`;
          scoreboardBody.appendChild(row);
        });
      }

      function clearLocalStorage() {
        localStorage.removeItem("snakeGameScores");
        // Clear the displayed scores
        const scoreboardBody = document.getElementById("scoreboardBody");
        scoreboardBody.innerHTML = "";
      }
    </script>
  </body>
</html>

