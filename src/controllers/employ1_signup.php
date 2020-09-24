<?php 

if(isset($_POST['employ_request_tokken']) AND $_POST['employ_request_tokken'] == 1) {
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $userFName = isset($_POST['user_fname']) ? $_POST['user_fname'] : '';
    $userLName = isset($_POST['user_lname']) ? $_POST['user_lname'] : '';
    $userEmail = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPhone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
    $userAge = isset($_POST['user_age']) ? $_POST['user_phone'] : '';
    $userPass = isset($_POST['user_pass']) ? $_POST['user_pass'] : '';
    $userPassRepeat     = isset($_POST['user_pass_repeat']) ? $_POST['user_pass_repeat'    ] : '';
    
   (strlen($userName) > 3) ? '' :  setFormError('employ_signup', 'user_name', 'Потребителското име трябва да съдържа минимум 3 символа')  ;
   
    
    (strlen($userFName) > 3) ? '' : setFormError('employ_signup', 'user_fname', 'Собственото име трябва да съдържа минимум 3 символа');
    
    
    (strlen($userLName) > 3) ? '' : setFormError('employ_signup', 'user_lname', 'Фамилията трябва да съдържа минимум 3 символа');
    
    
    (strlen($userEmail) > 5) ? '' : setFormError('employ_signup', 'user_email', 'Email трябва да съдържа минимум 5 символа');
    
    
    (strlen($userPhone) > 4) ? '' : setFormError('employ_signup', 'user_phone', 'Телефонният номер трябва да съдържа минимум 4 символа');
    
    
    (strlen($userAge) == 2 ) ? '' : setFormError('employ_signup', 'user_age', 'Възрастта трябва да съдържа 2 цифри');
    
    
   ($userPass = $userPassRepeat) ? '' : setFormError('employ_signup', 'user_pass', 'Паролата и потвърдената парола трябва да съвпадат');
    
    
        


    $createNewEmployRequest = "INSERT INTO tb_user_employ(user_name, fname, lname, email, tel, age, pass) "
            . "VALUES('$userName', '$userFName', '$userLName', '$userEmail', '$userPhone', '$userAge', '$userPass')";

    if (query($createNewEmployRequest)) {
        echo "Поздравления! Регистрирахте се успешно.";
    };
    
       
                
  };
 

