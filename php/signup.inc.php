<?php

$firstname = "";
$lastname = "";
$username = "";
$email = "";
$password = "";
$rptpassword = "";


$firstname_error = null;
$lastname_error = null;
$username_error = null;
$email_error = null;
$password_error = null;
$rptpassword_error = null;

if (isset($_POST["submit"])) {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rptpassword = $_POST["repeat-password"];

    include 'dbh.php';
    include 'functions.php';

    if (emptyInputSignup($firstname, $lastname, $email, $username, $password, $rptpassword) !== false) {
        $firstname_error = $firstname_return_error;
        $lastname_error = $lastname_return_error;
        $email_error = $email_return_error;
        $username_error = $username_return_error;
        $password_error = $password_return_error;
        $rptpassword_error = $rptpassword_return_error;
    }
    //to check invalid emails
    if (invalidEmail($email) !== false && !empty($email)) {
        $email_error = $email_return_error;
    }

    //to check invalid username
    if (invalidUsername($username) !== false) {
        $username_error = $username_return_error;
    }

    //to check if the password is the same
    if (passMatch($password, $rptpassword) !== false) {
        $rptpassword_error = $rptpassword_return_error;
    }
    //check if user exists
    //to check if the user already exists
    if (userExists($conn, $username, $email) !== false) {
        $email_error = $email_return_error;
        $username_error = $username_return_error;
    }


    //if all errrors are null proceed to create a new user
    if ($firstname_error === null && $lastname_error === null && $username_error === null && $email_error === null && $password_error === null && $rptpassword_error === null) {
        createUser($conn, $firstname, $lastname, $email, $username, $password);
    }



    //to check if the user already exists
    //if (userExists($conn, $email, $username) !== false) {
    //header("Location: ../Sign-Up.php?error=usernametaken");
    // exit();
    //}

} else {
    if (basename($_SERVER['PHP_SELF']) !== 'signup.php') {
        header("Location: ../html/signup.php");
        exit();
    }
} //fix because directory cannot be accessed.
