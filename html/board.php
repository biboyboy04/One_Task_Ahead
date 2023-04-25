<?php
session_start();
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

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
          echo '<a href="#" id="signupBtn">Hi, ' . $_SESSION['username'] . '</a>';
          echo '<a href="#"><img src="../images/profilepic.png"></a>';
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
        <button id="start">Start</button> <button id="stop">Stop</button>
        <button id="reset">Reset</button>
      </div>
    </div>
    <div class="todo-form-container">
      <form id="todo-form">
        <h2>Create a new task</h2>
        <input name="name" type="text" placeholder="New TODO name..." id="todo-name-input" />

        <textarea name="description" id="todo-description-input" cols="30" rows="10" placeholder="New TODO description..."></textarea>

        <button type="submit">Add +</button>
      </form>
    </div>

    <div class="lanes">
      <div class="swim-lane" id="todo-lane" draggable="true">
        <h3 class="heading">TODO</h3>
        <button id="todo-submit" type="submit">Add +</button>
      </div>

      <div class="swim-lane" id="doing-lane" draggable="true">
        <h3 class="heading">Doing</h3>
      </div>

      <div class="swim-lane" id="done-lane" draggable="true">
        <h3 class="heading">Done</h3>
      </div>
    </div>
  </div>
  <script>
    function logId(id) {
      console.log(id) // log the id to the console
    }

    // retrieve the parameter from the URL
    var id = window.location.hash.substring(1)

    // call the function with the parameter
    logId(id)
  </script>
</body>

</html>