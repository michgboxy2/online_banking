<?php

include 'includes/db.php';

include 'includes/bookhead.php';

include 'includes/function.php';

$stmt = $conn->prepare("SELECT * FROM book");
$stmt->execute();

?>

<form id="view" action="view_product.php" method="post">


	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>BOOK ID</th>
						<th>Title</th>
						<th>AUTHOR</th>
						<th>category_id</th>
						<th>price</th>
						<th>year</th>
						<th>isbn</th>
						<th>image</th>
						<th>edit</th>
						<th>delete</th>
								
					</tr>
				</thead>
				<tbody>
<?php     

		$hold = viewproduct($conn);

		echo $hold;

?>





						<td><a href="edit_product.php">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
					
          		</tbody>
			</table>
		</div>

		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>

	













</table>



</form>