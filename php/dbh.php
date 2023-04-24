<?php


$serverName = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "one_task_ahead";

$conn = mysqli_connect($serverName, $dbUsername, $dbpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
