<?php 
require_once('services/connection.php');
	require_once('services/user.php');
	$con= mysqli_connect('localhost','root','','homebasket');		
	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$query = "SELECT * from users where email = '{$email}' and password = '{$password}'";
	//	echo $query;
	//	exit;
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
	//	echo $row["email"];
	//	exit;
		if($row["email"] ==""){
			echo "<script>alert('Email/Password is wrong!);</script>"; 
			header('location:index.php');
			exit;
		} else {
			
			$_SESSION['email']=$row["email"];
			
			echo $_SESSION['email'].$row["email"];
			//exit;
			header('location:index.php');
			//exit;
		}
	}
?>