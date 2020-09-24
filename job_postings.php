<?php include './src/db/Database.php'; ?>
<?php //Dashboard с всички обяви за работа - листнати, отговаря на blog.php - страницата ?>

<div class="job">
    <?php $mysqlResult = query("SELECT * FROM tb_job_post");
    
    while($jobPost = mysqli_fetch_assoc($mysqlResult)) { ?>
    
    <span class="job-title" ><b><?php echo $jobPost['title']; ?></b></span>

    <div class="job-company"><?php echo $jobPost['company']; ?></div>
    
    <div class="priview_content"><?php echo $jobPost['priview_content']; ?></div>
    <a href="job_postings_full.php" title="Кандидаствай">Подробности</a>
</div><br>
    <?php } ?>
