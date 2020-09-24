<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('./src/controllers/empl_signup.php') ?>


Ако сте чудовище-кандидатслужител или чудовище-служител на "Агенцията за подбор на чудовищен персонал", най-любезно молим да се регистрирате в нашата система:
<div id="signup--wrapper">
    <form method="POST">

        <input placeholder  = "Потребителско име" 
               class        = "input"  
               type         = "text"      
               name         = "user_name">
        <?php displayFormError('employ_signup', 'user_name'); ?>
       
        
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
</div>
<br>
<br>
Ако сте фирма, която предлага работа за чудовища:
<div id="signup--wrapper">
    <form method="POST">
        <input placeholder  = "Име на фирмата" 
               class        = "input"  
               type         = "text"      
               name         = "company_name">
        <?php displayFormError('empl_signup', 'company_name'); ?>
       
        
        <input placeholder  ="Бранш" 
               class        ="input"  
               type         ="text"      
               name         ="user_branch">
        <?php displayFormError('empl_signup', 'user_branch'); ?>
        
        
        <textarea name          = "business_activity" 
                      placeholder   = " Кратко описание на дейността на фирмата"
                      class ="textarea"></textarea>
         <?php displayFormError('employer_signup', 'business_activity'); ?>
                      
        <input placeholder  = "Парола" 
               class        = "input"  
               type         = "password"  
               name         = "employer_pass">
        <?php displayFormError('empl_signup', 'employer_pass'); ?>
        
        
        <input placeholder  = "Повторете паролата" 
               class        = "input"  
               type         = "password"  
               name         = "employer_pass_repeat">
        
        <input type         = "hidden"  
               name         = "empl_request_tokken2"
               value        = "2">
        
        <input class="submit" type="submit">
    </form>
</div>

<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>


