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

    if (!empty($firstname_error) || !empty($lastname_error) || !empty($username_error) || !empty($email_error) || !empty($password_error) || !empty($retypepassword_error)) {
        echo '<script>openModal();</script>';
    }
    
    if ($firstname_error === null && $lastname_error === null && $username_error === null && $email_error === null && $password_error === null && $retypepassword_error === null) {
        createUser($conn, $firstname, $lastname, $email, $username, $password);
    }
}
