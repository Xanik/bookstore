<?php
     
     session_start();

     $page_title="ADD BOOKS PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

     $bookId = $_GET['book_id'];

     authentication($_SESSION);

     $ext = ['image/jpeg', 'image/png', 'image/jpg'];

     define("MAX_FILE_SIZE", 2097152);

     $flag = ['Trending', 'Recently Viewed', 'Top-Selling'];

     if (array_key_exists('register', $_POST)) {
     	
     	if (empty($_FILES['img']['name'])) {
     		
     		$error['img'] = 'Please enter the books cover';
     	}
     	if ($_FILES['img']['size'] > MAX_FILE_SIZE) {
     		
     		$error['img'] = "File size exceeds Maximum size limit";
     	}
     	if(!in_array($_FILES['img']['type'], $ext)) {
			$errors['img'] = "File format not supported";
		}
     	if (empty($error)) {

     		$info = uploadFiles($_FILES, 'img', 'uploads/');

     		$location = "";

     		if ($info[0]) {

     			$location = $info[1];

     		}

     		$input = array_map('trim', $_POST);

     		$input['location'] = $location;

     		$input['book_id'] = $bookId;

     		editImage($conn, $input);

     		reDirect('view_books.php', "?IMAGE UPDATED SUCCESSFULLY");

     	}
     }

?>
	<div class="wrapper">
			<h1 id="register-label">EDIT IMAGES</h1>
			<hr>
			<form id="register"  action ="" method ="POST" enctype="multipart/form-data">

				<div>
					<?php
					$showError = displayErrors($error, 'img');

					echo $showError;
					?>
					<label>Book image:</label>	
					<input type="file" name="img" placeholder="ADD IMAGE">
				</div>

				<input type="submit" name="register" value="UPDATE">
			</form>

			<h4 class="jumpto">Have an account? <a href="adminlogin.php">login</a></h4>
		</div>
<?php
    
    include 'includes/footer.php';
    
?>