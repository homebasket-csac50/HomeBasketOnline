<?php 
    require_once('connection.php');

    function insertProducts($categoryId, $productName, $quantity, $price) {
        $query = "INSERT INTO product_details set category_id = '{$categoryId}', product_name = '{$productName}', quantity = '{$quantity}', price = '{$price}'";
		$connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function updateProduct($productId, $productName, $status, $quantity, $price) {
        $query = "UPDATE product_details set product_name = '{$productName}', status = '{$status}', price = '{$price}', quantity = '{$quantity}' where product_id = '{$productId}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    
    function fetchProducts($productId) {
        $placeholder = '';

        if($categoryId) {
            $placeholder = " where product_id = '{$categoryId}'";
        }
        $sql = "SELECT * from products" . $placeholder;
        $connect = new Connection();
        $result = $connect->runQuery($query);
        $connect->close_connection();
        return $result;
    }

    function fetchProductsWithCategory($productId) {
        $placeholder = '';

        if($categoryId) {
            $placeholder = " where product_id = '{$categoryId}'";
        }
        $sql = " " . $placeholder;
        $connect = new Connection();
        $result = $connect->runQuery($query);
        $connect->close_connection();
        return $result;
    }
?>