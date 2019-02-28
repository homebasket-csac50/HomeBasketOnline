<?php
    require_once('headers.php');
?>
<?php 
	//session_start();
	if(!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
		echo '<form action="log.php" method="POST">
		<div class="imgcontainer">
		<img src="img_avatar2.png" alt="Avatar" class="avatar">
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
	  </form>';
	} else header('location:category.php');
?>

<?php 
    require_once('footer.php');
?>