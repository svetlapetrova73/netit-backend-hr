<?php

//Чудовища/ employ

if (isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {
    $employEmail = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPassword = isset($_POST['user_password']) ? $_POST['user_password'] : '';

    $checkIfEmploy1ExistsQuery = "SELECT * FROM tb_employ WHERE email = '$employEmail' AND pass = '$userPassword'";

    $employRecord1 = Database::get($checkIfEmploy1ExistsQuery);

    if ($employRecord1) {

        $employRoleId = $employRecord1['id'];
        $getEmployRoleCollectionQuery = "SELECT  b.title AS role_title FROM netit_backend_hr.tb_employ__role AS a,
                                                    netit_backend_hr.tm_roles AS b
                                                    WHERE empl_id = $employRoleId AND
                                                    a.role_id = b.id;";

        $employRoleCollection = Database::getAll($getEmployRoleCollectionQuery);

        Auth::setAutenticatedUsers(array(
            'users_data_collection' => $employRecord1,
            'users_role_collection' => $employRoleCollection
        ));
        return redirecT('index');
    }
    return setFormError('signin', 'user_email', 'Регистрирайте се');
}

//Фирми / employer
if (isset($_POST['user_request_tokken2']) && $_POST['user_request_tokken2'] == 2) {
    $companyName1 = isset($_POST['company1_name']) ? $_POST['company1_name'] : '';
    $employerPassword1 = isset($_POST['employer1_password']) ? $_POST['employer1_password'] : '';

    $checkIfEmployer1ExistsQuery = "SELECT * FROM tb_employ WHERE company_name = '$companyName1' AND employer_pass = '$employerPassword1'";

    $employerRecord1 = Database::get($checkIfEmployer1ExistsQuery);

    if ($employerRecord1) {

        $employerRoleId = $employerRecord1['id'];
        $getEmployerRoleCollectionQuery = "SELECT  b.title AS role_title FROM netit_backend_hr.tb_employ__role AS a,
                                                    netit_backend_hr.tm_roles AS b
                                                    WHERE empl_id = $employerRoleId AND
                                                    a.role_id = b.id;";

        $employerRoleCollection = Database::getAll($getEmployerRoleCollectionQuery);

        Auth::setAutenticatedUsers(array(
            'users_data_collection' => $employerRecord1,
            'users_role_collection' => $employerRoleCollection
        ));
        return redirecT('index');
    }
    return setFormError('signin', 'company1_name', 'Регистрирайте се');
}




