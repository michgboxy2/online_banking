<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

	$stmt = $conn->prepare("SELECT * FROM categories WHERE category_name = :ca");

	#bind params

	$stmt->bindparam(":ca", $_POST['category_name']);

	$stmt->execute();

	?>

	<form id="view" action="view_category.php" method="post">

	<?php 

	while($result = $stmt->fetch(PDO::FETCH_ASSOC));{ ?>


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
					<tr>
						<td><?php echo $result['category_id']; ?></td>
						<td><?php echo $result['category_name']; ?></td>
						
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody>
			</table>
		</div>









		<?php }?>

		



















	</table>
		












	</form>

