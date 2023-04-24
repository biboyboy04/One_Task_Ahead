<?php
$username = "";
$password = "";



$username_error = null;
$password_error = null;

if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];


    require_once 'dbh.php';
    require_once 'functions.php';
    //to check for empty fields
    if (empty($username) || empty($password)) {
        if (empty($username)) {
            $username_error = "username must not be empty.";
        } else {
            $username_error = null;
        }
        if (empty($password)) {
            $password_error = "password must not be empty.";
        } else {
            $password_error = null;
        }
    }


    if (logincheck($conn, $username, $password) !== false && $username_error === null && $password_error === null) {
        $username_error = $username_return_error;
        $password_error = $password_return_error;
    }

    if ($username_error === null && $password_error === null) {
        loginUser($conn, $username, $password);
    }
} else {
    if (basename($_SERVER['PHP_SELF']) !== 'OTA_Login.php') {
        header("Location: ../html/OTA_Login.php");
        exit();
    }
}
