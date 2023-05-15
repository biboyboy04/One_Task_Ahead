<?php
session_start();
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
        <h3 class="i-name"> Templates</h3>
        <div class="values">
            <div class="val-box">

                <div>
                    <span>Number of Templates</span>
                </div>
            </div>

            <div class="val-box">
                <p>Add New Template</p>
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


                </tbody>
        </div>
    </section>

</body>

</html>