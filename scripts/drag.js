// Define the drag and drop module
export const dragAndDrop = () => {
  const draggables = document.querySelectorAll(".task");
  const droppables = document.querySelectorAll(".swim-lane");

  draggables.forEach((task) => {
    task.addEventListener("dragstart", () => {
      task.classList.add("is-dragging");
    });
    task.addEventListener("dragend", () => {
      task.classList.remove("is-dragging");
      const form = document.createElement("form");
      form.setAttribute("method", "post");
      form.setAttribute("action", "../php/update_task.php"); // replace with your server-side script
      const hiddenInput = document.createElement("input");
      hiddenInput.setAttribute("type", "hidden");
      hiddenInput.setAttribute("name", "task_id"); // replace with the name of the input field that contains the task ID
      hiddenInput.setAttribute("value", task.getAttribute("data-id")); // replace with the value of the task ID
      form.appendChild(hiddenInput);

      // increment all data-id
      const swimLane = task.closest(".swim-lane");
      const activity = swimLane.getAttribute("data-activity");
      const children = swimLane.querySelectorAll(".task");
      children.forEach((child, index) => {
        child.setAttribute("data-id", index + 1);
      });

      const taskName = task.querySelector(".task-name").textContent;
      const taskDesc = task.querySelector(".task-description").textContent;
      console.log("Task Name:", taskName);
      console.log("Task Description:", taskDesc);
      const taskActivity = document.createElement("input");
      taskActivity.setAttribute("type", "hidden");
      taskActivity.setAttribute("name", "activity");
      taskActivity.setAttribute("value", activity);
      form.appendChild(taskActivity);

      const taskNameInput = document.createElement("input");
      taskNameInput.setAttribute("type", "hidden");
      taskNameInput.setAttribute("name", "task_name");
      taskNameInput.setAttribute("value", taskName);
      form.appendChild(taskNameInput);

      const taskDescInput = document.createElement("input");
      taskDescInput.setAttribute("type", "hidden");
      taskDescInput.setAttribute("name", "task_desc");
      taskDescInput.setAttribute("value", taskDesc);
      form.appendChild(taskDescInput);

      document.body.appendChild(form);
      form.submit();
    });
  });

  droppables.forEach((zone) => {
    zone.addEventListener("dragover", (e) => {
      e.preventDefault();

      const bottomTask = insertAboveTask(zone, e.clientY);
      const curTask = document.querySelector(".is-dragging");
      const todoButton = document.getElementById("todo-submit");

      if (!bottomTask) {
        if (zone.id == todoButton.parentElement.id)
          zone.insertBefore(curTask, todoButton);
        else zone.appendChild(curTask);
      } else {
        zone.insertBefore(curTask, bottomTask);
      }
    });
  });

  // Get the element closest to the mouse
  const insertAboveTask = (zone, mouseY) => {
    const els = zone.querySelectorAll(".task:not(.is-dragging)");

    let closestTask = null;
    let closestOffset = Number.NEGATIVE_INFINITY;

    els.forEach((task) => {
      const { top } = task.getBoundingClientRect();

      const offset = mouseY - top;

      if (offset < 0 && offset > closestOffset) {
        closestOffset = offset;
        closestTask = task;
      }
    });

    return closestTask;
  };
};
