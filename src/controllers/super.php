<?php

if (Auth::isNotAutenticated()) {
    redirecT("signin");
}

if (!Auth::isSuper()) {
    redirecT('signin');
}

if (isset($_POST['create_new_job_tokken']) && $_POST['create_new_job_tokken'] == 1) {

    Database::insert('tb_job_post', array(
        'title'           => $_POST['job_title'],
        'company'         => $_POST['company'],
        'content'         => $_POST['job_content'],
        'priview_content' => $_POST['preview_content']
    ));

    Database::insert('tb_job_post__categoriesjob', array(
        'job_post_id' => Database::getLastInsertedId(),
        'categoryjob_id' => $_POST['job_category'],
    ));

    if (Database::query($queryBuilder)) {
        echo "Публикувано";
    }
}



