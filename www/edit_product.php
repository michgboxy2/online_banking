<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';


/*if(array_key_exists('submit', $_POST)){

$clean = array_map('trim', $_POST);

$stmt = $conn->prepare("UPDATE book SET title=:ti,author=:au,category_id=:id,price=:pr,year_of_publication=:yr,isbn=:is,filepath=:ti WHERE book_id=:b");

if(isset($_GET['bid'])){

	$bid = $_GET['bid'];

}


$data = [

":ti" => $clean['title'],
":au" => $clean['author'],
":id" => $clean['category_id'],
":pr" => $clean['price'],
":yr" => $clean['year'],
":is" => $clean['isbn'],
":ti" => $clean['pic'],
":b"  => $bid,

];

$stmt->execute($data);




}

*/


if(isset($_GET['book_id'])){

	$bid = $_GET['book_id'];

}

$stmt = $conn->prepare("SELECT * FROM book WHERE book_id=:bi");
$stmt->bindparam(":bi", $bid);

$stmt->execute();

for($i=0; $row= $stmt->fetch(); $i++){
	$title = $row['title'];
	$author = $row['author'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit product</title>
</head>
<body>

<form id="edit" action="editp.php" method="post">

<input type="text" name="title" placeholder="book title" value="<?php echo $title; ?>">
<input type="text" name="author" placeholder="Author" value="<?php echo $row['author']; ?>">
<input type="SELECT" name="category_id" placeholder="category_id" value="<?php echo $row['category_id'];  ?>">
<input type="text" name="price" placeholder="price" value="<?php echo $row['price'];  ?>">
<input type="text" name="year" placeholder="year" value="<?php echo $row['year_of_publication']; ?>">
<input type="text" name="isbn" placeholder="isbn" value="<?php echo $row['isbn']; ?>">
<input type="file" name="pic" value="<?php echo $row['filepath']; ?> ">
<input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>"> 
<input type="submit" name="submit" value="EDIT">



	
<?php } ?>



</form>

</body>
</html>


<?php include 'includes/footer2.php'; ?>
