<?php
// Include the necessary files and establish database connection
include('../php/functions.php');
include("../php/dbh.php");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the workspace ID from the POST request
  $workspaceId = $_POST['workspace_id'];
  
  // Check if the workspace ID is present
  if ($workspaceId) {
    // Call the createBoard function
     $result = createBoard($conn, $workspaceId, "New Board");

    if ($result) {
      // Board created successfully
      $highestBoardId = getHighestBoardId($conn);

      header("Location: ../html/board.php?workspace_id=$workspaceId&board_id=$highestBoardId");
    } else {
      // Failed to create board
      echo "Failed to create board.";
    }
  } else {
    // Workspace ID is missing
    echo "Missing workspace ID.";
  }
} else {
  // Invalid request method
  echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
