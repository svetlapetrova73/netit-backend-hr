<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>

<?php include('./src/controllers/empl_signup.php') ?>

<table style="width:100%; margin-bottom: 40px;">
    <tr>
    
    <td><div id="signup--wrapper">
        
        <p class="form_title">Ако сте Чудовище-кандидатслужител или Чудовище-служител на "Агенцията за подбор на чудовищен персонал", най-любезно молим да се регистрирате в нашата система:</p> 
        
         <form method="POST">

        <input placeholder  = "Потребителско име" 
               class        = "input"  
               type         = "text"      
               name         = "user_name">
        <?php displayFormError('empl_signup', 'user_name'); ?>
       
        
        <input placeholder  ="Име" 
               class        ="input"  
               type         ="text"      
               name         ="user_fname">
        <?php displayFormError('empl_signup', 'user_fname'); ?>
        
        
        <input placeholder  = "Фамилия" 
               class        = "input"  
               type         = "text"      
               name         = "user_lname">
        <?php displayFormError('empl_signup', 'user_lname'); ?>
        
        
        <input placeholder  = "E-mail" 
               class        = "input"  
               type         = "email"      
               name         = "user_email">
        <?php displayFormError('empl_signup', 'user_email'); ?>
        
         <input placeholder  = "Телефон" 
               class        = "input"  
               type         = "tel"      
               name         = "user_phone">
        <?php displayFormError('empl_signup', 'tel'); ?>
         
         <input placeholder  = "Възраст" 
               class        = "input"  
               type         = "number"      
               name         = "user_age">
        <?php displayFormError('empl_signup', 'user_age'); ?>
       
        
        <input placeholder  = "Парола" 
               class        = "input"  
               type         = "password"  
               name         = "user_pass">
        <?php displayFormError('empl_signup', 'user_pass'); ?>
        
        
        <input placeholder  = "Повторете паролата" 
               class        = "input"  
               type         = "password"  
               name         = "user_pass_repeat">
        
        <input type         = "hidden"  
               name         = "empl_request_tokken1"
               value        = "1">
        
        
        <input class="submit" type="submit">
    </form>
        
    </div></td>

     <td>
         <div id="signup--wrapper1">
        <p class="form_title">Ако сте фирма, предлагаща работа за Чудовища, най-любезно молим да се регистрирате в нашата система:</p>
        <form method="POST">
            <input placeholder  = "Име на фирмата" 
               class        = "input"  
               type         = "text"      
               name         = "company7_name">
        <?php displayFormError('empl_signup', 'company7_name'); ?>
       
        
            <input placeholder  ="Бранш" 
               class        ="input"  
               type         ="text"      
               name         ="user7_branch">
        <?php displayFormError('empl_signup', 'user7_branch'); ?>
        
        
            <textarea name          = "business7_activity" 
                      placeholder   = " Кратко описание на дейността на фирмата"
                      class ="textarea7"></textarea>
         <?php displayFormError('employer_signup', 'business7_activity'); ?>
                      
            <input placeholder  = "Парола" 
               class        = "input"  
               type         = "password"  
               name         = "employer7_pass">
        <?php displayFormError('empl_signup', 'employer7_pass'); ?>
        
        
            <input placeholder  = "Повторете паролата" 
               class        = "input"  
               type         = "password"  
               name         = "employer_pass_repeat">
        
            <input type         = "hidden"  
               name         = "empl_request_tokken2"
               value        = "2">
        
            <input class="submit" type="submit">
        </form>
    </div></td>
    </tr>
</table>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>
</body>




