

<?php 
	//session_start();

	if(!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
		echo '<form action="log.php" method="POST" >
		<div class="imgcontainer">
		<img src="logoo.png" alt="Avatar" class="avatar">
		</div>

		<div > 
    <a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
			<form  action="mysuperscript.php" autocomplete="on"> 
				<p> 
					<b><label for="User Name" class="username" data-icon="u" > user name &nbsp</label></b>
					<input id="username" name="username" required="required" type="text" placeholder="username@gmail.com"/>
				</p>
				<p> 
					<b><label for="Passwordassword" class="youpasswd" data-icon="p"> password &nbsp</label></b>
					<input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
				</p>
				<p class="keeplogin"> 
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
					<label for="loginkeeping">Keep me logged in</label>
				</p>
				<p class ="button">
				 <a href="home.html"  class ="submit">Login</a>
				 </p>

				<p class="change_link">
					Not a member yet ?
					<a href="reg.html" class="to_register"><b>Join us</b></a>
       			</p>
								
			</form>
		</div>
        </div>
	} else header('');
?>

