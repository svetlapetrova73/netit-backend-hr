
<?php include('./src/controllers/signin.php') ?>

<div id="signup--wrapper">
    <form method="POST">

        <input placeholder  = "Вашият E-mail"
               class        = "input"
               type         = "text"      
               name         = "user_email">
        

        <input placeholder  = "Вашата парола" 
               class        = "input"
               type         = "password"  
               name         = "user_pass">
        <input type         = "hidden"    
               name         = "user_request_tokken"
               value        = "1">
        <input class        = "submit" 
               type         = "submit">
    </form>
</div>

