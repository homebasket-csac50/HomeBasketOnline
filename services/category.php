<?php 
    require_once('connection.php');

function insertCategory($categoryName) {
        $query = "INSERT INTO category set category_name = '{$categoryName}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function updateCategory($categoryId, $categoryName) {
        $query = "UPDATE category set category_name = '{$categoryName}' where category_id = '{$categoryId}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function fetchCategory() {
        
        $query = "SELECT * from category";
        $connect = new Connection();
        $result = $connect->runQuery($query);
        $connect->close_connection();
        return $result;
    }
?>