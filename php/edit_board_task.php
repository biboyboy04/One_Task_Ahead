<?php
include('../php/functions.php');
include("../php/dbh.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the task data from the POST request
    // $template_id = $_POST['template_id'];
    $task_id = $_POST['task_id'];
    $task_name = $_POST['title'];
    $task_desc = $_POST['description'];
    $task_number = $_POST['number'];
    $activity = $_POST['activity'];
    $workspace_id = $_POST['workspace_id'];

    
    echo updateBoardTask($conn, $task_id, $task_name, $task_desc, $activity, $task_number);

    // // Redirect back to the previous page or any other desired location
    // header("Location: {$_SERVER['HTTP_REFERER']}");
    // $response = "Data received successfully";
    // echo $response;
    exit();
}
?>
