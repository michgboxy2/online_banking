<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';


$cat_name = $_POST['cat_name'];
$id = $_POST['cat_id'];

//query

#$sql = "UPDATE categories SET category_name=?, category_id=? WHERE category_id=?";
$stmt = $conn->prepare("UPDATE categories SET category_name = :ca WHERE category_id= :i");
$stmt->bindparam(":ca", $_POST['cat_name']);
$stmt->bindparam(":i", $_POST['cat_id']);
$stmt->execute();
header("location:view_category.php");

?>