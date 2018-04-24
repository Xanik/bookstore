<?php
     
     session_start();

     $page_title="EDIT CATEGORY PAGE";

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
							<th>BOOK TITLE</th>
							<th>BOOK AUTHOR</th>
							<th>PRICE</th>
							<th>YEAR OF PUBLICATION</th>
							<th>CATEGORY NAME</th>
							<th>FLAG</th>
							<th>BOOK IMAGE</th>
							<th>edit</th>
							<th>delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						viewBooks($conn);
						?>
	          		</tbody>
				</table>
			</div>
		</div>



<?php

     include 'includes/footer.php';

?>