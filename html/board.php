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
        <span id="minutes">0</span>:<span id="seconds">03</span>
      </div>
      <div class="buttons">
        <button id="start">Start</button> <button id="stop">Pause</button>
        <button id="reset">Reset</button>
        <button id="save">Save Tasks</button>

      </div>
    </div>
    <div class="todo-form-container">
        <?php
        $temp_id = isset($_GET["id"]) ? $_GET["id"] : null;
        ?>
        <form id="todo-form" action='../php/add_task.php' method="POST">
            <h2>Create a new task</h2>
            <input name="name" type="text" placeholder="New TODO name..." id="todo-name-input" />
            <textarea name="description" id="todo-description-input" cols="30" rows="10" placeholder="New TODO description..."></textarea>
            <input type="hidden" name="temp_id" value="<?php echo $temp_id; ?>">
            <button type="submit">Add +</button>
        </form>
    </div>

    <div class="edit-form-container">
        <?php
        $temp_id = isset($_GET["id"]) ? $_GET["id"] : null;
        ?>
        <form id="edit-form" action='../php/add_task.php' method="POST">
            <h2>Create a new task</h2>
            <input name="name" type="text" placeholder="New task name..." id="edit-name-input" />
            <textarea name="description" id="edit-description-input" cols="30" rows="10" placeholder="New task description..."></textarea>
            <input type="hidden" name="temp_id" value="<?php echo $temp_id; ?>">
            <button type="submit">Add +</button>
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
 const submitButton = document.querySelector('#save');
 // Submit the form when the button is clicked
 submitButton.addEventListener('click', function(event) {

  event.preventDefault(); // Prevent the default form submission behavior
  const taskData = []; // Array to store task data
  const swimLanes = document.getElementsByClassName('swim-lane');
  // Iterate through each swim lane
  for (let i = 0; i < swimLanes.length; i++) {
    const swimLane = swimLanes[i];
    const activity = swimLane.dataset.activity; // Retrieve the data-activity value of the swim lane

    // Retrieve tasks within the current swim lane
    const tasks = swimLane.getElementsByClassName('task');

    // Iterate through each task
    for (let j = 0; j < tasks.length; j++) {
      const task = tasks[j];
      const taskName = task.querySelector('.task-name').textContent; // Retrieve the task name text
      const taskDesc = task.querySelector('.task-description').textContent; // Retrieve the task description text

      // Create a task object with the task data
      const taskObj = {
        task_id: task.dataset.id,
        activity: activity,
        task_name: taskName,
        task_desc: taskDesc,
        task_number: j
      };

      // Push the task object to the taskData array
      taskData.push(taskObj);
    }
  }

  // Convert the taskData array to a JSON string
  const taskDataJSON = JSON.stringify(taskData);

  // Create a form dynamically for sending the task data to PHP
  const form = document.createElement('form');
  form.action = '../php/update_task.php';
  form.method = 'POST';

  const taskDataInput = document.createElement('input');
  taskDataInput.type = 'hidden';
  taskDataInput.name = 'task_data';
  taskDataInput.value = taskDataJSON;

  form.appendChild(taskDataInput);
  // Submit button

  
  // Append the form to the document body
  document.body.appendChild(form);

    form.submit();
 });

  </script>

</body>
</html>

<!-- sort by activity and render by that -->
<!-- if else so that theres no sorting -->|

