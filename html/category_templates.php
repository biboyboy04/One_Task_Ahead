<?php include('../php/header.php') ?>
<?php include('../php/dbh.php') ?>
<?php include('../php/functions.php') ?>
<!-- content -->
<div class="content">
    <div class="categories">
        <?php
        $categ_id = isset($_GET["id"]) ? $_GET["id"] : null;
        $category_data = getTableRowById($conn, "category", "categ_id", $categ_id);
        ?>
        <h2><?php echo $category_data['categ_name']; ?> <span class="category-btn">choose a category
                <i class="fa-solid fa-caret-down fa-lg" style="color: #ffffff; margin-left:5px;"></i></span></h2>
        <div class="">
            <div class="container">
                <?php
                $templates = getCategoryTemplates($conn, $categ_id);
                renderTemplates($templates);
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