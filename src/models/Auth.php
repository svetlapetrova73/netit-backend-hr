<?php

Class Auth {
    //employ
    static function isEmployAlreadyExists($columnName) {

   $userName = $columnName['user_name'];
   $userEmail = $columnName['user_email'];
    
    $validateIfRegistartionEmployAlreadyExistQuery = "SELECT * FROM tb_employ WHERE user_name = '$userName' OR email = '$userEmail' ";
    
    $requestResult = Database::get($validateIfRegistartionEmployAlreadyExistQuery);
    
    return ($requestResult != null);
    }
    
    //company
    static function isEmployerAlreadyExists($columnName1) {

   $companyName = $columnName1['company_name'];
    
    $validateIfRegistartionEmployerAlreadyExistQuery = "SELECT * FROM tb_employ WHERE company_name = '$companyName'";
   $requestResult = Database::get($validateIfRegistartionEmployerAlreadyExistQuery);

    return ($requestResult != null);
    }
    
    //employ
    static function createNewEmployInDatabase($databaseColumn) {
    $userName = $databaseColumn['user_name'];
    $userFName = $databaseColumn['user_fname'];
    $userLName = $databaseColumn['user_lname'];
    $userEmail = $databaseColumn['user_email'];
    $userPhone = $databaseColumn['user_phone'];
    $userAge = $databaseColumn['user_age'];
    $userPass = $databaseColumn['user_pass'];

    $createNewEmployRequest = "INSERT INTO tb_employ(user_name, fname, lname, email, tel, age, pass) "
            . "VALUES('$userName', '$userFName', '$userLName', '$userEmail', '$userPhone', '$userAge', '$userPass')";
    
    return Database::query($createNewEmployRequest);
    }
    
    //company
    static function createNewEmployerInDatabase($databaseColumn1) {
    $companyName = $databaseColumn1['company_name'];
    $userBranch = $databaseColumn1['user_branch'];
    $businessActivity = $databaseColumn1['business_activity'];
    $employerPass = $databaseColumn1['employer_pass'];
    
    $createNewEmployerRequest = "INSERT INTO tb_employ(company_name, branch, business_activity, employer_pass) "
            . "VALUES('$companyName', '$userBranch', '$businessActivity', '$employerPass')";
    
    return Database::query($createNewEmployerRequest);
    }
    
    //employ
    static function assigneRoleToEmploy($employId, $roleId) {

    $assigneRoleToInsertedEmployQuery = "INSERT INTO tb_employ__role(empl_id, role_id) "
                                    . "VALUES($employId, $roleId)";    

    return Database::query($assigneRoleToInsertedEmployQuery);
    }
    
    //company
    //UPDATE
    static function assigneRoleToEmployer($employId, $roleId) {

        $assigneRoleToInsertedEmployerQuery = "INSERT INTO tb_employ__role(empl_id, role_id) "
                                    . "VALUES($employId, $roleId)";    

       return Database::query($assigneRoleToInsertedEmployerQuery);
       }
       
       //employ(общия метод)
       static function createNewEmploy($databaseColumn) {
           $isEmployCreated = Auth::createNewEmployInDatabase($databaseColumn);
           
           if($isEmployCreated){
               return Auth::assigneRoleToEmploy(Database::getLastInsertedId(), 3);
           }
       }
       
       //company(общия метод)
       static function createNewEmployer($databaseColumn1) {
           $isEmployerCreated = Auth::createNewEmployerInDatabase($databaseColumn1);
           
           if($isEmployerCreated){
               return Auth::assigneRoleToEmployer(Database::getLastInsertedId(), 3);
           }
       }
}

