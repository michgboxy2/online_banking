<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

<<<<<<< HEAD
if(isset($_GET['cid'])){
	$cid = $_GET['cid'];
}

$stmt = $conn->prepare("DELETE FROM categories WHERE category_id=:id");

$stmt->bindparam(":id", $cid);
$stmt->execute();


$success = "delete successful";
=======

$id = $_GET['category_id'];

$stmt = $conn->prepare("DELETE FROM categories WHERE category_id = :id");
$stmt->bindparam(":id", $_POST['cat_id']);
$stmt->execute();
>>>>>>> add
header("location:view_category.php"); 

?>