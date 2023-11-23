<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Snake Game</title>
    @vite(["resources/css/stylee.css", "resources/js/script-easy.js"])
    <link rel="stylesheet" href="css/stylee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="script-medium.js" defer></script>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        background: url('{{asset("assets/images/snake-game-1680-x-1050-background-6syqer1fr6oahe0b.jpg")}}') no-repeat center fixed;
        background-size: cover;
      }

      header {
        background-color: #333;
        padding: 10px;
        text-align: center;
        position: relative;
        z-index: 1;
        width: 100%;
      }

      header h1 {
        color: white;
        margin: 0;
      }

      .wrapper {
        width: 65vmin;
        height: 70vmin;
        display: flex;
        overflow: hidden;
        flex-direction: column;
        justify-content: center;
        border-radius: 5px;
        background: #293447;
        box-shadow: 0 20px 40px rgba(52, 87, 220, 0.2);
        margin-top: 86px; /* Adjusted margin to position the wrapper */
      }

      .game-details {
        color: #60CBFF;
        font-weight: 500;
        font-size: 1.2rem;
        padding: 20px 27px;
        display: flex;
        justify-content: space-between;
      }

      .play-board {
        height: 100%;
        width: 100%;
        display: grid;
        background: #212837;
        grid-template: repeat(30, 1fr) / repeat(30, 1fr);
      }

      .play-board .food {
        background: #b3ce3f;
      }

      .play-board .head {
        background: #60CBFF;
      }

      .controls {
        display: none;
        justify-content: space-between;
      }

      .controls i {
        padding: 25px 0;
        text-align: center;
        font-size: 1.3rem;
        color: #B8C6DC;
        width: calc(100% / 4);
        cursor: pointer;
        border-right: 1px solid #171B26;
      }

      @media screen and (max-width: 800px) {
        .wrapper {
          width: 90vmin;
          height: 115vmin;
        }

        .game-details {
          font-size: 1rem;
          padding: 15px 27px;
        }

        .controls {
          display: flex;
        }

        .controls i {
          padding: 15px 0;
          font-size: 1rem;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Snake Game</h1>

      <a href="{{ route('difficulty') }}" style="color: white; text-decoration: none; padding: 12px 16px;">Difficulty</a>
      <a href="{{ route('scoreboard') }}" style="color: white; text-decoration: none; padding: 12px 16px;">Scoreboard</a>
      <a href="{{ route('scoreboardreport') }}" style="color: white; text-decoration: none; padding: 12px 16px;">Scoreboard report</a>

    </header>

    <div class="wrapper">
        <div style= color:white; class ="top" >*press "p" or "spacebar" to pause the game</div>
      <div class="game-details">
        <span class="score">Score: 0</span>
        <span class="high-score">High Score: 0</span>
      </div>
      <div class="play-board"></div>
      <div class="controls">
        <i data-key="ArrowLeft" class="fa-solid fa-arrow-left-long"></i>
        <i data-key="ArrowUp" class="fa-solid fa-arrow-up-long"></i>
        <i data-key="ArrowRight" class="fa-solid fa-arrow-right-long"></i>
        <i data-key="ArrowDown" class="fa-solid fa-arrow-down-long"></i>
        <button class="pause-button" data-key="p">Pause (P)</button>
      </div>
    </div>
  </body>
</html>
