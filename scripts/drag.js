export const dragAndDrop = () => {
  const draggables = document.querySelectorAll(".task");
  const droppables = document.querySelectorAll(".swim-lane");

  draggables.forEach((task) => {
    task.addEventListener("dragstart", () => {
      task.classList.add("is-dragging");
    });
    task.addEventListener("dragend", () => {
      task.classList.remove("is-dragging");
    });
  });

  droppables.forEach((zone) => {
    zone.addEventListener("dragover", (e) => {
      e.preventDefault();

      const bottomTask = insertAboveTask(zone, e.clientY);
      const curTask = document.querySelector(".is-dragging");
  

      if (!bottomTask) {
        if (zone.id === "todo-lane") {
          zone.insertBefore(curTask, document.getElementById("todo-submit"));
        } else {
          zone.appendChild(curTask);
        }
      } else {
        zone.insertBefore(curTask, bottomTask);
      }

      // Trigger the save action
      saveTasks();
    });
  });

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

  const saveTasks = () => {
    const taskData = [];

    droppables.forEach((zone) => {
      const activity = zone.getAttribute("data-activity");
      zone.querySelectorAll(".task").forEach((task, index) => {
        task.dataset.activity = activity;
        const taskId = task.getAttribute("data-id");
        const taskName = task.querySelector(".task-name").textContent;
        const taskDesc = task.querySelector(".task-description").textContent;
        const workspaceId = task.getAttribute("data-workspace");

        const taskObj = {
          task_id: taskId,
          activity: activity,
          task_name: taskName,
          task_desc: taskDesc,
          task_number: index,
          workspace_id: workspaceId
        };

        taskData.push(taskObj);
      });
    });

    const taskDataJSON = JSON.stringify(taskData);
    
    const urlParams = new URLSearchParams(window.location.search);
    const urlIdTemplate = urlParams.get('id');
    const urlIdBoard = urlParams.get('board_id');
    let url;

    if (urlIdTemplate) {
      url = '../php/update_task.php';
    } else if (urlIdBoard) {
      url = '../php/update_board_task.php';
    }


    // Send the task data to the PHP file using AJAX
    $.ajax({
      type: 'POST',
      url: url,
      data: { task_data: taskDataJSON },
      success: function(response) {
        console.log(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  };
};
