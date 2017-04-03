<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';


$id = $_GET['category_id'];

$stmt = $conn->prepare("DELETE FROM categories WHERE category_id = :id");
$stmt->bindparam(":id", $_POST['cat_id']);
$stmt->execute();
header("location:view_category.php"); 

?>