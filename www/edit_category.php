<?php

session_start();

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

?>



<?php

	$error = [];


if(array_key_exists('submit', $_POST)){

	if(empty($_POST['edit'])){

	$error['edit'] = "please input a category_name";

}

	if(empty($error)){

		$clean = array_map('trim', $_POST);


		$stmt = $conn->prepare("UPDATE categories SET category_name = :ca");

		#bind params
		$stmt->bindparam(":id", $result['category_id']);
		$data = [

		':ca' => $clean('name'),
		':id' => $clean('category_id'),

		];
		$stmt->execute($data);
		for($i=0; $result = $stmt->fetch(); $i++){
			
			$id=$result['category_id'];
		

		
	}
	

}


?>

<?php } ?>

<!DOCTYPE html>
<html>
<head>
	<title>EDIT CATEGORY</title>
</head>
<body>




<form id="edit" action="view_category.php" method="post">


</section>
	<div class="wrapper">
		<div id="stream">



<!-- <label>EDIT</label> -->
<input type="text" name="edit" placeholder="edit">
<input type="submit" name="submit" value="EDIT">
	



</form>

</body>
</html>

<?php   


 $get_id = $_REQUEST['category_id'];

$name =$_POST['edit'];

$stmt = $conn->prepare("UPDATE categories SET category_name = '$name' WHERE category_id = '$get_id' ");

$stmt->execute();
  

?>
