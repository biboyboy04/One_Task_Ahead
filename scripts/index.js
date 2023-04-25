import { dragAndDrop } from "./drag.js";

import { todoModule } from "./todo.js";

import "./pomodoro.js";

// call the timer function with a duration of 30 seconds

dragAndDrop();

const todoLane = document.getElementById("todo-lane");
const doingLane = document.getElementById("doing-lane");
const doneLane = document.getElementById("done-lane");

const todoButton = document.getElementById("todo-submit");
const newTask = todoModule.createTask("Eat", "");
const newTask1 = todoModule.createTask("Eat1", "");
const newTask2 = todoModule.createTask("Eat2", "");

todoLane.insertBefore(newTask, todoButton);
todoLane.insertBefore(newTask1, todoButton);
todoLane.insertBefore(newTask2, todoButton);

const newTask3 = todoModule.createTask("Eat2", "");
const newTask4 = todoModule.createTask("Eat2", "");
const newTask5 = todoModule.createTask("Eat2", "");
doingLane.appendChild(newTask3);
doingLane.appendChild(newTask4);
doingLane.appendChild(newTask5);

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

// Architecture
// To Do

// Design Concept
// Design Objectives
// Design Goals
// Design Philosophy

// Daily Routine
// To Do
// Morning

// Afternoon

// Evening

// School Subjects
// Assessment
// Essay
// Quiz
// Powerpoint
