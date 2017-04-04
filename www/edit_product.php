<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

$stmt = $conn->prepare("SELECT * FROM book");

$stmt->execute();

for($i=0; $row= $stmt->fetch(); $i++){

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit product</title>
</head>
<body>

<form id="edit" action="editp.php" method="post" enctype="">

<input type="text" name="title" placeholder="book title" value="<?php echo $row['title']; ?>">
<input type="text" name="author" placeholder="Author" value="<?php echo $row['author']; ?>">
<input type="SELECT" name="category_id" placeholder="category_id" value="<?php echo $row['category_id'];  ?>">
<input type="text" name="price" placeholder="price" value="<?php echo $row['price'];  ?>">
<input type="text" name="year" placeholder="year" value="<?php echo $row['year_of_publication']; ?>">
<input type="text" name="isbn" placeholder="isbn" value="<?php echo $row['isbn']; ?>">
<input type="file" name="pic" value="<?php echo $row['filepath']; ?> ">
<input type="submit" name="submit" value="EDIT">


	
<?php } ?>



</form>

</body>
</html>
<?php include 'includes/footer2.php'; ?>
