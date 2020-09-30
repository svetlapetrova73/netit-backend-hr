<?php session_start(); ?>
<?php include './src/db/Database.php';      ?>
<?php include './src/models/Auth.php';      ?>
<?php include './src/util/form.php';        ?>
<?php include './src/util/redirect.php';        ?>

<html>
    
<head>
    <title>monsters</title>
    <link rel="stylesheet" href='./css/style.css'/>
</head>
<body>

<div id="header">
    
    <h1 class   = "logo">Агенция за подбор на чудовищен персонал</h1>
    
    <div>
        <ul>
            <li class="list-item"><a href="index.php">Начало</a></li>
            <li class="list-item"><a href="signin.php">Sign in</a></li>
            <li class="list-item"><a href="empl_signup.php">Sign up</a></li>
            <li class="list-item"><a href="job_postings.php">Обяви за работа</a></li>
        </ul>
    </div>
    <img src='./images/monster.png' alt="monster" width="1000" height="400" class="center">
</div>
   
