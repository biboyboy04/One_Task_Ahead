<?php
session_start();
include "../php/dbh.php";
include "../php/profile.php";
$userInfo = displayUserInfo($conn);
$_SESSION['username'] = $userInfo['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profilepage.css">
    <link rel="stylesheet" href="../css/nav_bar.css" >
    <link rel="stylesheet" href="../css/profilemodal.css">

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
                    ?>

</head>

<body>
    <nav>
        <a href="./home.php">
            <div class="logo">ONE TASK AHEAD</div>
        </a>
        <ul>
            <li>
                <a href="./templates.php">Templates</a>
            </li>
            <li>
                <a href="./boards.php">Boards</a>
            </li>
            <li>
                <a href="#">Workspace</a>
                <ul>
                    <li><a href="#">Workspace 1</a></li>
                    <li><a href="#">Workspace 2</a></li>
                    <li><a href="#">Workspace 3</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Recent</a>
                <ul>
                    <li><a href="./board.php?id=architecture">Recent 1</a></li>
                    <li><a href="./board.php?id=morning-routine">Recent 2</a></li>
                    <li><a href="./board.php?id=school-subjects">Recent 3</a></li>
                </ul>
            </li>
            <li id="create-btn"><a href="./board.php">Create</a></li>
            <!--SIgn up and login button-->
            <div class="ppic">
                <?php
                if (isset($_SESSION['username'])) {
                    //for now there is no profile page
                    echo '<a href="../html/profilepage.php" id="signupBtn">Hi, ' . $_SESSION['username'] . '</a>';
                    echo '<a href="../html/profilepage.php"><img src="../images/profilepic.png"></a>';
                    echo '<ul class="logout">';
                    echo '<li><a href="../php/logout.inc.php">Logout</a></li>';
                    echo '</ul>';
                } else {
                    echo '<li id="signupBtn2"><a href="../html/signup.php">Sign up</a></li>';
                    echo '<li id="signupBtn3"><a href="../html/OTA_Login.php">Login</a></li>';
                }
                ?>
            </div>
        </ul>
    </nav>
    <!-- The modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Edit Profile</h2>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="contents">
                        <label>First Name:</label>
                        <input type="text" name="firstname" value="<?php echo $userInfo['first_name']?>" />
                        <p class="error firstname-error"><?php echo $firstname_error ?></p>
                    </div>
                    <div class="contents">
                        <label>Last Name:</label>
                        <input type="text" name="lastname" value="<?php echo $userInfo['last_name']?>" />
                        <p class="error lastname-error"><?php echo $lastname_error ?></p>
                    </div>
                    <div class="contents">
                        <label>Username:</label>
                        <input type="text" name="username" value="<?php echo $userInfo['username']?>" />
                        <p class="error username-error"><?php echo $username_error ?></p>
                    </div>
                    <div class="contents">
                        <label>Email:</label>
                        <input type="text" name="email" value="<?php echo $userInfo['email']?>" />
                        <p class="error email-error"><?php echo $email_error ?></p>
                    </div>
                    
                    <div class="submit-container">
                        <input type="submit" value="Save" name="save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- header -->
    <h2>Profile Page</h2>
    <div class="container">
        <img class="profimg" src="../images/profilepic.png">

        <h3><?php echo $userInfo['first_name'] . " " . $userInfo['last_name']; ?></h3>


        <h4>First Name: <?php echo $userInfo['first_name'] ?></h4>
        <h4>Last Name: <?php echo $userInfo['last_name'] ?></h4>
        <h4>Username: <?php echo $userInfo['username'] ?></h4>
        <h4>Email: <?php echo $userInfo['email'] ?></h4>
        <!-- this buttons does not work yet -->
        <div class="buttons">
            <!-- <button>Save</button> -->
            <button id="edit">Edit</button>
        </div>

    </div>







</body>

</html>
<script src="../scripts/profilemodal.js"></script>