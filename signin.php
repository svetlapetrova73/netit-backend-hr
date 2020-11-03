<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('./src/controllers/signin.php') ?>

<table style="width:100%; margin-bottom: 20px">
    <tr>
        <td><div id="signup--wrapper">
                <p class="form_title">Вход в системата за всички уважаеми Чудовища:</p>
                <form method="POST">

                    <input placeholder  = "Вашият E-mail"
                           class        = "input"
                           type         = "text"      
                           name         = "user_email">
                           <?php displayFormError('signin', 'user_email'); ?>

                    <input placeholder  = "Вашата парола" 
                           class        = "input"
                           type         = "password"  
                           name         = "user_password">

                    <input type         = "hidden"    
                           name         = "user_request_tokken"
                           value        = "1">
                    <input class        = "submit" 
                           type         = "submit">
                </form>
            </div></td>
    <br>
    <br>
    <td><div id="signup--wrapper1">
            <p class="form_title">Вход в системата за всички ФИРМИ, предлагащи работа за Чудовища:</p>
            <form method="POST">

                <input placeholder  = "Име на фирмата"
                       class        = "input"
                       type         = "text"      
                       name         = "company1_name">
                       <?php displayFormError('signin', 'company1_name'); ?>

                <input placeholder  = "Вашата парола" 
                       class        = "input"
                       type         = "password"  
                       name         = "employer1_password">

                <input type         = "hidden"    
                       name         = "user_request_tokken2"
                       value        = "2">

                <input class        = "submit" 
                       type         = "submit">
            </form>
        </div></td>
</tr>
</table>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>