<?php
     
     session_start();

     $page_title="ADD CATEGORY PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

     authentication($_SESSION);

?>
		<div class="wrapper">
				<div id="stream">
					<table id="tab">
						<thead>
							<tr>
								<th>Category Name</th>
								<th>date created</th>
								<th>edit</th>
								<th>delete</th>
							</tr>
						</thead>
						<tbody>
							<?php

							   viewCategory($conn);

							?>
		          		</tbody>
					</table>
				</div>
			</div>

<?php
    
    include 'includes/footer.php';
    
?>