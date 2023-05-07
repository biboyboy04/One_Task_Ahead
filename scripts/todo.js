export const todoModule = (() => {
  const form = document.getElementById("todo-form");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    addTask();
  });

  function addTaskToActivity(activity) {
    const activityData = activity.getAttribute("data-activity");
    switch (activityData) {
      case "todo":
        addToTodo(activity);
        break;
      case "doing":
        addToDoing(activity);
        break;
      case "done":
        addToDone(activity);
        break;
      default:
        break;
    }
  }

  function addToTodo(task) {
    const todoButton = document.getElementById("todo-submit");
    const todoLane = document.getElementById("todo-lane");
    todoLane.insertBefore(task, todoButton);
  }

  function addToDoing(task) {
    const doingLane = document.getElementById("doing-lane");
    doingLane.appendChild(task);
  }

  function addToDone(task) {
    const doneLane = document.getElementById("done-lane");
    doneLane.appendChild(task);
  }

  function addTask() {
    let inputName = document.getElementById("todo-name-input");
    let inputDescription = document.getElementById("todo-description-input");

    const taskNameInput = inputName.value;
    const taskDescriptionInput = inputDescription.value;

    if (!taskNameInput && !taskDescriptionInput) return;

    const task = createTask(taskNameInput, taskDescriptionInput);

    addToTodo(task);

    // reset form value
    inputName.value = "";
    inputDescription.value = "";
  }

  function createTask(taskNameInput, taskDescriptionInput, activityLane) {
    // Create title and description
    const taskName = createTaskName(taskNameInput);
    const taskDescription = createTaskDescription(taskDescriptionInput);

    const newTaskContainer = document.createElement("div");
    newTaskContainer.classList.add("task");
    newTaskContainer.setAttribute("draggable", "true");
    newTaskContainer.setAttribute("data-activity", activityLane);

    const taskContent = document.createElement("div");
    taskContent.classList.add("task-content");

    taskContent.appendChild(taskName);
    taskContent.appendChild(taskDescription);
    newTaskContainer.appendChild(taskContent);

    // Add buttons
    const taskButtons = document.createElement("div");
    taskButtons.classList.add("task-buttons");

    const editButton = document.createElement("button");
    editButton.innerHTML =
      '<i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>';
    editButton.classList.add("edit-button");

    const deleteButton = document.createElement("button");
    deleteButton.innerHTML =
      '<i class="fa-solid fa-trash fa-lg" style="color: #ffffff;"></i>';
    deleteButton.classList.add("delete-button");

    taskButtons.appendChild(editButton);
    taskButtons.appendChild(deleteButton);
    newTaskContainer.appendChild(taskButtons);

    // Delete button event listener
    deleteButton.addEventListener("click", () => {
      deleteTask(newTaskContainer);
    });

    // Edit button event listener
    editButton.addEventListener("click", () => {
      editTask(newTaskContainer, taskName, taskDescription);
    });

    // Add event listener
    newTaskContainer.addEventListener("dragstart", () => {
      newTaskContainer.classList.add("is-dragging");
    });

    newTaskContainer.addEventListener("dragend", () => {
      newTaskContainer.classList.remove("is-dragging");
    });

    return newTaskContainer;
  }

  function createTaskName(name) {
    const newTaskName = document.createElement("h3");
    newTaskName.classList.add("task-name");
    newTaskName.innerText = name;
    return newTaskName;
  }

  function createTaskDescription(description) {
    const newTaskDescription = document.createElement("p");
    newTaskDescription.classList.add("task-description");

    newTaskDescription.innerText = description;

    return newTaskDescription;
  }

  function deleteTask(task) {
    task.remove();
  }

  //Changeable
  function editTask(taskContainer, taskName, taskDescription) {
    const originalTaskName = taskName.innerText;
    const originalTaskDescription = taskDescription.innerText;

    // Create edit form
    const editForm = document.createElement("form");
    editForm.setAttribute("id", "edit-form");

    const editNameInput = document.createElement("input");
    editNameInput.type = "text";
    editNameInput.placeholder = "Task Name";
    editNameInput.value = originalTaskName;

    const editDescriptionInput = document.createElement("textarea");
    editDescriptionInput.placeholder = "Task Description";
    editDescriptionInput.value = originalTaskDescription;

    const editButtons = document.createElement("div");
    editButtons.classList.add("button-container");

    const editSaveButton = document.createElement("button");
    editSaveButton.innerText = "Save";

    const editCancelButton = document.createElement("button");
    editCancelButton.innerText = "Cancel";

    editButtons.appendChild(editCancelButton);
    editButtons.appendChild(editSaveButton);

    editForm.appendChild(editNameInput);
    editForm.appendChild(editDescriptionInput);
    editForm.appendChild(editButtons);

    // Replace task with edit form
    taskContainer.replaceWith(editForm);

    // Save button event listener
    editSaveButton.addEventListener("click", (e) => {
      e.preventDefault();

      // Changeable to replacing just the name and description

      // Replace edit form with a new created task with the edit values
      editForm.replaceWith(
        createTask(editNameInput.value, editDescriptionInput.value)
      );
    });

    // Cancel button event listener
    editCancelButton.addEventListener("click", () => {
      taskName.innerText = originalTaskName;
      taskDescription.innerText = originalTaskDescription;

      // Replace edit form with original task
      editForm.replaceWith(taskContainer);

      // Add event listeners to task buttons
      const editButton = taskContainer.querySelector(".edit-button");
      const deleteButton = taskContainer.querySelector(".delete-button");

      editButton.addEventListener("click", () => {
        editTask(taskContainer, taskName, taskDescription);
      });

      deleteButton.addEventListener("click", () => {
        deleteTask(taskContainer);
      });
    });
  }

  return { createTask, addTaskToActivity };
})();
