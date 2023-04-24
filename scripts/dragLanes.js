export const dragAndDrop = () => {
  const draggables = document.querySelectorAll(".task");
  const droppables = document.querySelectorAll(".swim-lane");
  const container = document.querySelector(".lanes");

  draggables.forEach((task) => {
    task.addEventListener("dragstart", () => {
      task.classList.add("is-dragging");
      console.log("dragging task");
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

      if (curTask && curTask.classList.contains("task")) {
        // Only execute drag code for tasks
        if (!bottomTask) {
          zone.appendChild(curTask);
        } else {
          zone.insertBefore(curTask, bottomTask);
        }
      } else if (zone.classList.contains("swim-lane")) {
        // Only execute drag code for lanes
        droppables.forEach((card) => {
          card.addEventListener("dragstart", dragStart);
          card.addEventListener("dragend", dragEnd);
          card.addEventListener("dragover", dragOver);
          card.addEventListener("dragenter", dragEnter);
          card.addEventListener("dragleave", dragLeave);
          card.addEventListener("drop", drop);
        });

        let draggingCard = null;

        function dragStart() {
          draggingCard = this;
          setTimeout(() => {
            this.classList.add("dragging");
          }, 0);
        }

        function dragEnd() {
          this.classList.remove("dragging");
          draggingCard = null;
        }

        function dragOver(e) {
          e.preventDefault();
        }

        function dragEnter(e) {
          e.preventDefault();
          this.classList.add("hovered");
        }

        function dragLeave() {
          this.classList.remove("hovered");
        }

        function drop() {
          if (draggingCard == null) {
            return;
          }
          const indexDragging = Array.from(container.children).indexOf(
            draggingCard
          );
          const indexTarget = Array.from(container.children).indexOf(this);
          const difference = indexDragging - indexTarget;

          if (difference > 0) {
            container.insertBefore(draggingCard, this);
          } else {
            container.insertBefore(draggingCard, this.nextSibling);
          }
          this.classList.remove("hovered");
        }
      }
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
};
