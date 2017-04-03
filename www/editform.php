<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

#$id = $row['category_id'];

$stmt = $conn->prepare("SELECT * FROM categories ");

$stmt->bindparam(':id', $id);
$stmt->execute();
for($i=0; $row = $stmt->fetch(); $i++){

?>




<!DOCTYPE html>
<html>
<head>
	<title>add category</title>
</head>
<body>
<form id="add" action="edit.php" method="post">

<input type="text" name="cat_name" placeholder="category name" value="<?php echo $row['category_name']; ?>"/>
<input type="hidden" name="cat_id" value="<?php echo $row['category_id']; ?>"/>
<input type="submit" name="submit" value="EDIT">


</form>
<?php } ?>
</body>
</html>

<?php

include 'includes/footer2.php';

?>

