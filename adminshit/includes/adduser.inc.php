<?php



$firstname_error = "";
$lastname_error = "";
$email_error = "";
$username_error = "";
$password_error = "";
$retypepassword_error = "";

$firstname_return_error = null;
$lastname_return_error = null;
$email_return_error = null;
$username_return_error = null;
$password_return_error = null;
$retypepassword_return_error = null;

if (isset($_POST['submit'])) {

    include "../php/dbh.php";
    include "../php/functions.php";

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypepassword = $_POST['repeat-password'];

    $error = false;

    if (emptyInputSignup($firstname, $lastname, $email, $username, $password, $retypepassword) !== false) {
        $firstname_error = $firstname_return_error;
        $lastname_error = $lastname_return_error;
        $email_error = $email_return_error;
        $username_error = $username_return_error;
        $password_error = $password_return_error;
        $retypepassword_error = $rptpassword_return_error;
    }
    //to check invalid emails
    if (invalidEmail($email) !== false && !empty($email)) {
        $email_error = $email_return_error;
    }

    //to check invalid username
    if (invalidUsername($username) !== false) {
        $username_error = $username_return_error;
    }

    //to check if the password is the same
    if (passMatch($password, $retypepassword) !== false) {
        $retypepassword_error = $rptpassword_return_error;
    }
    //check if user exists
    //to check if the user already exists
    if (userExists($conn, $username, $email) !== false) {
        $email_error = $email_return_error;
        $username_error = $username_return_error;
    }

    if ($firstname_error === "" && $lastname_error === "" && $username_error === "" && $email_error === "" && $password_error === "" && $retypepassword_error === "") {
        createUser($conn, $firstname, $lastname, $email, $username, $password);


    } 
}
