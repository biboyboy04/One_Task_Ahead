<!DOCTYPE html>
<html>

<head>
  <title> One Task Ahead </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/OTA_Login.css">

</head>


<body>
  <div class="container">
    <h1> Login to One Task Ahead!</h1>

    <form action="../php/login.inc.php" method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="password">
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p class='error' > Fill in all fields!</p>";
        } else if ($_GET["error"] == "wronglogin") {
          echo "<p class='error' > Incorrect credentials.</p>";
        }
      }
      ?>
      <button type="submit" name="submit">Login</button>

    </form>
    <p>Need an Account?</p>
    <a href="../html/signup.php">Sign Up</a>
  </div>