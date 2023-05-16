<?php
include('../php/functions.php');
include("../php/dbh.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the task data from the POST request
    $task_id = $_POST['task_id'];

    // delete the task to the database
    deleteTask($conn, $task_id);

    // Redirect back to the previous page

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
