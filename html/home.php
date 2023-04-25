<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Board Name</title>
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/nav_bar.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/c36cb32178.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logo">ONE TASK AHEAD</div>
        <ul>
            <li>
                <a href="./templates.html">Templates</a>
            </li>
            <li>
                <a href="./boards.html">Boards</a>
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
                    <li><a href="./board.html?id=architecture">Recent 1</a></li>
                    <li><a href="./board.html?id=morning-routine">Recent 2</a></li>
                    <li><a href="./board.html?id=school-subjects">Recent 3</a></li>
                </ul>
            </li>
            <li id="create-btn"><a href="./board.html">Create</a></li>
        </ul>
    </nav>
    <!-- sidebar -->
    <div class="content-container">
        <div class="sidebar">
            <div class="links">
                <ul>
                    <a href="./boards.html">
                        <li>Boards</li>
                    </a>
                    <a href="./templates.html">
                        <li>Templates</li>
                    </a>
                    <a href="#">
                        <li>Home</li>
                    </a>
                </ul>
            </div>
            <hr />
            <div class="workspace">
                <div class="header">
                    <h2>Workspaces</h2>
                    <i class="fa-solid fa-circle-chevron-down fa-xl" style="color: #ffffff"></i>
                </div>
            </div>
        </div>
        <!-- content -->
        <div class="content">
            <div class="schedule">
                <div class="container">
                    <div class="deadline">
                        <p>DEADLINE</p>
                        <p>October 25, 2023</p>
                        <p>NAME</p>
                        <p>Employee Opinion Survey</p>
                    </div>
                    <div class="alert">
                        <p>KEEP TRACK OF YOUR WORK AND SCHEDULES</p>
                        <p>HERE IS YOUR NEAREST DEADLINE!</p>
                    </div>
                </div>
                <div class="sched-button">
                    <button id="add-sched-btn">ADD SCHEDULE</button>
                    <button id="del-sched-btn">DELETE SCHEDULE</button>
                </div>
                <i class="fa-regular fa-calendar-days fa-8x" style="color: #ffffff;"></i>
            </div>
            <div class="recent-works">
                <h2>YOUR RECENT WORKS</h2>
                <div class="container">
                    <div class="card">Adamson</div>
                    <div class="card">Upwork</div>
                    <div class="card">LinkedIn</div>
                </div>
            </div>
        </div>
</body>

</html>