<?php

Class Auth {

    //employ
    static function isEmployAlreadyExists($columnName) {
        $userName  = $columnName['user_name'];
        $userEmail = $columnName['user_email'];

        $validateIfRegistartionEmployAlreadyExistQuery = "SELECT * FROM tb_employ WHERE user_name = '$userName' OR email = '$userEmail' ";
        $requestResult = Database::get($validateIfRegistartionEmployAlreadyExistQuery);

        return ($requestResult != null);
    }

    //company
    static function isEmployerAlreadyExists($columnName1) {
        $companyName = $columnName1['company7_name'];

        $validateIfRegistartionEmployerAlreadyExistQuery = "SELECT * FROM tb_employ WHERE company_name = '$companyName'";
        $requestResult = Database::get($validateIfRegistartionEmployerAlreadyExistQuery);

        return ($requestResult != null);
    }

    //employ
    static function createNewEmployInDatabase($databaseColumn) {
        return Database::insert('tb_employ', array(
                    'user_name' => $databaseColumn['user_name'],
                    'fname' => $databaseColumn['user_fname'],
                    'lname' => $userLName = $databaseColumn['user_lname'],
                    'tel' => $userPhone = $databaseColumn['user_phone'],
                    'age' => $userAge = $databaseColumn['user_age'],
                    'email' => $userEmail = $databaseColumn['user_email'],
                    'pass' => $userPass = $databaseColumn['user_pass']
        ));
    }

    //company
    static function createNewEmployerInDatabase($databaseColumn1) {
        return Database::insert('tb_employ', array(
                    'company_name' => $companyName = $databaseColumn1['company_name'],
                    'branch' => $userBranch = $databaseColumn1['user_branch'],
                    'business_activity' => $businessActivity = $databaseColumn1['business_activity'],
                    'employer_pass' => $employerPass = $databaseColumn1['employer_pass']
        ));
    }

    //employ
    static function assigneRoleToEmpl($employId, $roleId) {
        return Database::insert('tb_employ__role', array(
                    'empl_id' => $employId,
                    'role_id' => $roleId
        ));
    }

    //employ
    static function createNewEmploy($databaseColumn) {
        $isEmployCreated = Auth::createNewEmployInDatabase($databaseColumn);

        if ($isEmployCreated) {
            return Auth::assigneRoleToEmploy(Database::getLastInsertedId(), 3);
        }
    }

    //company
    static function createNewEmployer($databaseColumn1) {
        $isEmployerCreated = Auth::createNewEmployerInDatabase($databaseColumn1);

        if ($isEmployerCreated) {
            return Auth::assigneRoleToEmployer(Database::getLastInsertedId(), 3);
        }
    }

    //employ/setAutenticationFlagToAvailable() - Проверка дали потребителят се е логнал
    static function setAutenticatedUsers($authenticatedCollectionData) {
        $_SESSION['users_data_collection'] = $authenticatedCollectionData['users_data_collection'];
        $_SESSION['users_role_collection'] = $authenticatedCollectionData['users_role_collection'];
        $_SESSION['is_authenticated'] = true;
    }

    static function isAutenticated() {
        return isset($_SESSION['is_authenticated']) ? $_SESSION['is_authenticated'] : false;
    }

    static function isNotAutenticated() {
        return !Auth::isAutenticated();
    }

    static function isHR() {
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

            if ($value['role_title'] == $roleTitle)
                return true;
        }
        return false;
    }
}