<?php
include('../php/functions.php');
include("../php/dbh.php");
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
// Retrieve the task data from the POST request
$data = $_POST['task_data'];

// Convert the JSON data to an associative array
$taskData = json_decode($data, true);

// Process the task data
foreach ($taskData as $task) {
  $task_id = $task['task_id'];
  $activity = $task['activity'];
  $task_name = $task['task_name'];
  $task_desc = $task['task_desc'];
  $task_number = $task['task_number'];

  // Perform actions with the task data
  // ...

  // Example: Update the task in the database
  updateTemplateTask($conn, $task_id, $task_name, $task_desc, $activity, $task_number);
  echo 'Task data received and processed successfully.';
  echo "<script>console.log('Task ID: $task_id, Activity: $activity, Task Name: $task_name, Task Description: $task_desc, Task Number: $task_number');</script>";
}

header("Location: {$_SERVER['HTTP_REFERER']}");

}
?>


