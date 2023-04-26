<?php
include "../php/dbh.php";
function displayUserInfo($conn)
{
    $username = $_SESSION['username'];
    //users table
    $sql = "SELECT * FROM users WHERE username = '$username';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    mysqli_close($conn);

    return $row;
}
