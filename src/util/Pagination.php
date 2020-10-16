<?php

class Pagination {
    static function getPageLimit() {
        return 5;  
    }
    
    static function getPageOffset() {}
    
    static function getPageIndex() {
         return isset($_GET['page_index']) ? $_GET['page_index'] : 1;
    }
    
    static function display() {
         $pageIndex = Pagination::getPageIndex();
         $nextPageIndex = $pageIndex + 1;
         $prevPageIndex = $pageIndex - 1;
    
         echo "<a class='pagination' href = '?page_index = $prevPageIndex'>Предишна</a>";
         echo "<a class='pagination' href = '?page_index = $nextPageIndex'>Следващаt</a>";
    }
    
}

