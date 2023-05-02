<?php
include "../php/dbh.php";
include "../php/functions.php";
function displayUserInfo($conn)
{
    $id = $_SESSION["id"];
    //users table
    $sql = "SELECT * FROM users WHERE id = '$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    return $row;
}

$firstname_error = null;
$lastname_error = null;
$username_error = null;
$email_error = null;

//edit profile
if (isset($_POST['save'])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    // if (emptyInputProfile($firstname, $lastname, $email, $username) !== false) {
    //     $firstname_error = $firstname_return_error;
    //     $lastname_error = $lastname_return_error;
    //     $email_error = $email_return_error;
    //     $username_error = $username_return_error;
    // }
    // //to check invalid emails
    // if (invalidEmail($email) !== false && !empty($email)) {
    //     $email_error = $email_return_error;
    // }

    // //to check invalid username
    // if (invalidUsername($username) !== false) {
    //     $username_error = $username_return_error;
    // }
    // //to check if the user already exists
    // if (userExists($conn, $username, $email) !== false) {
    //     $email_error = $email_return_error;
    //     $username_error = $username_return_error;
    // }

    // if ($firstname_error === null && $lastname_error === null && $username_error === null && $email_error === null) {
    //     
    // }
    editProfile($conn, $firstname, $lastname, $email, $username, $_SESSION['id']);
}


function editProfile($conn, $firstname, $lastname, $email, $username, $session)
{

    $sql = "UPDATE users SET first_name=?, last_name=?, username=?, email=? WHERE id=?;";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../html/profilepage.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssi", $firstname, $lastname, $username, $email, $session);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../html/profilepage.php?error=success");
    exit();
}






// function emptyInputProfile($firstname, $lastname, $email, $username)
// {
//     global $firstname_return_error, $lastname_return_error, $email_return_error, $username_return_error;
//     $result = false;
//     //individual checking

//     if (empty($firstname)) {
//         $result = true;
//         $firstname_return_error = "Firstname is required";
//     } else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
//         $result = true;
//         $firstname_return_error = "Invalid firstname";
//     } else {
//         $firstname_return_error = null;
//     }


//     if (empty($lastname)) {
//         $result = true;
//         $lastname_return_error = "Lastname is required";
//     } else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
//         $result = true;
//         $lastname_return_error = "Invalid lastname";
//     } else {
//         $lastname_return_error = null;
//     }

//     if (empty($email)) {
//         $result = true;
//         $email_return_error = "Email is required";
//     } else {
//         $email_return_error = null;
//     }
//     if (empty($username)) {

//         $result = true;
//         $username_return_error = "Username is required";
//     } else {
//         $username_return_error = null;
//     }
//     return $result;
// }
