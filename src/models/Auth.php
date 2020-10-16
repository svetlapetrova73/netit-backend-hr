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
       
       //employ/setAutenticationFlagToAvailable() - Проверка дали потребителя се е логнал
       static function setAutenticatedUsers($authenticatedCollectionData) {
           
           $_SESSION['users_data_collection']   = $authenticatedCollectionData['users_data_collection'];
           $_SESSION['users_role_collection']   = $authenticatedCollectionData['users_role_collection'];
           $_SESSION['is_authenticated'] = true;
           
          
       }
       
       static function isAutenticated() {
         
           
    return isset($_SESSION['is_authenticated']) ? $_SESSION['is_authenticated'] : false; 
        
       }

     
       static function isNotAutenticated() {
           return !Auth::isAutenticated();
       }
       
       static function isHR(){
           return Auth::isAutenticated() &&
           Auth::hasRole('HR');
       }
       
       static function isSuper() {
           return Auth::isAutenticated() &&
           Auth::hasRole('SUPER');
       }
       
       static function isEmployer() {
           return Auth::isAutenticated() &&
           Auth::hasRole('EMPLOYER');
       }
       
       static function isEmploy() {
           return Auth::isAutenticated() &&
           Auth::hasRole('EMPLOY');
       }
       
       
       static function signout() {
           session_destroy();
       }
       
     private static function hasRole($roleTitle) {
        
        foreach ($_SESSION['users_role_collection'] as $key => $value) {
            
            if($value['role_title'] == $roleTitle) return true;
        }
        return false;
     }
     
    static function listAllEmploy() {
    
    if(isset($_POST['empl_request_tokken1']) AND $_POST['empl_request_tokken1'] == 1){
        //var_dump($_GET);
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
   
    }
    return Database::query("SELECT * FROM tb_employ");
  }


static function visibleEmploy(){
    
}
}


