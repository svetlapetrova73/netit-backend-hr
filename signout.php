<?php session_start(); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/models/Auth.php'); ?>
<?php include 'C:/xampp/htdocs/netit-backend-hr/src/util/redirect.php';    ?>



<?php


Auth::signout();
redirecT('signin');