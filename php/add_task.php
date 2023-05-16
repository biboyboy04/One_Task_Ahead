<?php
include('../php/functions.php');
include("../php/dbh.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the task data from the POST request
    $temp_id = $_POST['temp_id'];
    $task_name = $_POST['name'];
    $task_desc = $_POST['description'];
    $activity = "todo";
    echo "wew";
    // Add the task to the database
    addTask($conn, $temp_id, $task_name, $task_desc, $activity);

    // Redirect back to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
