<?php 
    require_once('connection.php');

function insertCategory($categoryName) {
        $query = "INSERT INTO category set category_name = '{$categoryName}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function updateCategory($categoryId, $categoryName, $status) {
        $query = "UPDATE category set category_name = '{$categoryName}', status = '{$status}' where category_id = '{$categoryId}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }


    function fetchCategory() {
        
        $query = "SELECT * from category where status = 1";
        $connect = new Connection();
        $result = $connect->runQuery($query);
        $connect->close_connection();
        return $result;
    }
?>