<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/users_list.php'); ?>



<div class="wrapper">
    <p class="cat">Обяви за работа</p>
    <br>
    <?php $mysqlResult = listAllEmploy(); //posts
    
    while($employList = Database::fetch($mysqlResult)) { ?>

    
    <div class="priview_content" ><b><?php echo $employList['user_name']; ?></b></div>

    <div class="job-company"><?php echo $employList['fname']; ?></div>
    
    <div class="job-company"><?php echo $employList['lname']; ?></div>
    
    <div class="content"><?php echo $employList['tel']; ?></div>
    
    <div class="content"><?php echo $employList['age']; ?></div>
    
    <div class="content"><?php echo $employList['email']; ?></div>
    
    
    <br>
    
    <?php } ?>
</div>
<br>
<div class="list-item-1"><a  href="super.php">*</a></div>
<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>
