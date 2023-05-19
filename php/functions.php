<?php
//error handlers for sign up
function emptyInputSignup($firstname, $lastname, $email, $username, $password, $rptpassword)
{
    global $firstname_return_error, $lastname_return_error, $email_return_error, $username_return_error, $password_return_error, $rptpassword_return_error;
    $result = false;
    //individual checking

    if (empty($firstname)) {
        $result = true;
        $firstname_return_error = "Firstname is required";
    } else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $result = true;
        $firstname_return_error = "Invalid firstname";
    } else {
        $firstname_return_error = null;
    }


    if (empty($lastname)) {
        $result = true;
        $lastname_return_error = "Lastname is required";
    } else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $result = true;
        $lastname_return_error = "Invalid lastname";
    } else {
        $lastname_return_error = null;
    }

    if (empty($email)) {
        $result = true;
        $email_return_error = "Email is required";
    } else {
        $email_return_error = null;
    }
    if (empty($username)) {

        $result = true;
        $username_return_error = "Username is required";
    } else {
        $username_return_error = null;
    }
    if (empty($password)) {

        $result = true;
        $password_return_error = "Password is required";
    } else {
        $password_return_error = null;
    }
    if (empty($rptpassword)) {
        $result = true;
        $rptpassword_return_error = "Password is required";
    } else {
        $rptpassword_return_error = null;
    }

    return $result;
}

function invalidUsername($username)
{
    global $username_return_error;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
        $username_return_error = "Username can only contain letters and numbers";
    } else {
        $result = false;
        $username_return_error = null;
    }
    return $result;
}


function invalidEmail($email)
{
    global $email_return_error;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
        $email_return_error = "Email is invalid";
    } else {
        $result = false;
        $email_return_error = null;
    }
    return $result;
}


function passMatch($password, $rptpassword)
{
    global $rptpassword_return_error;
    if ($password !== $rptpassword) {
        $result = true;
        $rptpassword_return_error = "Password does not match";
    } else {
        $result = false;
        $rptpassword_return_error = null;
    }
    return $result;
}

//access type
function accessType($conn){
    // for edit access level
    
}


//create user
function createUser($conn, $firstname, $lastname, $email, $username, $password)
{
    $sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../html/signup.php?error=statementfailed");
        exit();
    }

    //hash password
    $hashedpass = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "sssss", $firstname, $lastname, $username, $email, $hashedpass);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../html/signup.php?error=success");
    exit();

}


//user exist 

function userExists($conn, $username, $email)
{
    global $username_return_error, $email_return_error;
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../html/signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $username, $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    //row variable will be used for login method in order to login with email or uername
    if ($row = mysqli_fetch_assoc($resultData)) {

        // Determine if the matching value is in the email or username field
        if ($row['email'] === $email) {
            $email_return_error = "An account with this email already exists.";
        } else if ($row['username'] === $username) {
            $username_return_error = "Username already exists.";
        }
        return $row;
    } else {

        $result = false;
        $username_return_error = null;
        $email_return_error = null;
        return $result;
    }

    mysqli_stmt_close($statement);
}


//login
function emptyInputLogin($username, $password)
{

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function loginUser($conn, $username, $password)
// {

//     $usernameExists =  userExists($conn, $username, $username);

//     if ($usernameExists === false) {
//         header("location: ../html/OTA_Login.php?error=wronglogin");
//         exit();
//     }

//     $passwordHashed =  $usernameExists["password"];
//     $checkPass = password_verify($password, $passwordHashed);

//     if ($checkPass === false) {
//         header("location: ../html/OTA_Login.php?error=wronglogin");
//         exit();
//     } else if ($checkPass === true) {

//         session_start();
//         $_SESSION["id"] = $usernameExists["id"];
//         $_SESSION["username"] = $usernameExists["username"];
//         header("location: ../html/board.php"); //temporary testing.. Default is the home page
//         exit();
//     }
// }

function updateTemplateTask($conn, $task_id, $task_name, $task_desc, $activity, $task_number, $workspace_id)
{
    $query = "INSERT INTO edited_template_task (workspace_id, template_id, task_id, Title, Description, Lane, number)
              VALUES ({$workspace_id}, 0, {$task_id}, '{$task_name}', '{$task_desc}', '{$activity}', {$task_number})
              ON DUPLICATE KEY UPDATE
              Title = VALUES(Title),
              Description = VALUES(Description),
              Lane = VALUES(Lane),
              number = VALUES(number)";

    return mysqli_query($conn, $query);
}





function addTask($conn, $temp_id, $task_name, $task_desc, $activity)
{
    // Get the highest task number for the given activity
    $query = "SELECT MAX(number) AS max_number FROM task WHERE Lane = '$activity'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $max_number = $row['max_number'];

    // Increment the task number by 1
    $task_number = $max_number + 1;

    // Insert the task into the database
    $sql = "INSERT INTO task (Title, Description, Lane, temp_id, number) VALUES ('$task_name', '$task_desc', '$activity', '$temp_id', '$task_number')";
    return mysqli_query($conn, $sql);
}

function deleteTask($conn, $task_id) {
    $sql = "DELETE FROM task WHERE task_id = $task_id";
    return mysqli_query($conn, $sql);
}




function getTableRowById($conn, $table, $table_id, $id)
{
    $sql = "SELECT * FROM $table WHERE $table_id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getCategories($conn)
{
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getCategoryTemplates($conn, $categ_id)
{
    $sql = "SELECT * FROM template WHERE categ_id = $categ_id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getTemplateTasks($conn, $temp_id, $lane)
{
    $sql = "SELECT t.task_id, COALESCE(ct.Title, t.Title) AS Title,
                   COALESCE(ct.Description, t.Description) AS Description,
                   COALESCE(ct.Lane, t.Lane) AS Lane,
                   COALESCE(ct.number, t.number) AS number
            FROM task AS t
            LEFT JOIN edited_template_task AS ct ON ct.task_id = t.task_id
            WHERE t.temp_id = $temp_id AND t.Lane = '$lane'
            ORDER BY t.number ASC";

    $result = mysqli_query($conn, $sql);
    return $result;
}


function renderCategories($result)
{
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="./category_templates.php' . (isset($_GET['workspace_id']) ? '?workspace_id=' . $_GET['workspace_id'] : '?workspace_id=1') . '&id=' . $row['categ_id'] . '"><div class="card">' . $row['categ_name'] . '</div></a>';
        }
    } else {
        echo "No categories found.";
    }
}

function renderTemplates($result)
{
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="./board.php' . (isset($_GET['workspace_id']) ? '?workspace_id=' . $_GET['workspace_id'] : '?workspace_id=1'). '&id=' . $row['template_id'] . '"><div class="card">' . $row['temp_name'] . '</div></a>';
        }
    } else {
        echo "No categories found.";
    }
}

function renderTasks($result)
{
    if (!$result) {
        return;
    }
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="task" draggable="true" data-id="' . $row["task_id"] . '" data-number="' . $row["number"] . '" data-activity="' . $row["Lane"] . '" data-workspace="' . (isset($_GET['workspace_id']) ? intval($_GET['workspace_id']) : 1) . '">
            <div class="task-content">
                    <h3 class="task-name">' . $row['Title'] . '</h3>
                    <p class="task-description">' . $row['Description'] . '</p>
                </div>
                <div class="task-buttons">
                    <button class="edit-button" onclick="openModal(' . $row['task_id'] . ', \'' . $row['Title'] . '\', \'' . $row['Description'] . '\', \'' . $row['Lane'] . '\', \'' . $row['number'] . '\')">
                        <i class="fa-solid fa-pen-to-square fa-lg" style="color: #ffffff;"></i>
                    </button>
                    <form class="delete-task-form">
                        <input type="hidden" name="task_id" value="' . $row["task_id"] . '">
                        <button type="button" class="delete-button"><i class="fa-solid fa-trash fa-lg" style="color: #ffffff;"></i></button>
                    </form>
                </div>
            </div>';
            $count++;
        }
    }
}
// function renderTasks($result)
// {
//     if (mysqli_num_rows($result) > 0) {
//         $count = 1;
//         while ($row = mysqli_fetch_assoc($result)) {

//             $title = $row['Title'];
//             $description = $row['Description'];
//             $lane = $row['Lane'];
//             echo "<script type='module'>
//             import { todoModule } from '../scripts/todo.js';
//             const task$count = todoModule.createTask('$title', '$description', '$lane');
//             todoModule.addTaskToActivity(task$count);
//           </script>";

//             $count++;
//         }
//     } else {
//         echo "No tasks found.";
//     }
// }

function loginUser($conn, $username, $password)
{

    $usernameExists =  userExists($conn, $username, $username);

    if ($usernameExists === false) {
        header("location: ../html/OTA_Login.php?error=wronglogin");
        exit();
    }

    $passwordHashed =  $usernameExists["password"];
    $checkPass = password_verify($password, $passwordHashed);

    if ($checkPass === false) {
        header("location: ../html/OTA_Login.php?error=wronglogin");
        exit();
    } else if ($checkPass === true) {

        if ($usernameExists['access_lvl'] == 1) {

            session_start();
            $_SESSION["id"] = $usernameExists["id"];
            $_SESSION["username"] = $usernameExists["username"];
            header("location: ../adminshit/Admin.php"); //temporary testing.. Default is the home page
            exit();
        }
        if ($usernameExists['access_lvl'] == 0) {

            session_start();
            $_SESSION["id"] = $usernameExists["id"];
            $_SESSION["username"] = $usernameExists["username"];
            header("location: ../html/home.php"); //temporary testing.. Default is the home page
            exit();
        }
    }
}





//profile form validation
function emptyInputProfile($firstname, $lastname, $email, $username)
{

    global $firstname_return_error, $lastname_return_error, $email_return_error, $username_return_error;

    if (empty($firstname)) {
        return true;
        $firstname_return_error = "Firstname must not be empty";
    }

    return false;
}
