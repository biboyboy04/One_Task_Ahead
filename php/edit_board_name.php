<?php
include('../php/functions.php');
include("../php/dbh.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the task data from the POST request
    // $template_id = $_POST['template_id'];
    $board_id = $_POST['board_id'];
    $task_name = $_POST['title'];
    echo $board_id;
    echo $task_name;
    echo editBoardName($conn, $board_id, $task_name);

    // // Redirect back to the previous page or any other desired location
    // header("Location: {$_SERVER['HTTP_REFERER']}");
     $response = $task_name;
    // echo $response;
    exit();
}
?>
