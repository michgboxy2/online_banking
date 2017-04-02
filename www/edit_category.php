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



}


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