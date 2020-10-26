<?php session_start(); ?>
<?php include './src/db/Database.php';      ?>
<?php include './src/models/Auth.php';      ?>
<?php include './src/util/form.php';        ?>
<?php include './src/util/redirect.php';        ?>
<?php include './src/util/Pagination.php';        ?>


<html>
    
<head>
    <title>monsters</title>
    <link rel="stylesheet" href='./css/style.css'/>
</head>
<body>

<div id="header" >
    <div class="sticky">
        <?php if(Auth::isNotAutenticated()) { ?> 
            <ul>
               <li class="list-item-1"><a href="signin.php">Вход</a></li>
               <li class="list-item-1"><a href="empl_signup.php">Регистрация</a></li> 
        </ul>
        <?php } ?>
       
        <?php if(Auth::isAutenticated()) { ?>
        
          
              
        <ul>
               <li class="list-item-1"><a href="signout.php">Изход</a></li>
            </ul>
        <?php } ?>
        
               
        
        <?php if(Auth::isSuper()) { ?>        
        <ul>
            <li class="list-item-1"><a href="super_category.php">Администрация на категориите</a></li>
            <li class="list-item-1"><a href="super_job_postings.php">Администрация на обявите за работа</a></li>
        </ul>
        <?php } ?>   
        
        </div>
       
    <h1 class   = "logo">Агенция за подбор на чудовищен персонал. Панел-SUPER</h1>
    
    <div >
        <ul>
            <li class="list-item"><a href="index.php">Начало</a></li>
            <li class="list-item"><a href="job_postings.php">Обяви за работа</a></li>
            <li class="list-item"><a href="employer_jobpost.php">Публикуване на обяви за работа</a></li>
            <li class="list-item"><a href="users_list.php">Кандидати за служители</a></li>
            
            
        </ul>
    </div>
    
    
</div>
