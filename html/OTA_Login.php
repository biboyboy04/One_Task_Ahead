<?php include '../php/login.inc.php' ?>

<!DOCTYPE html>
<html>

<head>
  <title> One Task Ahead </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/OTA_Login.css">

  <?php
  if ($username_error != null) {
  ?> <style>
      .username-error {
        display: block
      }
    </style> <?php
            }
            if ($password_error != null) {
              ?> <style>
      .password-error {
        display: block
      }
    </style> <?php
            }
              ?>



</head>

<body>
  <div class="container">
    <h1> Login to One Task Ahead!</h1>
    <form action="" method="post">
      <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>">
      <p class="error username-error">
        <?php echo $username_error ?>
      </p>

      <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>">
      <p class="error password-error">
        <?php echo $password_error ?>
      </p>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>

