<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/util/static_list.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/employer_jobpost.php'); ?>

<div class="wrapper">
    <div id="signup--wrapper">
        
        <form method="post">
            <input 
                placeholder = "Позиция"
                type = "text"
                class = "input" 
                name = "job_title">
            
            <label>Изберете категория</label>
            <br>
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
                placeholder = "Пълно описание на позицията"
                name = "job_content"
                class = "textarea7">                
            </textarea>
            
             <input 
                type = "hidden" 
                name = "create_new_job_tokken"
                value="1">
             
             <input class="submit" 
                    type="submit"
                    value    = "Публикувай обява за работа">
            
        </form>
        <br>
        <div class="list-item-1"><a  href="super.php">*</a></div>
    </div>
</div>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>