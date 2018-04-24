<?php
     
     session_start();

     $page_title="EDIT CATEGORY PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];
     
     authentication($_SESSION);


     if (array_key_exists("add_category", $_POST)) {
     	
     	if (empty($_POST['category_name'])) {
     		
     		$error['category_name'] = 'Please enter the new category name';
     	}

     	if (empty($error)) {
     		
     		$input = [];

     		$input["old_category"] = $_GET['category_id'];

     		$input['new_category'] = $_POST['category_name'];

     		editCategory($conn, $input);

     		reDirect("view_category.php", '?Category successfully updated');
     	}
     }
?>
		<div class="wrapper">
		   		<h1 id="register-label">Update Category</h1>
		   		<hr>
		   		<form id="register"  method="post">
		   			<div>
		             <?php  $showError = displayErrors($error, 'category_name'); echo $showError;  ?>
		   				<label>Category Name:</label>
		   				<input type="text" name="category_name" placeholder="Category name">
		   			</div>
		   			<input type="submit" name="add_category" value="add">
		   		</form>

		   	</div>
		  	</div>
<?php
    
    include 'includes/footer.php';
    
?>