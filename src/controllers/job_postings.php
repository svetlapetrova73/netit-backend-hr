<?php

if(Auth::isNotAutenticated()) {
    redirecT("signin");
}

if(!Auth::isEmploy() AND !Auth::isSuper()) {
    redirecT('signin');
}



function listAllJobPost() {
    $myCategory = null;
    $totalItemPerPage = 5;
    
    if(isset($_GET['job_search_tokken']) && $_GET['job_search_tokken'] == 1){
        //var_dump($_GET);
        $searchQuery = $_GET['s'];
        $searchDescriptorColumn = $_GET['s_selector'];
        
        $categoryQuery          = $myCategory ? "b.categoryjob_id = $myCategory AND " : " ";
        $requestQuery           = "SELECT * FROM tb_job_post a,
                                            tb_job_post__categoriesjob b
                                            WHERE a.id = b.job_post_id AND 
                                            $categoryQuery 
                                            a.$searchDescriptorColumn LIKE '%$searchQuery%'";
        
        //$requestQuery = "SELECT * FROM tb_job_post WHERE company LIKE '%$searchQuery%'";
        return Database::query($requestQuery);
    }
    
    
    if(isset($_GET['categor'])) {

        $myCategory = $_GET['categor'];
        return Database::query("SELECT * FROM tb_job_post a,
                                tb_job_post__categoriesjob b
                                WHERE a.id = b.job_post_id AND 
				b.categoryjob_id = $myCategory");
        
    } 
    
     $pageLimit  = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_job_post"));
    return Database::getAll("SELECT * FROM tb_job_post LIMIT $pageOffset, $pageLimit");
    
}

function listAllJobCategory() {    
    return Database::query("SELECT * FROM tm_categoriesjob");
    
}
