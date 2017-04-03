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
						<th>categoty name</th>
						
					</tr>
				</thead>
				<tbody>
	<?php 
	for ($i=0; $result = $stmt->fetch(); $i++) { 
		# code...
	

	#while($result = $stmt->fetchall());{ ?>


	
					<tr>
						<td><?php echo $result['category_id']; ?></td>
						<td><?php echo $result['category_name']; ?></td>
						
						<td><a href="editform.php">edit</a></td>
						<td><a href="delete.php">delete</a></td>
					</tr>

					<?php }?>
          		</tbody>
			</table>
		</div>









		

		



















	</table>
		












	</form>

