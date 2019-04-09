
body {
 background-image: url("7.png");
}

<?php 
	//session_start();

	if(!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
	  echo header('location:mainLogin.php');
	} else header('location:category.php');
?>

