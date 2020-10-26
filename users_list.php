<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/users_list.php'); ?>



<div class="wrapper">
    <p class="cat">Кандидат-служители</p>
    <br>
    <?php $mysqlResult = listAllEmploy(); 
    
    foreach(listAllEmploy() as $key => $employList) { ?>

    
    <div class="priview_content" ><b><?php echo $employList['user_name']; ?></b></div>

    <div class="job-company"><?php echo $employList['fname']; ?></div>
    
    <div class="job-company"><?php echo $employList['lname']; ?></div>
    
    <div class="content"><?php echo $employList['tel']; ?></div>
    
    <div class="content"><?php echo $employList['age']; ?></div>
    
    <div class="content"><?php echo $employList['email']; ?></div>
    
     <br>
     
    <?php } ?>
     
   <?php Pagination::display1(); ?> 
   
</div>

<br>


<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>
