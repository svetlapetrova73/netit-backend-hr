<?php

//Чудовища/ employ

if(isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {
    $employEmail      = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPassword   = isset($_POST['user_password']) ? $_POST['user_password'] : '';
    
   $checkIfEmploy1ExistsQuery = "SELECT * FROM tb_employ WHERE email = '$employEmail' AND pass = '$userPassword'";
   
   $employRecord = Database::get($checkIfEmploy1ExistsQuery);
   
   if($employRecord){
       $_SESSION['is_autenticated'] = true ;
       return redirectT('index');
   }
    return setFormError('signin', 'user_email', 'Регистрирайте се');
    
}
  

//Фирми
if(isset($_POST['user_request_tokken2']) && $_POST['user_request_tokken2'] == 2) {
    $companyName1      = isset($_POST['company1_name']) ? $_POST['company1_name'] : '';
    $employerPassword1   = isset($_POST['employer1_password']) ? $_POST['employer1_password'] : '';
    
   $checkIfEmployer1ExistsQuery = "SELECT * FROM tb_employ WHERE company_name = '$companyName1' AND employer_pass = '$employerPassword1'";
  
   $employerRecord1 = Database::get($checkIfEmploy1ExistsQuery);
   
   if($employerRecord1) {
       $_SESSION['is_autenticated'] = true;
       return redirectT('index');
   }
   return setFormError('signin', 'company1_name', 'Регистрирайте се');
}


