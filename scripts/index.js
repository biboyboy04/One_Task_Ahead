import { dragAndDrop } from "./drag.js";

import { todoModule } from "./todo.js";

import "./pomodoro.js";

// call the timer function with a duration of 30 seconds

dragAndDrop();

//Get id of the previous link
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get("id");

switch (id) {
  case "architecture":
    architecture();
    break;
  case "morning-routine":
    morningRoutine();
    break;
  case "school-subjects":
    schoolSubjects();
    break;
  default:
  // code block
}

function architecture() {
  const task1 = todoModule.createTask(
    "Research local building codes",
    " Spend time reviewing the local building codes and regulations for a new project you'll be working on."
  );
  const task2 = todoModule.createTask(
    "Create preliminary design sketches",
    "Using the information gathered from the client meeting, create preliminary design sketches for a new commercial building."
  );
  const task3 = todoModule.createTask(
    "Meet with clients to discuss project goals",
    "Schedule and conduct a meeting with clients to discuss their goals and preferences for a new commercial building."
  );
  const task4 = todoModule.createTask(
    "Develop detailed construction plans",
    "Work with engineers and contractors to develop detailed construction plans for the commercial building project."
  );
  const task5 = todoModule.createTask(
    "Present final design plans to clients",
    "Present the final design plans to the clients, incorporating any feedback or changes requested during previous meetings."
  );
  const task6 = todoModule.createTask(
    "Oversee construction process",
    "Monitor the construction process, ensuring that the plans and specifications are being followed and addressing any issues that arise."
  );

  todoModule.addToTodo(task1);
  todoModule.addToTodo(task2);
  todoModule.addToDoing(task3);
  todoModule.addToDoing(task4);
  todoModule.addToDone(task5);
  todoModule.addToDone(task6);
}

function morningRoutine() {
  const task1 = todoModule.createTask(
    "Pack work bag and leave for the office",
    ""
  );
  const task2 = todoModule.createTask("Get dressed for work", "");
  const task3 = todoModule.createTask("Eat breakfast", "");
  const task4 = todoModule.createTask("Prepare breakfast", "");
  const task5 = todoModule.createTask("Drink a glass of water", "");
  const task6 = todoModule.createTask("Brush teeth and wash face", "");
  const task7 = todoModule.createTask("Wake up at 6:00 AM", "");

  todoModule.addToTodo(task1);
  todoModule.addToTodo(task2);
  todoModule.addToTodo(task3);

  todoModule.addToDoing(task4);
  todoModule.addToDoing(task5);
  todoModule.addToDoing(task6);

  todoModule.addToDone(task7);
}

function schoolSubjects() {
  const task2 = todoModule.createTask(
    "Math homework",
    " Complete the exercises on page 56 of the textbook"
  );
  const task3 = todoModule.createTask(
    "Science project",
    "Research and gather information about the water cycle"
  );
  const task4 = todoModule.createTask(
    "History reading",
    "Read chapter 3 in the textbook and take notes"
  );
  const task5 = todoModule.createTask(
    "English essay",
    'Write a 3-page essay on the theme of friendship in "To Kill a Mockingbird"'
  );
  const task6 = todoModule.createTask(
    "Spanish vocabulary",
    "Review and memorize vocabulary words for the upcoming quiz"
  );
  const task7 = todoModule.createTask(
    "Music practice",
    "Practice playing the piano for 30 minutes"
  );

  const task8 = todoModule.createTask(
    "Physical Education",
    "Attend the gym class and complete the assigned workout"
  );

  todoModule.addToTodo(task2);
  todoModule.addToTodo(task3);

  todoModule.addToDoing(task4);
  todoModule.addToDoing(task5);
  todoModule.addToDoing(task6);

  todoModule.addToDone(task7);
  todoModule.addToDone(task8);
}

// PUT INTO A MODULE
const openModalBtn = document.querySelector("#todo-submit");
const modalContainer = document.querySelector(".todo-form-container");
const closeModal = () => {
  modalContainer.style.display = "none";
  document.body.classList.remove("modal-open");
};
const showModal = () => {
  modalContainer.style.display = "block";
  document.body.classList.add("modal-open");
};

openModalBtn.addEventListener("click", showModal);

modalContainer.addEventListener("click", (e) => {
  if (e.target === modalContainer) {
    closeModal();
  }
});

const myForm = document.getElementById("todo-form");

myForm.addEventListener("submit", (e) => {
  e.preventDefault();
  // handle form submission here
  closeModal();
});
