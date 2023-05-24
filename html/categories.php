<?php include('./header.php') ?>
<!-- content -->
<div class="content">
    <div class="categories">
        <h2>CATEGORIES</h2>
        <div class="">
            <div class="container">
                <!-- <a href="./category_templates.php">
                    <div class="card">Arts and Design</div>
                </a> -->
                <!-- a href="?page=request-management" -->
                <?php
      $categories = getCategories($conn);
      renderCategories($categories);
    ?>
            </div>
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