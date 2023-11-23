const playBoard = document.querySelector(".play-board");
const scoreElement = document.querySelector(".score");
const highScoreElement = document.querySelector(".high-score");
const controls = document.querySelectorAll(".controls i");

let gameOver = false;
let isPaused = false; // Variable to track the game's pause state
let foodX, foodY;
let snakeX = 5, snakeY = 5;
let velocityX = 0, velocityY = 0;
let snakeBody = [];
let setIntervalId;
let score = 0;

// Getting high score from local storage
let highScore = localStorage.getItem("high-score") || 0;
highScoreElement.innerText = `High Score: ${highScore}`;

const updateFoodPosition = () => {
    // Passing a random 1 - 30 value as food position
    console.log('reset food');
    foodX = Math.floor(Math.random() * 30) + 1;
    foodY = Math.floor(Math.random() * 30) + 1;
}

const handleGameOver = () => {
    clearInterval(setIntervalId);

    // Prompt the user for their name
    const user = prompt("Game Over! Enter your name:");

    // Get existing scores from local storage
    const scores = JSON.parse(localStorage.getItem("snakeGameScores")) || [];

    // Add the current user's score to the scores array
    scores.push({ user, score });

    // Sort the scores array by score in descending order
    scores.sort((a, b) => b.score - a.score);

    // Store the updated scores array in local storage
    localStorage.setItem("snakeGameScores", JSON.stringify(scores));

    // Reload the page
    location.reload();
  };
// Add this code to your JavaScript
const pauseButton = document.querySelector(".pause-button");

pauseButton.addEventListener("click", () => {
    isPaused = !isPaused; // Toggle the pause state
});

// Modify the changeDirection function to handle "p" key as well
const changeDirection = e => {
    if (e.key === "ArrowUp" && velocityY !== 1) {
        velocityX = 0;
        velocityY = -1;
        console.log('going up');
    } else if (e.key === "ArrowDown" && velocityY !== -1) {
        velocityX = 0;
        velocityY = 1;
        console.log('going down');
    } else if (e.key === "ArrowLeft" && velocityX !== 1) {
        velocityX = -1;
        velocityY = 0;
        console.log('going left');
    } else if (e.key === "ArrowRight" && velocityX !== -1) {
        velocityX = 1;
        velocityY = 0;
        console.log('going right');
    } else if (e.key === " ") {
        isPaused = !isPaused; // Toggle the pause state
    } else if (e.key === "p") {
        isPaused = !isPaused; // Toggle the pause state when "p" is pressed
    }
};


// Calling changeDirection on each key click and passing key dataset value as an object
controls.forEach(button => button.addEventListener("click", () => changeDirection({ key: button.dataset.key })));

const initGame = () => {
    if (gameOver) return handleGameOver();
    if (isPaused) return; // Pause the game

    let html = `<div class="food" style="grid-area: ${foodY} / ${foodX}"></div>`;

    // Checking if the snake hit the food
    if (snakeX === foodX && snakeY === foodY) {
        updateFoodPosition();
        snakeBody.push([foodY, foodX]); // Pushing food position to the snake body array
        score++; // increment score by 1
        highScore = score >= highScore ? score : highScore;
        localStorage.setItem("high-score", highScore);
        scoreElement.innerText = `Score: ${score}`;
        highScoreElement.innerText = `High Score: ${highScore}`;
    }
    // Updating the snake's head position based on the current velocity
    snakeX += velocityX;
    console.log("moving");
    snakeY += velocityY;

    // Shifting forward the values of the elements in the snake body by one
    for (let i = snakeBody.length - 1; i > 0; i--) {
        snakeBody[i] = snakeBody[i - 1];
    }
    snakeBody[0] = [snakeX, snakeY]; // Setting the first element of the snake body to the current snake position

    // Checking if the snake's head is out of the wall, if so, set gameOver to true
    if (snakeX <= 0 || snakeX > 30 || snakeY <= 0 || snakeY > 30) {
        return gameOver = true;
    }

    for (let i = 0; i < snakeBody.length; i++) {
        // Adding a div for each part of the snake's body
        html += `<div class="head" style="grid-area: ${snakeBody[i][1]} / ${snakeBody[i][0]}"></div>`;
        // Checking if the snake head hit the body, if so, set gameOver to true
        console.log("snake not dead yet");
        if (i !== 0 && snakeBody[0][1] === snakeBody[i][1] && snakeBody[0][0] === snakeBody[i][0]) {
            gameOver = true;
        }
        if (isPaused) {
            break;
        }
    }
    playBoard.innerHTML = html;
}

updateFoodPosition();
setIntervalId = setInterval(initGame, 50);
document.addEventListener("keyup", changeDirection);
