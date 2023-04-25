export const todoModule = (() => {
  const form = document.getElementById("todo-form");

  const todoLane = document.getElementById("todo-lane");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    addTask();
  });

  function addTask() {
    let inputName = document.getElementById("todo-name-input");
    let inputDescription = document.getElementById("todo-description-input");

    const taskNameInput = inputName.value;
    const taskDescriptionInput = inputDescription.value;

    if (!taskNameInput && !taskDescriptionInput) return;

    const task = createTask(taskNameInput, taskDescriptionInput);

    const todoButton = document.getElementById("todo-submit");

    todoLane.insertBefore(task, todoButton);

    // reset form value
    inputName.value = "";
    inputDescription.value = "";
  }

  function createTask(taskNameInput, taskDescriptionInput) {
    // Create title and description
    const taskName = createTaskName(taskNameInput);
    const taskDescription = createTaskDescription(taskDescriptionInput);

    const newTaskContainer = document.createElement("div");
    newTaskContainer.classList.add("task");
    newTaskContainer.setAttribute("draggable", "true");

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
    const editForm = document.createElement("form");
    editForm.setAttribute("id", "edit-form");

    const editNameInput = document.createElement("input");
    editNameInput.type = "text";
    editNameInput.placeholder = "Task Name";
    editNameInput.value = taskName.innerText;

    const editDescriptionInput = document.createElement("textarea");
    editDescriptionInput.placeholder = "Task Description";
    editDescriptionInput.value = taskDescription.innerText;

    const editButtons = document.createElement("div");
    editButtons.classList.add("button-container");

    const editSubmitButton = document.createElement("button");
    editSubmitButton.innerText = "Save";

    const editCancelButton = document.createElement("button");
    editCancelButton.innerText = "Cancel";

    editButtons.appendChild(editCancelButton);
    editButtons.appendChild(editSubmitButton);

    editForm.appendChild(editNameInput);
    editForm.appendChild(editDescriptionInput);
    editForm.appendChild(editButtons);

    // Replace task with edit form
    taskContainer.replaceWith(editForm);

    // Submit button event listener
    editSubmitButton.addEventListener("click", (e) => {
      e.preventDefault();
      const updatedTaskName = createTaskName(editNameInput.value);
      const updatedTaskDescription = createTaskDescription(
        editDescriptionInput.value
      );

      taskName.replaceWith(updatedTaskName);
      taskDescription.replaceWith(updatedTaskDescription);

      taskName = updatedTaskName;
      taskDescription = updatedTaskDescription;

      // Replace edit form with updated task
      editForm.replaceWith(taskContainer);
    });

    // Cancel button event listener
    editCancelButton.addEventListener("click", () => {
      editForm.replaceWith(taskContainer);
    });
  }
  return { createTask };
})();
