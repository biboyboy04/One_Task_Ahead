<?php include '../php/signup.inc.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">

    <?php
    if ($firstname_error != null) {
    ?> <style>
            .firstname-error {
                display: block
            }
        </style> <?php
                }
                if ($lastname_error != null) {
                    ?> <style>
            .lastname-error {
                display: block
            }
        </style> <?php
                }
                if ($username_error != null) {
                    ?> <style>
            .username-error {
                display: block
            }
        </style> <?php
                }
                if ($email_error != null) {
                    ?> <style>
            .email-error {
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
                if ($rptpassword_error != null) {
                    ?> <style>
            .rptpassword-error {
                display: block
            }
        </style> <?php
                }
                    ?>


</head>

<body>
    <div class="signup-form">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $firstname ?>">
            <p class="error firstname-error">
                <?php echo $firstname_error ?>
            </p>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $lastname ?>">
            <p class="error lastname-error">
                <?php echo $lastname_error ?>
            </p>

            <label for="Username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username ?>">
            <p class="error username-error">
                <?php echo $username_error ?>
            </p>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email ?>">
            <p class="error email-error">
                <?php echo $email_error ?>
            </p>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password ?>">
            <p class="error password-error">
                <?php echo $password_error ?>
            </p>

            <label for="repeat-password">Repeat Password:</label>
            <input type="password" id="repeat-password" name="repeat-password" value="<?php echo $rptpassword ?>">
            <p class="error rptpassword-error">
                <?php echo $rptpassword_error ?>
            </p>

            <button type="submit" id="submit-btn" name="submit">Sign Up</button>
        </form>
    </div>

</body>

</html>