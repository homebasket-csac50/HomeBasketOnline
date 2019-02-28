<?php
    require_once('services/user.php');
	echo "hello";
	$con= mysqli_connect('localhost','root','','homebasket');
	if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = md5($_POST['password']);
        $rpassword = md5($_POST['r-password']);

        if($rpassword !== $password) {
            echo "<script>alert('Password Does not match!');</script>";
            exit;
        }
		$query = "SELECT * from users where email = '{$email}'";
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
	
		if($row["email"] == $email){
			echo "already Used email"; 
			exit;
        } else {
        
			$result = insertUser($email, $password, $first_name, $last_name);

			if($result) {
				$_SESSION['email'] = $email;
				header('location:index.php');
				exit; 
			}
		}

	}
?>