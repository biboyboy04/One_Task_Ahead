import { dragAndDrop } from "./drag.js";

import { todoModule } from "./todo.js";

import { architecture, morningRoutine, schoolSubjects } from "./templates.js";

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
    break;
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
