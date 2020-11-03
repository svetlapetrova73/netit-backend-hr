<?php

function getCategoryCollection() {
    return Database::getAll("SELECT * FROM tm_categoriesjob");
}

function getSuperCategory() {
    if (isset($_GET['category_id'])) {
        $post_category_id = $_GET['category_id'];
        $query = Database::query("SELECT title FROm tm_categoriesjob WHERE id = $post_category_id");

        return mysqli_fetch_assoc($query)['title'];
    }
}

function getSuperActionTokken() {
    if (isset($_GET['action'])) {
        return $_GET['action'];
    }

    return 'create';
}

function getCategoryTokken() {
    if (isset($_GET['category_id'])) {
        return $_GET['category_id'];
    }

    return 'NO';
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'create') {
    Database::insert('tm_categoriesjob', array(
        'title' => $_GET['category_title']
    ));

    echo 'Създадохте нова категория!';
}

if (isset($_GET['super_action_tokken']) AND $_GET['super_action_tokken'] == 'edit') {
    $categoryTitle = $_GET['category_title'];
    $categoryId = $_GET['super_category_tokken'];
    Database::query("UPDATE tm_categoriesjob SET title = '$categoryTitle' WHERE id = $categoryId");

    echo 'Редактирахте категория!';
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
    $categoryId = $_GET['category_id'];
    Database::query("DELETE FROM  tm_categoriesjob WHERE id = $categoryId");

    echo 'Изтрихте категория!';
}

