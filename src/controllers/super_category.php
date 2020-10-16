<?php

function getCategoryCollection() {
    return Database::getAll("SELECT * FROM tm_categoriesjob");
}

function getSuperCategory() {

    if(isset($_GET['category_id'])) {

        $post_category_id = $_GET['category_id'];
        $query = Database::query("SELECT title FROm tm_categoriesjob WHERE id = $post_category_id");

        return mysqli_fetch_assoc($query)['title'];
    }    
}


function getSuperActionTokken() {

    if(isset($_GET['action'])) {
        return $_GET['action'];
    }

    return 'create';
}

function getCategoryTokken() {

    if(isset($_GET['category_id'])) {
        return $_GET['category_id'];
    }

    return 'NO';
}


if(isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'create') {

    // INSERT NEW DATA INTO THE DATABASE
    $categoryTitle = $_GET['category_title'];
    echo 'Създадохте категория: ' . $categoryTitle;
    Database::query("INSERT INTO tm_categoriesjob(title) VALUES('$categoryTitle')");
}


if(isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit') {
    // UPDATE EXISTING DATA
    $categoryTitle  = $_GET['category_title'];
    $categoryId     = $_GET['super_category_tokken'];
    Database::query("UPDATE tm_categoriesjob SET title = '$categoryTitle' WHERE id = $categoryId");    
}




if(isset($_GET['action']) AND $_GET['action'] == 'delete') {
    // DELETE EXISTING DATA
    $categoryId     = $_GET['category_id'];
    Database::query("DELETE FROM  tm_categoriesjob WHERE id = $categoryId");
}

