<?php

function dbConnect() {
    return mysqli_connect("localhost", "root", "", "netit_backend_hr");
}

function query($query) { 
                                       // Connet to database
    $connection = mysqli_connect("localhost", "root", "", "netit_backend_hr");

    if(!$connection) {
        echo mysqli_connect_error();
        return;
    }

    $databaseResult = mysqli_query($connection, $query);
    if(!$databaseResult){
        echo '<div class="db-error">';
        echo mysqli_error($connection);
        echo '</div>';
    }
    return $databaseResult;
}

function getLastInsertedId() {

    return mysqli_insert_id(dbConnect());
}


    

