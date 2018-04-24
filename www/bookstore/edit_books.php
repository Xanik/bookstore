<?php
     
     session_start();

     $page_title="ADD BOOKS PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

     $book_id = $_GET['book_id'];


     $book_detail = getBookdetail($conn, $book_id);

     authentication($_SESSION);


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
     	if (empty($error)) {

     		$input = array_map('trim', $_POST);

     		$input['book_id'] = $book_id;

     		updateBooks($conn, $input);

     		reDirect("view_books.php", '?Successfully Updated');


     	}
     }
?>
<div class="wrapper">
			<h1 id="register-label">ADD BOOKS</h1>
			<hr>
			<form id="register"  action ="edit_books.php" method ="POST" enctype="">
				<div>
					<?php
					$showError = displayErrors($error, 'title');

					echo $showError;
					?>
					<label>Title:</label>
					<input type="text" name="title" value="<?php echo $book_detail['title']; ?>">
				</div>
				<div>
					<?php
					$showError = displayErrors($error, 'author');

					echo $showError;
					?>
					<label>Author:</label>	
					<input type="text" name="author" value="<?php echo $book_detail['author']?>">
				</div>

				<div>
					<?php
					$showError = displayErrors($error, 'price');

					echo $showError;
					?>
					<label>Price:</label>
					<input type="text" name="price" value="<?php echo $book_detail['price']?>">
				</div>
				<div>
					<?php
					$showError = displayErrors($error, 'year');

					echo $showError;
					?>
					<label>Year:</label>
					<input type="date" name="year" value="<?php echo $book_detail['year']?>">
				</div>
	 
				<div>
					<?php
					$showError = displayErrors($error, 'category_name');

					echo $showError;
					?>
					<label>Category name:</label>	
					<select name="category_name">
					<?php 
						$catName = getCategoryById($conn, $book_detail['category_name']);
					?>
				<option value="<?php echo $catName[0]; ?>">
					<?php echo $catName['category_name'];  ?>
				</option>
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

						<?php
							
							echo '<option value="'.$book_detail['flag'].'">'.$book_detail['flag'].'</option><br/>';

						?>
					
				    </select>
				</div>

				<input type="submit" name="register" value="UPDATE">
			</form>

			<h4 class="jumpto"><a href="edit_image.php?book_id=$book_id">Click here to edit book image</a></h4>
		</div>
<?php
    
    include 'includes/footer.php';
    
?>