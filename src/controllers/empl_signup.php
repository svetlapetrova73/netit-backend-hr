<?php

function isEmployAlreadyExists($columnName) {

   $userName = $columnName['user_name'];
    $userEmail = $columnName['user_email'];
    
    $validateIfRegistartionEmployAlreadyExistQuery = "SELECT * "
                                                 . "FROM tb_user_employ"
                                                 . "WHERE user_name = '$userName' OR email = '$userEmail'";
    $databaseQueryResult = query($validateIfRegistartionEmployAlreadyExistQuery);
    $requestResult       = mysqli_fetch_assoc($databaseQueryResult);

    return ($requestResult != null);
};

function createNewEmployInDatabase($databaseColumn) {
    $userName = $databaseColumn['user_name'];
    $userFName = $databaseColumn['user_fname'];
    $userLName = $databaseColumn['user_lname'];
    $userEmail = $databaseColumn['user_email'];
    $userPhone = $databaseColumn['user_phone'];
    $userAge = $databaseColumn['user_age'];
    $userPass = $databaseColumn['user_pass'];
    
    $createNewEmployRequest = "INSERT INTO tb_employ(user_name, fname, lname, email, tel, age, pass) "
            . "VALUES('$userName', '$userFName', '$userLName', '$userEmail', '$userPhone', '$userAge', '$userPass')";
    
    return query($createNewEmployRequest);
}

//UPDATE
function assigneRoleToEmploy($employId, $roleId) {

    $assigneRoleToInsertedEmployQuery = "INSERT INTO tb_employ__role(empl_id, role_id) "
                                    . "VALUES($employId, $roleId)";    

    return query($assigneRoleToInsertedEmployQuery);
}

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
    };
    
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
        
    if(isEmployAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('empl_signup', 'user_name', 'Този потребител вече съществува');
    }
    
    $isEmployCreated = createNewEmployInDatabase(array(
        'user_name' => $userName,
        'user_fname' => $userFName,
        'user_lname' => $userLName,
        'user_email' => $userEmail,
        'user_phone' => $userPhone,
        'user_age' => $userAge,
        'user_pass' => $userPass,
    ));
    
     if($isEmployCreated){
          $isRoleAssignedSuccessfuly = assigneRoleToEmploy(getLastInsertedId(), 1);
          if($isRoleAssignedSuccessfuly) {
              echo "Поздравления! Регистрирахте се успешно.";
          }
     }       
}




function isEmployerAlreadyExists($columnName1) {

   $companyName = $columnName1['company_name'];
    
    $validateIfRegistartionEmployerAlreadyExistQuery = "SELECT * "
                                                 . "FROM tb_user_employ"
                                                 . "WHERE user_name = '$companyName'";
    $databaseQueryResult = query($validateIfRegistartionEmployerAlreadyExistQuery);
    $requestResult       = mysqli_fetch_assoc($databaseQueryResult);

    return ($requestResult != null);
}

function createNewEmployerInDatabase($databaseColumn1) {
    $companyName = $databaseColumn1['company_name'];
    $userBranch = $databaseColumn1['user_branch'];
    $businessActivity = $databaseColumn1['business_activity'];
    $employerPass = $databaseColumn1['employer_pass'];
    
    $createNewEmployerRequest = "INSERT INTO tb_employ(company_name, branch, business_activity, employer_pass) "
            . "VALUES('$companyName', '$userBranch', '$businessActivity', '$employerPass')";
    
    return query($createNewEmployerRequest);
}

//UPDATE
function assigneRoleToEmployer($employId, $roleId) {

    $assigneRoleToInsertedEmployerQuery = "INSERT INTO tb_employ__role(empl_id, role_id) "
                                    . "VALUES($employId, $roleId)";    

    return query($assigneRoleToInsertedEmployerQuery);
}

if(isset($_POST['empl_request_tokken2']) AND $_POST['empl_request_tokken2'] == 2) {
    $companyName = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $userBranch = isset($_POST['user_branch']) ? $_POST['user_branch'] : '';
    $businessActivity = isset($_POST['business_activity']) ? $_POST['business_activity'] : '';
    $employerPass = isset($_POST['employer_pass']) ? $_POST['employer_pass'] : '';
    $EmployerPassRepeat = isset($_POST['employer_pass_repeat']) ? $_POST['employer_pass_repeat'] : '';
    
    if(strlen($companyName) < 3) {
        return setFormError('empl_signup', 'company_name', 'Името на фирмата трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($userBranch) < 3) {
        return setFormError('empl_signup', 'user_branch', 'Браншът трябва да съдържа минимум 3 символа');
    }
    
    if(strlen($businessActivity) < 10) {
        return setFormError('empl_signup', 'business_activity', 'Описанието трябва да съдържа минимум 10 символа');
    }
    
    if($employerPass != $EmployerPassRepeat){
        return setFormError('empl_signup', 'employer_pass', 'Паролата и потвърдената парола трябва да съвпадат');
    }
    
    if(isEmployerAlreadyExists(array('company_name' => $companyName))) {
        return setFormError('empl_signup', 'company_name', 'Този потребител вече съществува');
    }
    
    $isEmployerCreated = createNewEmployerInDatabase(array(
        'company_name' => $companyName,
        'user_branch' => $userBranch,
        'business_activity' => $businessActivity,
        'employer_pass' => $employerPass,
    ));
    
     if($isEmployerCreated){
          $isRoleAssignedSuccessfuly1 = assigneRoleToEmploy(getLastInsertedId(), 1);
          if($isRoleAssignedSuccessfuly1) {
              echo "Поздравления! Регистрирахте се успешно.";
          }
     }          
}
