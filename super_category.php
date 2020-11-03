<?php include('C:/xampp/htdocs/netit-backend-hr/template/super/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/job_postings.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/super_category.php'); ?>

<div class="wrapper">
    <div id="signup--wrapper">

        <form>
            <ul>
                <?php
                $categoryCollection = getCategoryCollection();
                foreach ($categoryCollection as $key => $value) {
                    ?>
                    <li class="categoryyy">
                        <?php echo $value['title']; ?> 
                        <div>
                            <a class="btn" href="?action=edit&category_id=<?php echo $value['id']; ?>">&#128395 <i>Редактиране</i></a>
                            <a class="btn" href="?action=delete&category_id=<?php echo $value['id']; ?>">&#128465 <i>Изтриване</i></a>
                        </div>
                    </li>
                    <br>
                <?php } ?>
            </ul>
            <br>
            <br>
            <input type         = "hidden"
                   name         = "super_action_tokken"
                   value        = "<?php echo getSuperActionTokken(); ?>">

            <input type         = "hidden"
                   name         = "super_category_tokken"
                   value        = "<?php echo getCategoryTokken(); ?>">        

            <input type         = "text"
                   class        = "input"
                   name         = "category_title" 
                   placeholder  = "Добавяне или редактиране на нова категория"
                   value        = "<?php echo getSuperCategory(); ?>">
            
            <input type         = "submit"
                   class        = "submit">
        </form>
    </div>
</div>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>