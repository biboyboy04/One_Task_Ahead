<?php
include('../php/functions.php');
include("../php/dbh.php");
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the task ID from the hidden input field
    $task_id = $_POST["task_id"];

    // Get the updated task data from the form
    $activity = $_POST["activity"];
    $task_name = $_POST["task_name"];
    $task_desc = $_POST["task_desc"];
    $task_number = $_POST["task_number"];


    updateTemplateTask($conn, $task_id, $task_name, $task_desc, $activity, $task_number);

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
