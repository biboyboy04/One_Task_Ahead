<?php

if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];


    require_once 'dbh.php';
    require_once 'functions.php';



    //to check for empty fields
    if (emptyInputLogin($username, $password) !== false) {
        header("Location: ../html/OTA_Login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {

    header("Location: ../html/OTA_Login.php");
    exit();
}
