<?php session_start(); ?>
<?php include './src/db/Database.php'; ?>
<?php include './src/models/Auth.php'; ?>
<?php include './src/util/form.php'; ?>
<?php include './src/util/Pagination.php'; ?>
<?php include './src/util/redirect.php'; ?>

<html>
    <head>
        <title>monsters</title>
        <link rel="stylesheet" href='./css/style.css'/>
    </head>
    <body>

        <div id="header" >
            <div class="sticky">
                <?php if (Auth::isNotAutenticated()) { ?>
                
                    <ul>
                        <li class="list-item-1"><a href="signin.php">Вход</a></li>
                        <li class="list-item-1"><a href="empl_signup.php">Регистрация</a></li> 
                    </ul>
                <?php } ?>

                <?php if (Auth::isAutenticated()) { ?>
                 
                    <ul>
                        <li class="list-item-1"><a href="signout.php">Изход</a></li>
                    </ul>
                <?php } ?>
            </div>

            <h1 class   = "logo">Агенция за подбор на чудовищен персонал</h1>

            <div >
                <ul>
                    <li class="list-item"><a href="index.php">Начало</a></li>
                    <li class="list-item"><a href="job_postings.php">Обяви за работа</a></li>
                    <li class="list-item"><a href="employer_jobpost.php">Публикуване на обяви за работа</a></li>
                    <li class="list-item"><a href="users_list.php">Кандидати за служители</a></li>
                </ul>
            </div>

            <a href="index.php">
                <img src='./images/monster.png' alt="monster" width="1000" height="400" class="center">
            </a>
        </div>