<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

if(isset($_GET['pid'])){

	$pid = $_GET['pid'];

}

$stmt = $conn->prepare("DELETE FROM book WHERE book_id=:bk");
$stmt->bindparam(":bk", $pid);
$stmt->execute();

$success = "product successfully deleted";
header("location:view_product.php?success=$success");





?>