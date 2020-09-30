<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>

<?php //Dashboard с всички обяви за работа - листнати, отговаря на blog.php - страницата ?>

<div class="job">
    <?php $mysqlResult = Database::query("SELECT * FROM tb_job_post");
    
    while($jobPost = Database::fetch($mysqlResult)) { ?>
    
    <span class="job-title" ><b><?php echo $jobPost['title']; ?></b></span>

    <div class="job-company"><?php echo $jobPost['company']; ?></div>
    
    <div class="priview_content"><?php echo $jobPost['priview_content']; ?></div>
    <a href="job_postings_full.php" title="Кандидаствай">Подробности</a>
</div><br>
    <?php } ?>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>
