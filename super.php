<?php include('C:/xampp/htdocs/netit-backend-hr/template/super/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/util/static_list.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/super.php'); ?>

<div class="wrapper">
    <div id="signup--wrapper">

        <form method="post">
            <input 
                placeholder = "Позиция"
                type = "text"
                class = "input" 
                name = "job_title">

            <label>Изберете категория</label>
            <?php getCategoryStaticList('job_category'); ?>

            <input 
                placeholder = "Фирма"
                type = "text"
                class = "input" 
                name = "company">

            <input 
                placeholder = "Кратко описание на позицията"
                type = "text"
                class = "input" 
                name = "preview_content">

            <textarea
                name="job_content"
                placeholder="Пълно описание на позицията"
                class="textarea7">

            </textarea>

            <input 
                type = "hidden" 
                name = "create_new_job_tokken"
                value="1">

            <input class="submit" 
                   type="submit"
                   value    = "Публикувай обява за работа">

        </form>
    </div>
</div>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>