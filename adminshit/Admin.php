<?php
session_start();
include "../php/dbh.php";
include "includes/functions.php";
include "includes/adduser.inc.php";
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
    <link rel="stylesheet" href="modal.css">

    <?php
    if ($firstname_error != null) {
    ?> <style>
            .firstname-error {
                display: block
            }
        </style> <?php
                }
                if ($lastname_error != null) {
                    ?> <style>
            .lastname-error {
                display: block
            }
        </style> <?php
                }
                if ($username_error != null) {
                    ?> <style>
            .username-error {
                display: block
            }
        </style> <?php
                }
                if ($email_error != null) {
                    ?> <style>
            .email-error {
                display: block
            }
        </style> <?php
                }
                if ($password_error != null) {
                    ?> <style>
            .password-error {
                display: block
            }
        </style> <?php
                }
                if ($retypepassword_error != null) {
                    ?> <style>
            .rptpassword-error {
                display: block
            }
        </style> <?php
                }
                    ?>


</head>

<body>


    <section id="menu">
        <div class="logo">
            <img src="" alt="">
            <h2>ONE TASK AHEAD</h2>
        </div>


        <div class="items">
            <a href="Admin.php">
                <li class="active"><i class="fa-solid fa-users"></i>User Management</li>
            </a>
            <a href="temp.php">
                <li><i class="fa-solid fa-list"></i>Template Management</li>
            </a>
            <!-- <li><i class="fa-solid fa-calendar-days"></i><a href=""></a></li>
            <li><i class="fa-regular fa-credit-card"></i><a href="#">Transactions</a></li> -->
            <a href="../php/logout.inc.php">
                <li><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</li>
            </a>

        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <h3 class="i-name"> User Accounts </h3>

            <div class="profile">
                <p><?php echo $_SESSION['username'] ?></p>
                <img src="img/admin.png" alt="">
            </div>
        </div>

        <div class="values">
            <div class="val-box">
                <h3> <?php echo totalUsers($conn); ?></h3>
                <i class="fas fa-users"></i>
                <div>

                    <span>Number of Users</span>
                </div>

            </div>

            <div class="val-box" id="addtemp" onclick="openModal()">
                <p>Add User</p>
            </div>
        </div>

        <!-- The modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Add User</h2>
                </div>
                <div class="class= modal-body">
                    <form action="" method="post">
                        <label for="fname">Firstname:</label>
                        <input type="text" name="fname" value="<?php if(!empty($firstname)){echo $firstname;} else {echo null;}?>">
                        <p class="error firstname-error">
                            <?php echo $firstname_error ?>
                        </p>
                       
                        <label for="lname">Lastname:</label>
                        <input type="text" name="lname" value="<?php if(!empty($lastname)){echo $lastname;} else {echo null;}?>">
                        <p class="error lastname-error">
                        <?php echo $lastname_error ?>
                        </p>
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php if(!empty($username)){echo $username;} else {echo null;}?>">
                        <p class="error username-error">
                        <?php echo $username_error ?>
                        </p>
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php if(!empty($email)){echo $email;} else {echo null;}?>">
                        <p class="error email-error">
                        <?php echo $email_error ?>
                        </p>
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="<?php if(!empty($password)){echo $password;} else {echo null;}?>">
                        <p class="error password-error">
                        <?php echo $password_error ?>
                        </p>
                        <label for="repeat-password">Retype Password:</label>
                        <input type="password" name="repeat-password" value="<?php if(!empty($retypepassword)){echo $retypepassword;} else {echo null;}?>">
                        <p class="error rptpassword-error">
                        <?php echo $retypepassword_error ?>
                        </p>   
                        <button type="submit" name="submit">Save</button>  
                    </form>
                   
                </div>             
                
            </div>
        </div>
        <!-- for modal add -->
<?php
    if(isset($_POST['submit'])){
        echo "<script>document.getElementById('myModal').style.display = 'block';</script>";
    }
?>

<!-- The modal -->
    <div id="editModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <h2>Edit User</h2>
                </div>
                <div class="class= modal-body">
                    <form action="" method="post">
                        <label for="firstname">Firstname:</label>
                        <input type="text" name="firstname">
                        <label for="lastname">Lastname:</label>
                        <input type="text" name="lastname">
                        <label for="username">Username:</label>
                        <input type="text" name="username">
                        <label for="email">Email:</label>
                        <input type="text" name="email">
                         
                    </form>
                    <button type="submit" name="save">Save</button>
                </div>             
                
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

<script>
    // JavaScript functions to open and close the modal
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    function openEditModal() {
        document.getElementById('editModal').style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

</script>
