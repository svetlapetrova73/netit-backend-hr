<?php include('C:/xampp/htdocs/netit-backend-hr/template/super/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/super_job_postings.php'); ?>
<?php $categoryFetchResult = Database::query("SELECT * FROM tm_categoriesjob"); ?>
<div class="flex">
    <div class="wrapper">

        <p class="cat">Категории</p>

        <ul id      = "category-placeholder" 
            class   = "mb-25">

            <?php while ($jobCategory = Database::fetch($categoryFetchResult)) { ?>
                <li class="category-placeholder--category">
                    <?php $categoryId = $jobCategory['id']; ?>
                    <a href="<?php echo "http://localhost/netit-backend-hr/job_postings.php?categor=$categoryId" ?>">
                        <?php echo $jobCategory['title'] ?>
                    </a>
                </li>
            <?php } ?>

            <li class="category-placeholder--category">
                <a href="http://localhost/netit-backend-hr/job_postings.php">
                    Всички категории
                </a>
            </li>    
        </ul>
    </div>
    <br>
    <br>
    <div class="wrapper">
        <div>
            <form method="GET">
                <label for="s" class="tarsi">Търси в обяви:</label><br>
                <input class="search"
                       type         = "text" 
                       placeholder  = "Търси ..." 
                       name         = "s">

                <select class="search" name="s_selector">
                    <option value="company">Търси по име на фирма</option>
                    <option value="content">Търси по съдържание на обява</option>
                </select>

                <input type         = "hidden" 
                       name         = "job_search_tokken" 
                       value        = "1">
                <input class="submit-1" type="submit">
            </form>
        </div>
        <br>
        <br>

        <div class="wrapper">
            <p class="cat">Редактиране на обявите за работа</p>
            <br>

            <form>
                <?php
                
                $jobCollection = getJobCollection();
                foreach (listAllJobPost() as $key => $value) {
                    ?>

                    <div class="job-title" ><b><?php echo $value['title']; ?></b>
                    </div>
                
                    <a  class="btn" href="?action=edit&job_id=<?php echo $value['id']; ?>">&#128395 <i>Редактиране>></i></a>
                    <a class="btn" href="?action=delete&job_id=<?php echo $value['id']; ?>">&#128465 <i>Изтриване>></i></a>
                    <div class="job-company"><?php echo $value['company']; ?>
                    </div>
                    
                    <a  class="btn" href="?action=edit1&job_id=<?php echo $value['id']; ?>">&#128395 <i>Редактиране>></i></a>
                    <div class="priview_content"><?php echo $value['priview_content']; ?></div>
                   
                    <a  class="btn" href="?action=edit3&job_id=<?php echo $value['id']; ?>">&#128395 <i>Редактиране>></i></a>
                    <div class="content"><?php echo $value['content']; ?>
                    </div>
                    
                    <a  class="btn" href="?action=edit2&job_id=<?php echo $value['id']; ?>">&#128395 <i>Редактиране>></i></a>
                    <br>
                    <hr>          
                <?php } ?>

                <input type         = "hidden"
                       name         = "super_action_tokken"
                       value        = "<?php echo getSuperActionTokken(); ?>">

                <input type         = "hidden"
                       name         = "super_job_tokken"
                       value        = "<?php echo getJobTokken(); ?>">        

                <input type         = "text"
                       class        = "input"
                       name         = "joby_title" 
                       placeholder  = "Редактиране на позицията"
                       value        = "<?php echo getSuperJobPost(); ?>">

                <input type         = "text"
                       class        = "input"
                       name         = "companyy" 
                       placeholder  = "Редактиране на името на фирмата"
                       value        = "<?php echo getSuperJobPostCompany(); ?>">

                <input type         = "text"
                       class        = "input"
                       name         = "preview_content" 
                       placeholder  = "Редактиране на краткото описание на позицията"
                       value        = "<?php echo getSuperJobPostPrevContent(); ?>">

                <input type         = "text"
                       class        = "input"
                       name         = "content" 
                       placeholder  = "Редактиране на описанието на  позицията"
                       value        = "<?php echo getSuperJobPostContent(); ?>">

                <input type         = "submit"
                       class        = "submit">
            </form>  

            <a  class="btn" href="employer_jobpost.php">&#128195 <i>Публикувайте нова обява за работа>></i></a>

            <?php Pagination::display(); ?> 
        </div>
    </div>    
</div>
    <?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>