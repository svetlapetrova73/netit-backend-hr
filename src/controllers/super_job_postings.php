<?php

if (Auth::isNotAutenticated()) {
    redirecT("signin");
}

if (!Auth::isSuper()) {
    redirecT('signin');
}

function listAllJobPost() {
    $myCategory = null;
    $totalItemPerPage = 5;

    if (isset($_GET['job_search_tokken']) && $_GET['job_search_tokken'] == 1) {
        //var_dump($_GET);
        $searchQuery = $_GET['s'];
        $searchDescriptorColumn = $_GET['s_selector'];

        $categoryQuery = $myCategory ? "b.categoryjob_id = $myCategory AND " : " ";
        $requestQuery = "SELECT * FROM tb_job_post a,
                                       tb_job_post__categoriesjob b
                                  WHERE a.id = b.job_post_id AND 
                                        $categoryQuery 
                                        a.$searchDescriptorColumn LIKE '%$searchQuery%'";

        return Database::query($requestQuery);
    }

    if (isset($_GET['categor'])) {
        $myCategory = $_GET['categor'];
        return Database::query("SELECT * FROM tb_job_post a,
                                tb_job_post__categoriesjob b
                                WHERE a.id = b.job_post_id AND 
				b.categoryjob_id = $myCategory");
    }

    if (isset($_POST['job_id'])) {

        $post_job_id = $_POST['job_id'];
        $query = Database::query("SELECT * FROm tb_job_post WHERE id = $post_job_id");

        return mysqli_fetch_assoc($query)[' * '];
    }

    $pageLimit = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_job_post"));
    return Database::getAll("SELECT * FROM tb_job_post LIMIT $pageOffset, $pageLimit");
}

function getJobCollection() {
    return Database::getAll("SELECT * FROM tb_job_post");
}

function getSuperJobPost() {
    if (isset($_GET['job_id'])) {
        $JobPost_id = $_GET['job_id'];
        $query = Database::query("SELECT title FROM tb_job_post WHERE id = $JobPost_id");

        return mysqli_fetch_assoc($query)['title'];
    }
}

function getSuperJobPostCompany() {
    if (isset($_GET['job_id'])) {
        $JobPost_id = $_GET['job_id'];
        $query = Database::query("SELECT company FROM tb_job_post WHERE id = $JobPost_id");

        return mysqli_fetch_assoc($query)['company'];
    }
}

function getSuperJobPostContent() {
    if (isset($_GET['job_id'])) {
        $JobPost_id = $_GET['job_id'];
        $query = Database::query("SELECT content FROM tb_job_post WHERE id = $JobPost_id");

        return mysqli_fetch_assoc($query)['content'];
    }
}

function getSuperJobPostPrevContent() {
    if (isset($_GET['job_id'])) {
        $JobPost_id = $_GET['job_id'];
        $query = Database::query("SELECT priview_content FROM tb_job_post WHERE id = $JobPost_id");

        return mysqli_fetch_assoc($query)['priview_content'];
    }
}

function getSuperActionTokken() {

    if (isset($_GET['action'])) {
        return $_GET['action'];
    }

    return 'create';
}

function getJobTokken() {

    if (isset($_GET['job_id'])) {
        return $_GET['job_id'];
    }

    return 'NO';
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'create') {
    $jobTitle = $_GET['joby_title'];

    Database::query("INSERT INTO tb_job_post(title) VALUES ('$jobTitle')");

    echo 'Създадохте нова обява!';
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit') {
    $jobTitle = $_GET['joby_title'];
    $jobId = $_GET['super_job_tokken'];

    Database::query("UPDATE tb_job_post SET title = '$jobTitle' WHERE id=$jobId");
    Database::query("UPDATE tb_job_post SET company = '$companY' WHERE id=$jobId");

    echo 'Редактирахте обява за работа:<br>' . $jobTitle;
    ;
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit1') {
    $companY = $_GET['companyy'];
    $jobId = $_GET['super_job_tokken'];

    Database::query("UPDATE tb_job_post SET company = '$companY' WHERE id=$jobId");

    echo 'Редактирахте обява за работа:<br>' . $companY;
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit2') {
    $contenT = $_GET['content'];
    $jobId = $_GET['super_job_tokken'];

    Database::query("UPDATE tb_job_post SET content = '$contenT' WHERE id=$jobId");

    echo 'Редактирахте обява за работа:<br>' . $contenT;
}


if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit3') {

    $previewContent = $_GET['preview_content'];
    $jobId = $_GET['super_job_tokken'];

    Database::query("UPDATE tb_job_post SET priview_content = '$$previewContent' WHERE id=$jobId");

    echo 'Редактирахте обява за работа:<br>' . $previewContent;
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
    $jobId = $_GET['job_id'];

    Database::query("DELETE FROM  tb_job_post WHERE id = $jobId");

    echo 'Изтрихте обява за работа!';

    function listAllJobCategory() {
        return Database::query("SELECT * FROM tm_categoriesjob");
    }
}

