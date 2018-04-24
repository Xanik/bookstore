<?php
         $page_title="ADMIN LOGIN PAGE";
	     session_start();
	     include "includes/db.php";
	     include "includes/functions.php";
	     include "includes/header.php";
	     

	     $error = [];

	     if (array_key_exists("register", $_POST)) {

	     	if (empty($_POST['email'])) {

	     		$error['email']="Please enter your email address";

	     	}
	     	if (empty($_POST['password'])) {

	     		$error['password']="Please enter your password";
	     		
	     	}
	     	if (empty($error)) {

	     		$newArr = array_map("trim", $_POST);

	     		$response = doAdminlogin($conn, $newArr);

	     		if ($response[0]) {

	     			$admin = $response[1];

	     			redirect("add_category.php", "");

	     			$_SESSION['email']=$admin['email'];

	     			$_SESSION['id']=$admin['admin_id'];

	     		}else{
	     			$error['email'] = "Invalid Login Details";
	     		}
	     		
	     	}
	     }
?>

	<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="adminlogin.php" method ="POST">
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

			<input type="submit" name="register" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="adminregister.php">register</a></h4>
	</div>

<?php
   
   include "includes/footer.php";

?>