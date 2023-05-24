<?php 
include('./header.php') ;
// include('../php/functions.php');
// include('../php/dbh.php');
?>

<!-- content -->
<div class="content">
  <div class="templates-popular">
    <h2>MOST POPULAR TEMPLATES</h2>
    <p>Get going faster with a template from the community or
      <span class="category-btn">choose a category
        <i class="fa-solid fa-caret-down fa-lg" style="color: #ffffff; margin-left:5px;"></i></span>
    </p>
    <div class="container">
      <a href="./board.php?id=6">
        <div class="card" id="research-paper">Writing a Research Paper</div>
      </a>
      <a href="./board.php?id=19">
        <div class="card" id="card2">Creating a Database System</div>
      </a>
      <a href="./board.php?id=2">
        <div class="card" id="card3">Graphic Design</div>
      </a>
    </div>
  </div>
  <div class="workspaces-user">
    <h2>YOUR BOARDS</h2>
    <div class="container">

      <?php
       $workspace_id = isset($_GET["workspace_id"]) ? $_GET["workspace_id"] : null;
        $boards = getBoards($conn, $workspace_id);
        renderBoards($boards);
      ?>
    </div>
  </div>
</div>
</div>
<footer>
  <p>ONE TASK AHEAD © 2023</p>
  <p>All Rights Reserved.</p>
</footer>
</body>

</html>
