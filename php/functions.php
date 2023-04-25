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

        session_start();
        $_SESSION["user_id"] = $usernameExists["user_id"];
        $_SESSION["username"] = $usernameExists["username"];
        header("location: ../html/board.php"); //temporary testing.. Default is the home page
        exit();
    }
}
