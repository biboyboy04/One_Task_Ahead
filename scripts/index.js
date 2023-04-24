import { dragAndDrop } from "./drag.js";

import { todoModule } from "./todo.js";

dragAndDrop();

const todoLane = document.getElementById("todo-lane");
const newTask = todoModule.createTask("Eat", "");
const newTask1 = todoModule.createTask("Eat1", "");
const newTask2 = todoModule.createTask("Eat2", "");
const newTask3 = todoModule.createTask("Sleep", "");
const newTask4 = todoModule.createTask("Things", "");

todoLane.appendChild(newTask);
todoLane.appendChild(newTask1);
todoLane.appendChild(newTask2);
todoLane.appendChild(newTask3);
todoLane.appendChild(newTask4);
