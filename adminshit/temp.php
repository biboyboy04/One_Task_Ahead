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
            <a href="Admin.php"><li><i class="fa-solid fa-users"></i>User Management</li></a>
            <a href="temp.php"><li class="active"><i class="fa-solid fa-list"></i>Template Management</li></a>
            <!-- <li><i class="fa-solid fa-calendar-days"></i><a href=""></a></li>
            <li><i class="fa-regular fa-credit-card"></i><a href="#">Transactions</a></li> -->
            <a href="../php/logout.inc.php"><li><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</li></a>

        </div>
    </section>

    <section id="interface">
        <div class="navigation">
        <h3 class="i-name"> Templates</h3>

            <div class="profile">
                <p><?php echo $_SESSION['username'] ?></p>
                <img src="img/admin.png" alt="">
            </div>
        </div>
        <div class="values">
            <div class="val-box">
            <h3> <?php echo totaltemps($conn); ?></h3>
                <div>
                    <span>Number of Templates</span>
                </div>
            </div>

            <div class="val-box" id="addtemp">
                <p>Add Template</p>
            </div>
        </div>









        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Temp ID</td>
                        <td>Name</td>
                        <td>Category</td>
                        <td>Tasks</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>

                <tbody>

                <?php
                    displaytemps($conn);
                ?>

                </tbody>
        </div>
    </section>

</body>

</html>