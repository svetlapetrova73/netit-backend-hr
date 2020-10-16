<?php
if(Auth::isNotAutenticated()) {
    redirecT("signin");
}

if(!Auth::isSuper()) {
    redirecT('signin');
}

if(isset($_POST['create_new_job_tokken']) && $_POST['create_new_job_tokken'] == 1){
    $jobTitle          = $_POST['job_title'];
    $jobCategory       = $_POST['job_category'];
    $company = $_POST['company'];
    $jobContent = $_POST['job_content'];
    $jobPreviewContent = $_POST['preview_content'];
    
    
    $createJobQuery = "INSERT INTO tb_job_post(title, company, content, priview_content) "
                      . "VALUES('$jobTitle', '$company', '$jobContent', '$jobPreviewContent')";
    
    Database::query($createJobQuery);
    $jobId = Database::getLastInsertedId();
    
    
    
        $createJobCategoryQuery = "INSERT INTO tb_job_post__categoriesjob(job_post_id, categoryjob_id) "
                              . "VALUES($jobId, $jobCategory)";

    Database::query($createJobCategoryQuery);
    
    if($createJobQuery) {  
        echo "Публикувано";
    }
}



