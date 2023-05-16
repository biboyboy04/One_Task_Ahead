<?php
session_start();
include "../php/dbh.php";
include "includes/functions.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin.css">

</head>

<body>


    <section id="menu">
        <div class="logo">
            <img src="" alt="">
            <h2>ONE TASK AHEAD</h2>
        </div>


        <div class="items">
            <li><i class="fa-solid fa-users"></i><a href="Admin.php">User Management</a></li>
            <li><i class="fa-solid fa-list"></i><a href="temp.php">Template Management</a></li>
            <!-- <li><i class="fa-solid fa-calendar-days"></i><a href=""></a></li>
            <li><i class="fa-regular fa-credit-card"></i><a href="#">Transactions</a></li> -->
            <li><i class="fa-sharp fa-solid fa-right-from-bracket"></i><a href="../php/logout.inc.php">Logout</a></li>

        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">

            </div>

            <div class="profile">
                <p><?php echo $_SESSION['username'] ?></p>
                <img src="img/admin.png" alt="">
            </div>
        </div>
        <h3 class="i-name"> User Accounts </h3>
        <div class="values">
            <div class="val-box"> <h3> <?php echo totalUsers($conn); ?></h3>
                <i class="fas fa-users"></i>
                <div>
                    
                    <span>Number of Users</span>
                </div>
               
            </div>

            <div class="val-box">
                <p>Add User</p>
            </div>
        </div>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>User ID</td>
                        <td>Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Access Type</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>

                <tbody>

                    <!-- display users -->
                    <?php
                    displayUsers($conn);
                    ?>

                </tbody>
        </div>
    </section>

</body>

</html>