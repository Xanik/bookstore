<?php
     
     session_start();

     $page_title="ADD CATEGORY PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

     authentication($_SESSION);

     if (array_key_exists("add_category", $_POST)) {
     	
     	if (empty($_POST['category_name'])) {
     		
     		$error['category_name'] = "Please enter a category name";
     	}
     	if (empty($error)) {
     		
        $input = array_map('trim', $_POST);

        addCategory($conn, $input);

        reDirect("add_category.php", '?Category successfully added');
     	}
     }

?>
	<div class="wrapper">
   		<h1 id="register-label">Add Category</h1>
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