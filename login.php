
body {
 background-image: url("7.png");
}

<?php 
	//session_start();

	if(!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
		echo <body>'<form action="log.php" method="POST" >
		<div class="imgcontainer">
		
		</div>

		<div class="container">
		<label for="uname"><b>Email</b></label>
		<input type="email" name="email" placeholder="email" name="email" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" name="password" id="password" placeholder="Enter Password" required>

		<button type="submit" name="submit">Login</button>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</label>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		<button type="button" class="cancelbtn">Cancel</button>
		<span class="psw">Forgot <a href="#">password?</a></span>
		</div>
	  </form></body>';
	} else header('location:category.php');
?>

