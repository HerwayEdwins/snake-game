document.addEventListener("DOMContentLoaded", () => {
    const scoreboardBody = document.getElementById("scoreboardBody");
  
    // Retrieve scores from local storage
    const scores = JSON.parse(localStorage.getItem("snakeGameScores")) || [];
  
    // Display scores in the scoreboard
    scores.forEach(score => {
      const row = document.createElement("tr");
      row.innerHTML = `<td>${score.user}</td><td>${score.score}</td>`;
      scoreboardBody.appendChild(row);
    });
  });
  
  