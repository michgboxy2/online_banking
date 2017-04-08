<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

	$stmt = $conn->prepare("SELECT category_id, category_name FROM categories");

	

	#bind params

	$stmt->bindparam(":ca", $clean['category_name']);

	$stmt->execute();

	?>

	<form id="view" action="view_category.php" method="post">

</section>
	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>category id</th>
						<th>category name</th>
						
					</tr>
					<?php    


	$show = viewcategory($conn);

	echo $show;

	?>
				</thead>
				<tbody>
	
	
						
<<<<<<< HEAD
						<td><a href="editform.php?cam=<?php echo $result['category_name']; ?>">edit</a></td>
						<td><a href="delete.php?cid=<?php echo $result['category_id']; ?>">delete</a></td>
=======
						<td><a href="editform.php">edit</a></td>
						<td><a href="#">delete</a></td>
>>>>>>> add
					</tr>

					
          		</tbody>
          		
		</table>
		</div>









		

		



















	</table>
		












	</form>



