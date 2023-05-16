<?php
include('../php/dbh.php');
include('../php/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Board Name</title>
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/board.css" />
  <link rel="stylesheet" href="../css/nav_bar.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="../scripts/index.js"></script>
  <script src="https://kit.fontawesome.com/c36cb32178.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <a href="./home.php">
      <div class="logo">ONE TASK AHEAD</div>
    </a>
    <ul>
      <li>
        <a href="./templates.php">Templates</a>
      </li>
      <li>
        <a href="./boards.php">Boards</a>
      </li>
      <li>
        <a href="#">Workspace</a>
        <ul>
          <li><a href="#">Workspace 1</a></li>
          <li><a href="#">Workspace 2</a></li>
          <li><a href="#">Workspace 3</a></li>
        </ul>
      </li>

      <li>
        <a href="#">Recent</a>
        <ul>
          <li><a href="./board.php?id=architecture">Recent 1</a></li>
          <li><a href="./board.php?id=morning-routine">Recent 2</a></li>
          <li><a href="./board.php?id=school-subjects">Recent 3</a></li>
        </ul>
      </li>
      <li id="create-btn"><a href="./board.php">Create</a></li>
      <!--SIgn up and login button-->
      <div class="ppic">
        <?php
        if (isset($_SESSION['username'])) {
          //for now there is no profile page
          echo '<a href="../html/profilepage.php" id="signupBtn">Hi, ' . $_SESSION['username'] . '</a>';
          echo '<a href="../html/profilepage.php"><img src="../images/profilepic.png"></a>';
          echo '<ul class="logout">';
          echo '<li><a href="../php/logout.inc.php">Logout</a></li>';
          echo '</ul>';
        } else {
          echo '<li id="signupBtn2"><a href="../html/signup.php">Sign up</a></li>';
          echo '<li id="signupBtn3"><a href="../html/OTA_Login.php">Login</a></li>';
        }
        ?>
      </div>
    </ul>
  </nav>
  <div class="header">
    <h1 id="project-name">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $id = strtoupper($id); // Convert to uppercase
        $id = str_replace('-', ' ', $id); // Replace "-" with spaces
        echo $id; // Output: ARCHITECTURE
      } else {
        echo "New Task";
      }
      ?>

    </h1>
    <h2>l Public l</h2>
    <i class="fa-sharp fa-regular fa-calendar fa-2xl" style="color: #ffffff"></i>
    <button>CALENDAR POWER-UP</button>
    <button>FILTERS</button>
  </div>
  <div class="board">
    <div class="pomodoro-timer">
      <div class="timer">
        <span id="minutes">25</span>:<span id="seconds">00</span>
      </div>
      <div class="buttons">
        <button id="start">Start</button> <button id="stop">Pause</button>
        <button id="reset">Reset</button>
      </div>
    </div>
    <div class="todo-form-container">
        <?php
        $temp_id = isset($_GET["id"]) ? $_GET["id"] : null;
        ?>
        <form id="todo-form">
            <h2>Create a new task</h2>
            <input name="name" type="text" placeholder="New TODO name..." id="todo-name-input" />
            <textarea name="description" id="todo-description-input" cols="30" rows="10" placeholder="New TODO description..."></textarea>
            <input type="hidden" name="temp_id" value="<?php echo $temp_id; ?>">
            <button id="todo-form-submit" type="submit">Add +</button>
        </form>
    </div>

    <div class="edit-form-container">
        <?php
        $temp_id = isset($_GET["id"]) ? $_GET["id"] : null;
        ?>
        <form id="edit-form">
            <h2>Edit Task</h2>
            <input name="name" type="text" placeholder="New task name..." id="edit-name-input" />
            <textarea name="description" id="edit-description-input" cols="30" rows="10" placeholder="New task description..."></textarea>
            <input id = "task_id" type="hidden" name="task_id" value="">
            <input id = "activity" type="hidden" name="activity" value="">
            <input id = "number" type="hidden" name="number" value="">
            <input type="hidden" name="temp_id" value="<?php echo $temp_id; ?>">
            <button id="edit-form-submit" type="submit">Edit</button>
        </form>
    </div>

    <div class="lanes">

      <div class="swim-lane" id="todo-lane" draggable="true" data-activity="todo">
        <h3 class="heading">TODO</h3>
        <?php
        $temp_id = isset($_GET["id"]) ? $_GET["id"] : null;
        $template = getTemplateTasks($conn, $temp_id, "todo");
        renderTasks($template);
        ?>
        <button id="todo-submit" type="submit">Add +</button>
      </div>

      <div class="swim-lane" id="doing-lane" draggable="true" data-activity="doing">
        <h3 class="heading">Doing</h3>
        <?php
        $template = getTemplateTasks($conn, $temp_id, "doing");
        renderTasks($template);
        ?>
      </div>

      <div class="swim-lane" id="done-lane" draggable="true" data-activity="done">
        <h3 class="heading">Done</h3>
        <?php
        $template = getTemplateTasks($conn, $temp_id, "done");
        renderTasks($template);
        ?>
      </div>
    </div>
  </div>


  <script>

// AJAX FOR ADD TASK
$(document).ready(function() {
  // Add event listener to todo-form-submit button
  $('#todo-form-submit').click(function(event) {
    event.preventDefault();

    // Get the form data
    const name = $('#todo-name-input').val();
    const description = $('#todo-description-input').val();
    const temp_id = $('input[name="temp_id"]').val();

    // Send the AJAX request
    $.ajax({
      type: 'POST',
      url: '../php/add_task.php',
      data: {
        name: name,
        description: description,
        temp_id: temp_id
      },
      success: function(response) {
        // Append the new task HTML to the swim lane
        const newTask = `
          <div class="task" draggable="true" data-id="${response.taskid}" data-number="${response.number}">
            <div class="task-content">
              <h3 class="task-name">${response.title}</h3>
              <p class="task-description">${response.description}</p>
            </div>
            <div class="task-buttons">
              <button class="edit-button" onclick="openModal(${response.taskid}, '${response.title}', '${response.description}', '${response.lane}', '${response.number}')">
                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>
              </button>
              <form class="delete-task-form">
                <input type="hidden" name="task_id" value="${response.taskid}">
                <button type="button" class="delete-button"><i class="fa-solid fa-trash fa-lg" style="color: #ffffff;"></i></button>
              </form>
            </div>
          </div>
        `;
        const todoButton = document.getElementById("todo-submit");
        const todoLane = document.getElementById("todo-lane");
        $(newTask).insertBefore(todoButton);

        // Clear the form inputs
        $('#todo-name-input').val('');
        $('#todo-description-input').val('');

        // Hide the modal
        $('.todo-form-container').hide();
      },
      error: function(xhr, status, error) {
        // Handle the error if the AJAX request fails
        console.log(error);
      }
    });
  });
});


// AJAX FOR EDIT TASK

$(document).ready(function() {
  // Submit the form when the Edit button is clicked
  $('#edit-form-submit').click(function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Get the task ID and other form data
    const taskId = $('#task_id').val();
    const title = $('#edit-name-input').val();
    const description = $('#edit-description-input').val();
    const activity = $('#activity').val();
    const number = $('#number').val();

    // Create an object with the form data
    const formData = {
      task_id: taskId,
      title: title,
      description: description,
      activity: activity,
      number: number
    };

    // Send the form data to the PHP file using AJAX
    $.ajax({
      type: 'POST',
      url: '../php/edit_task.php',
      data: formData,
      success: function(response) {
        // Handle the response from the PHP file if needed
        console.log(response);
        const taskElement = $('[data-id="' + taskId + '"]');
        taskElement.find('.task-name').text(title);
        taskElement.find('.task-description').text(description);
        taskElement.attr('data-activity', activity);

        // Hide the edit form container
        $('.edit-form-container').hide();
      },
      error: function(xhr, status, error) {
        // Handle errors if any
        console.error(error);
      }
    });
  });

  // Hide the edit form container when the modal is closed
  $('.edit-form-container').on('click', function(event) {
    if ($(event.target).hasClass('edit-form-container')) {
      $(this).hide();
    }
  });
});



// AJAX FOR DELETE

$(document).on('click', '.delete-button', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Confirm the deletion with a confirmation dialog
    if (!confirm('Are you sure you want to delete this task?')) {
      return;
    }

    // Get the task ID from the hidden input field
    const taskId = $(this).siblings('input[name="task_id"]').val();

    // Send the AJAX request
    $.ajax({
      type: 'POST',
      url: '../php/delete_task.php',
      data: { task_id: taskId },
      success: function(response) {
        // Handle the response from the PHP file if needed
        console.log(response);

        // Remove the deleted task element from the DOM
        $(event.target).closest('.task').remove();
      },
      error: function(xhr, status, error) {
        // Handle errors if any
        console.error(error);
      }
    });
  });


// AJAX FOR EDIT MODAL:
$(document).ready(function() {
  // Add event listener to edit button
  $('.edit-button').click(function(event) {
    event.preventDefault();

    // Get the task data from the current task element
    const $taskElement = $(this).closest('.task');
    const taskId = $taskElement.data('id');
    const title = $taskElement.find('.task-name').text();
    const description = $taskElement.find('.task-description').text();
    const activity = $taskElement.data('activity');
    const number = $taskElement.data('number');

    // Call openModal to populate the modal fields
    openModal(taskId, title, description, activity, number);
  });
});

function openModal(taskId, title, description, activity, number) {
  // Get the modal element
  const modalContainerEdit = document.querySelector(".edit-form-container");

  // Set the task ID in the modal
  const taskInput = document.getElementById("task_id");
  taskInput.value = taskId;

  // Set other values in the modal
  document.getElementById("edit-name-input").value = title;
  document.getElementById("edit-description-input").value = description;
  document.getElementById("activity").value = activity;
  document.getElementById("number").value = number;

  // Open the modal
  modalContainerEdit.style.display = "block";
  document.body.classList.add("modal-open");
}


const modalContainerEdit = document.querySelector(".edit-form-container");
const closeModal = () => {
  modalContainerEdit.style.display = "none";
  document.body.classList.remove("modal-open");
};
const showModal = () => {
  modalContainerEdit.style.display = "block";
  document.body.classList.add("modal-open");
};

modalContainerEdit.addEventListener("click", (e) => {
  if (e.target === modalContainerEdit) {
    closeModal();
  }
});


  </script>


</body>
</html>

<!-- sort by activity and render by that -->
<!-- if else so that theres no sorting -->|

