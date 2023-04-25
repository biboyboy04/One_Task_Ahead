let countdown;
let timeRemaining;

const timerDisplay = document.querySelector(".timer");
const startButton = document.querySelector("#start");
const stopButton = document.querySelector("#stop");
const resetButton = document.querySelector("#reset");
const minutesInput = document.querySelector("#minutes");
const secondsInput = document.querySelector("#seconds");

function timer(seconds) {
  clearInterval(countdown);

  const now = Date.now();
  const then = now + seconds * 1000;

  displayTimeLeft(seconds);

  countdown = setInterval(() => {
    timeRemaining = then - Date.now();
    if (timeRemaining < 0) {
      clearInterval(countdown);
      breakTimer();
      return;
    }

    displayTimeLeft(Math.round(timeRemaining / 1000));
  }, 1000);
}

function breakTimer() {
  minutesInput.textContent = "5";
  secondsInput.textContent = "00";
  timerDisplay.textContent = "5:00";

  setTimeout(() => {
    minutesInput.textContent = "25";
    secondsInput.textContent = "00";
    timerDisplay.textContent = "25:00";
    timer(minutesInput.textContent * 60);
  }, 5 * 60 * 1000);
}

function displayTimeLeft(seconds) {
  const minutes = Math.floor(seconds / 60);
  const remainderSeconds = (seconds % 60).toFixed(0).padStart(2, "0");

  minutesInput.textContent = minutes;
  secondsInput.textContent = remainderSeconds;

  timerDisplay.textContent = `${minutes}:${remainderSeconds}`;
}

startButton.addEventListener("click", () => {
  let seconds =
    minutesInput.textContent * 60 + Number(secondsInput.textContent);
  timer(seconds);
});

stopButton.addEventListener("click", () => {
  clearInterval(countdown);
});

resetButton.addEventListener("click", () => {
  clearInterval(countdown);
  minutesInput.textContent = "25";
  secondsInput.textContent = "00";
  timerDisplay.textContent = "25:00";
  timeRemaining = undefined;
});

// initialize the timer
timerDisplay.textContent = "25:00";
