<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>EDIT CATEGORY</title>
</head>
<body>

<?php
if(array_key_exists('edit', $_POST)){

	$error = [];
if(empty($_POST['edit'])){

	$error['edit'] = "please input an edit";

}

	if(empty($error)){

		$stmt = $conn->prepare("SELECT * FROM categories WHERE category_id = :id");

		#bind params
		$stmt->bindparam(":id", $result['category_id']);
		$stmt->execute();
		for($i=0; $result = $stmt->fetch(); $i++){
			":id" = $result['category_id'];
		}

		#$clean = array_map('trim', $_POST);

	}


}


?>

<?php

include 'includes/db.php';

?>

<form id="edit" action="view_category.php" method="post">


</section>
	<div class="wrapper">
		<div id="stream">



<!-- <label>EDIT</label> -->
<input type="text" name="edit" placeholder="edit">
<input type="submit" name="edit" value="EDIT">
	



</form>



</body>
</html>