<?php

//employ
if(isset($_POST['empl_request_tokken1']) AND $_POST['empl_request_tokken1'] == 1) {
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $userFName = isset($_POST['user_fname']) ? $_POST['user_fname'] : '';
    $userLName = isset($_POST['user_lname']) ? $_POST['user_lname'] : '';
    $userEmail = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPhone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
    $userAge = isset($_POST['user_age']) ? $_POST['user_age'] : '';
    $userPass = isset($_POST['user_pass']) ? $_POST['user_pass'] : '';
    $userPassRepeat     = isset($_POST['user_pass_repeat']) ? $_POST['user_pass_repeat'    ] : '';
    
    
    if(strlen($userName) < 3) {
       return setFormError('empl_signup', 'user_name', 'Потребителското име трябва да съдържа минимум 3 символа');
    };
    
    if(strlen($userFName) < 3) {
        return setFormError('empl_signup', 'user_fname', 'Собственото име трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($userLName) < 3) {
        return setFormError('empl_signup', 'user_lname', 'Фамилията трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($userEmail) < 5) {
        return setFormError('empl_signup', 'user_email', 'Email трябва да съдържа минимум 5 символа');
    }
    
    if(strlen($userPhone) < 4) {
        return setFormError('empl_signup', 'user_phone', 'Телефонният номер трябва да съдържа минимум 4 символа');
    }
    
    if(strlen($userAge) !== 2 ) {
        return setFormError('empl_signup', 'user_age', 'Възрастта трябва да съдържа 2 цифри');
    }
    
    if($userPass != $userPassRepeat){
        return setFormError('empl_signup', 'user_pass', 'Паролата и потвърдената парола трябва да съвпадат');
    }
        
    if(Auth::isEmployAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('empl_signup', 'user_name', 'Този потребител вече съществува');
    }
    
    $isEmployCreated = Auth::createNewEmployInDatabase(array(
        'user_name' => $userName,
        'user_fname' => $userFName,
        'user_lname' => $userLName,
        'user_email' => $userEmail,
        'user_phone' => $userPhone,
        'user_age' => $userAge,
        'user_pass' => $userPass,
    ));
    
     if($isEmployCreated){
          $isRoleAssignedSuccessfuly = Auth::assigneRoleToEmpl(Database::getLastInsertedId(), 4);
          if($isRoleAssignedSuccessfuly) {
              echo "Поздравления! Регистрирахте се успешно.";
          }
     }       
}


//company
if(isset($_POST['empl_request_tokken2']) AND $_POST['empl_request_tokken2'] == 2) {
    $companyName = isset($_POST['company7_name']) ? $_POST['company7_name'] : '';
    $userBranch = isset($_POST['user7_branch']) ? $_POST['user7_branch'] : '';
    $businessActivity = isset($_POST['business7_activity']) ? $_POST['business7_activity'] : '';
    $employerPass = isset($_POST['employer7_pass']) ? $_POST['employer7_pass'] : '';
    $EmployerPassRepeat = isset($_POST['employer_pass_repeat']) ? $_POST['employer_pass_repeat'] : '';
    
    if(strlen($companyName) < 3) {
        return setFormError('empl_signup', 'company7_name', 'Името на фирмата трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($userBranch) < 3) {
        return setFormError('empl_signup', 'user7_branch', 'Браншът трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($businessActivity) < 10) {
        return setFormError('empl_signup', 'business7_activity', 'Описанието трябва да съдържа минимум 10 символа');
    }
    
    if($employerPass != $EmployerPassRepeat){
        return setFormError('empl_signup', 'employer7_pass', 'Паролата и потвърдената парола трябва да съвпадат');
    }
    
    if(Auth::isEmployerAlreadyExists(array('company7_name' => $companyName))) {
        return setFormError('empl_signup', 'company7_name', 'Този потребител вече съществува');
    }
    
    $isEmployerCreated = Auth::createNewEmployerInDatabase(array(
        'company_name' => $companyName,
        'user_branch' => $userBranch,
        'business_activity' => $businessActivity,
        'employer_pass' => $employerPass,
    ));
    
     if($isEmployerCreated){
         $isRoleAssignedSuccessfuly1 = Auth::assigneRoleToEmpl(Database::getLastInsertedId(), 3);
          if($isRoleAssignedSuccessfuly1) {
             echo "Поздравления! Регистрирахте се успешно.";
          }
    }          
 }

