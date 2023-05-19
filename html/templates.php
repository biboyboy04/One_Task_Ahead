<?php include('../php/header.php') ?>
<?php include('../php/dbh.php') ?>
<?php include('../php/functions.php') ?>
<!-- content -->
<div class="content">
  <div class="categories-featured">
    <h2>FEATURED CATEGORIES</h2>
    <div class="container">
    <?php
        $categories = getCategories($conn);
        renderCategories($categories);
      ?>
    </div>
    <div class="templates-new">
      <h2>NEW & NOTABLE TEMPLATES</h2>
      <div class="container">
        <a href="./board.php?id=25">
          <div class="card" id="card1">Starting a Gratitude Practice</div>
        </a>
        <a href="./board.php?id=23">
          <div class="card" id="card2">Planning Trip</div>
        </a>
        <a href="./board.php?id=24">
          <div class="card" id="card3">Starting a Personal Blog</div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
<footer>
  <p>ONE TASK AHEAD © 2023</p>
  <p>All Rights Reserved.</p>
</footer>
<script></script>
</body>

</html>