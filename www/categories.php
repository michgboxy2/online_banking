<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

?>

<?php

$error = [];


if(array_key_exists('add', $_POST)){

	
	if(empty($_POST['category'])){

		$error['category'] = "please enter a category name";
	}


	if(empty($error)){

		$clean = array_map('trim',$_POST);

		addcategory($conn, $clean);

}

}




?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD CATEGORIES</title>
			



</head>
<body>

</section>
	<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>category id</th>
						<th>categoty name</th>
						<th>date created</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>the knowledge gap</td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody>
			</table>
		</div>




<form id="add" action="categories.php" method="post" >
	


			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2> ADD CATEGORY</h2></br>
			</br>
			
<?php displayErrors($error,'category'); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="category" placeholder="category name">
<input type="submit" name="add" value="submit">





</form>

</body>
</html>


<?php

include 'includes/footer2.php';

?>