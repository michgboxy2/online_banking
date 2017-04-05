<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

if(isset($_GET['cid'])){
	$cid = $_GET['cid'];
}

$stmt = $conn->prepare("DELETE FROM categories WHERE category_id=:id");

$stmt->bindparam(":id", $cid);
$stmt->execute();


$success = "delete successful";
header("location:view_category.php"); 

?>