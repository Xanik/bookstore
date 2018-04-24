<?php
     
     session_start();

     $page_title="ADD BOOKS PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

     authentication($_SESSION);

     $ext = ['image/jpeg', 'image/png', 'image/jpg'];

     define("MAX_FILE_SIZE", 2097152);

     $flag = ['Trending', 'Recently Viewed', 'Top-Selling'];

     if (array_key_exists('register', $_POST)) {
     	
     	if (empty($_POST['title'])) {
     		
     		$error['title'] = 'Please enter the books title';
     	}
     	if (empty($_POST['author'])) {
     		
     		$error['author'] = 'Please enter the books author';
     	}
     	if (empty($_POST['price'])) {
     		
     		$error['price'] = 'Please enter the books price';
     	}
     	if (empty($_POST['year'])) {
     		
     		$error['year'] = 'Please select the books year of publication year';
     	}
     	if (empty($_POST['category_name'])) {
     		
     		$error['category_name'] = 'Please enter the books Category name';
     	}
     	if (empty($_POST['flag'])) {
     		
     		$error['flag'] = 'Please select the books flag list';
     	}
     	if (empty($_FILES['img']['name'])) {
     		
     		$error['img'] = 'Please enter the books cover';
     	}
     	if ($_FILES['img']['size'] > MAX_FILE_SIZE) {
     		
     		$error['img'] = "File size exceeds Maximum size limit";
     	}
     	if (!in_array($_FILES['img']['type'], $ext)) {
     		
     		$error['img'] = "File format not supported";
     	}
     	if (empty($error)) {

     		$info = uploadFiles($_FILES, 'img', 'uploads/');

     		$location = "";

     		if ($info[0]) {

     			$location = $info[1];

     		}

     		$input = array_map('trim', $_POST);

     		$input['location'] = $location;

     		addBooks($conn, $input);

     		reDirect('view_books.php', "");

     	}
     }

?>
	<div class="wrapper">
			<h1 id="register-label">ADD BOOKS</h1>
			<hr>
			<form id="register"  action ="add_books.php" method ="POST" enctype="multipart/form-data">
				<div>
					<?php
					$showError = displayErrors($error, 'title');

					echo $showError;
					?>
					<label>Title:</label>
					<input type="text" name="title" placeholder="Title">
				</div>
				<div>
					<?php
					$showError = displayErrors($error, 'author');

					echo $showError;
					?>
					<label>Author:</label>	
					<input type="text" name="author" placeholder="Author">
				</div>

				<div>
					<?php
					$showError = displayErrors($error, 'price');

					echo $showError;
					?>
					<label>Price:</label>
					<input type="text" name="price" placeholder="Price">
				</div>
				<div>
					<?php
					$showError = displayErrors($error, 'year');

					echo $showError;
					?>
					<label>Year:</label>
					<input type="date" name="year" placeholder="Year">
				</div>
	 
				<div>
					<?php
					$showError = displayErrors($error, 'category_name');

					echo $showError;
					?>
					<label>Category name:</label>	
					<select name="category_name">
						<option value="">Select Category</option>
					<?php
						$data = fetchCategories($conn);
						echo $data;
					?>
				    </select>
				</div>

				<div>
					<?php
					$showError = displayErrors($error, 'flag');

					echo $showError;
					?>
					<label>Flag:</label>	
					<select name="flag">
						<option value="">Select Category</option>

						<?php

						foreach ($flag as $fl) {
							
							echo '<option value="'.$fl.'">'.$fl.'</option><br/>';

						}

						?>
					
				    </select>
				</div>

				<div>
					<?php
					$showError = displayErrors($error, 'img');

					echo $showError;
					?>
					<label>Book image:</label>	
					<input type="file" name="img" placeholder="ADD IMAGE">
				</div>

				<input type="submit" name="register" value="ADD">
			</form>

			<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
		</div>
<?php
    
    include 'includes/footer.php';
    
?>