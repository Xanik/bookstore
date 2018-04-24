
<?php
         $page_title="ADMIN REGISTRATION PAGE";
	     session_start();
	     include "includes/db.php";
	     include "includes/functions.php";
	     include "includes/header.php";
	     

	     $error = [];

	     if (array_key_exists("register", $_POST)) {
	     	if (empty($_POST['fname'])) {
	     		$error['fname']="Please enter your firstname";
	     	}
	     	if (empty($_POST['lname'])) {
	     		$error['lname']="Please enter your lastname";
	     	}
	     	if (empty($_POST['email'])) {
	     		$error['email']="Please enter your email";
	     	}
	     	if (doesEmailexist($conn, $_POST['email'])) {
	     		$error['email']="Email already exist";
	     	}
	     	if (empty($_POST['password'])) {
	     		$error['password']="Please enter a password";
	     	}
	     	if (empty($_POST['pword'])) {
	     		$error['pword']="Please confirm your password";
	     	}
	     	if ($_POST['password'] !== $_POST['pword']) {
	     		$error['pword']="Password entered does not match confirmed password";
	     	}
	     	if (empty($error)) {
	     		$newArr= array_map('trim', $_POST);
	     		adminRegister($conn, $newArr);
	     		reDirect('adminlogin.php', "");
	     	}
	     }

	?>
	<div class="wrapper">
		<h1 id="register-label">Register</h1>
		<hr>
		<form id="register"  action ="adminregister.php" method ="POST">
			<div>
				<?php
				$showError = displayErrors($error, 'fname');
				echo $showError;
				?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<?php
				$showError = displayErrors($error, 'lname');
				echo $showError;
				?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<?php
				$showError = displayErrors($error, 'email');
				echo $showError;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
				$showError = displayErrors($error, 'password');
				echo $showError;
				?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<?php
				$showError = displayErrors($error, 'pword');
				echo $showError;
				?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="adminlogin.php">login</a></h4>
	</div>

	<?php

		include 'includes/footer.php';
	?>


	   
