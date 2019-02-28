<?php 
    require_once('connection.php');

    function insertUser($email, $password, $firstName, $lastName) {
        $query = "INSERT INTO users SET first_name = '{$firstName}', last_name = '{$lastName}', email = '{$email}', password = '{$password}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function updateUser($email, $firstName, $lastName) {
        $query = "UPDATE users SET first_name = '{$firstName}', last_name = '{$lastName}' where email = '{$email}'";
        $connect = new Connection();
        $connect->runQuery($query);
        $connect->close_connection();
        return 1;
    }

    function fetchUser($email) {

        $query = "SELECT * from users where email = '{$email}'";
       // echo $query;
		$connect = new Connection();
        $result = $connect->runQuery($query);
        $connect->close_connection();
        return $result;
    }
?>