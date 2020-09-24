<?php

if(isset($_POST['user_request_tokken']) && $_POST['user_request_tokken'] == 1) {
    $userEmail      = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $userPassword   = isset($_POST['user_pass']) ? $_POST['user_pass'] : '';
};