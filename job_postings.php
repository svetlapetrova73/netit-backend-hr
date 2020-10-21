<?php include('C:/xampp/htdocs/netit-backend-hr/template/header.php'); ?>
<?php include('C:/xampp/htdocs/netit-backend-hr/src/controllers/job_postings.php'); ?>

 <?php $categoryFetchResult  = Database::query("SELECT * FROM tm_categoriesjob"); ?>


<div class="flex">
    
<div class="wrapper">
    <p class="cat">Категории</p>
    
    <ul id      = "category-placeholder" 
        class   = "mb-25">
        
        <?php while($jobCategory = Database::fetch($categoryFetchResult)) {  ?>
        <li class="category-placeholder--category">
            <?php   
            $categoryId = $jobCategory['id']; ?>
            <a href="<?php echo "http://localhost/netit-backend-hr/job_postings.php?categor=$categoryId" ?>">
                <?php echo $jobCategory['title'] ?>
            </a>
        </li>
        <?php } ?>

            <li class="category-placeholder--category">
            <a href="http://localhost/netit-backend-hr/job_postings.php">
                Всички категории
            </a>
        </li>    
    </ul>

<br>
<br>
</div>
<div class="wrapper">
    <p class="cat">Обяви за работа</p>
    <br>
    <br>
<form method="GET">
        <label class="tarsi" for="s"><b>Търси в обяви:</b></label><br>
            <input class="search"
                   type         = "text" 
                   placeholder  = "Търси ..." 
                   name         = "s">
          
            <select class="search" name="s_selector">
                <option value="company">Търси по име на фирма</option>
                <option value="content">Търси по съдържание на обява</option>
            </select>
           
            <input type         = "hidden" 
                   name         = "job_search_tokken" 
                   value        = "1">
            <input class="submit-1" type="submit">
        </form>

<br>
<br>
<div>
  
    <br>
    
   <?php 
  //$query = listAllJobPost();
   //while($jobPost = Database::fetch($query)) {
   
   foreach(listAllJobPost() as $key => $jobPost) {
   ?>
    
    <div class="job-title" ><b><?php echo $jobPost['title']; ?></b></div>

    <div class="job-company"><?php echo $jobPost['company']; ?></div>
    
    <div class="priview_content"><?php echo $jobPost['priview_content']; ?></div>
    
    <br>
    
   <?php } ?>
    <?php Pagination::display(); ?>
    
  </div>  
</div>
 </div>  
   



<?php include('C:/xampp/htdocs/netit-backend-hr/template/footer.php'); ?>
