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
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/nav_bar.css" />
  <link rel="stylesheet" href="../css/footer.css" />
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
  <!-- sidebar -->
  <div class="content-container">
    <div class="sidebar">
      <div class="links">
        <ul>
          <a href="./boards.php">
            <li>Boards</li>
          </a>
          <a href="./templates.php">
            <li>Templates</li>
          </a>
          <a href="./home.php">
            <li>Home</li>
          </a>
        </ul>
      </div>
      <hr />
      <div class="workspace">
        <div class="header">
          <h2>Workspaces</h2>
          <i class="fa-solid fa-circle-chevron-down fa-xl" style="color: #ffffff"></i>
        </div>
      </div>
    </div>
    <!-- content -->
    <div class="content">
      <div class="templates-popular">
        <h2>MOST POPULAR TEMPLATES</h2>
        <p>Get going faster with a template from the community or
          <span class="category-btn">choose a category
            <i class="fa-solid fa-caret-down fa-lg" style="color: #ffffff; margin-left:5px;"></i></span>
        </p>
        <div class="container">
          <a href="./board.php?id=architecture">
            <div class="card" id="architecture">Architecture</div>
          </a>
          <a href="./board.php?id=morning-routine">
            <div class="card" id="card2">Morning Routine</div>
          </a>
          <a href="./board.php?id=school-subjects">
            <div class="card" id="card3">School Subjects</div>
          </a>
        </div>
      </div>
      <div class="workspaces-user">
        <h2>YOUR WORKSPACES</h2>
        <div class="container">
          <div class="card">Adamson</div>
          <div class="card">Upwork</div>
          <div class="card">LinkedIn</div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <p>ONE TASK AHEAD © 2023</p>
    <p>All Rights Reserved.</p>
  </footer>
</body>

</html>