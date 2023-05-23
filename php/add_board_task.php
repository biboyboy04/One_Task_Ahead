
<?php
include('../php/functions.php');
include("../php/dbh.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the task data from the POST request
    $board_id = $_POST['id'];
    $task_name = $_POST['name'];
    $task_desc = $_POST['description'];
    $activity = "todo";

    // Add the task to the database
    $task_id = addBoardTask($conn, $board_id, $task_name, $task_desc, $activity);

    if ($task_id) {
        // Retrieve the newly created task
        $sql = "SELECT * FROM board_task ORDER BY board_task_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Prepare the response data
            $response = [
                'taskid' => $row['board_task_id'],
                'title' => $row['Title'],
                'description' => $row['Description'],
                'lane' => $row['Lane'],
                'number' => $row['number']
            ];

            // Send the JSON response
             header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Handle the error if the task couldn't be retrieved
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Error: Unable to retrieve task.';
        }
    } else {
        // Handle the error if the task couldn't be added
        header('HTTP/1.1 500 Internal Server Errorr');
    }
}
?>