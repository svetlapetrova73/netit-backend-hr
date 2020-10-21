<?php

if(Auth::isNotAutenticated()) {
    redirecT("signin");
}

if(!Auth::isSuper() AND !Auth::isHR()) {
    redirecT('signin');
} 

function listAllEmploy() {
    $myCategory = null;
    
    
    
    if(isset($_POST['empl_request_tokken1']) AND $_POST['empl_request_tokken1'] == 1){
       
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $userFName = isset($_POST['user_fname']) ? $_POST['user_fname'] : '';
    $userLName = isset($_POST['user_lname']) ? $_POST['user_lname'] : '';
    $userEmail = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPhone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
    $userAge = isset($_POST['user_age']) ? $_POST['user_age'] : '';
   $userPass = isset($_POST['user_pass']) ? $_POST['user_pass'] : '';
   
  
       
    
       return Database::query("SELECT * FROM tb_employ" );
       
       
   }
   
  $pageLimit  = Pagination::getPageLimit();
    $pageOffset = Pagination::getPageOffset();
    Pagination::setTotalCount(Database::count("tb_employ"));
    return Database::getAll("SELECT * FROM tb_employ LIMIT $pageOffset, $pageLimit");
}
    
   
    
    
   
   




