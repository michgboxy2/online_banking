<?php

include 'includes/db.php';

include 'includes/cat_header.php';

include 'includes/function.php';

$title = $_POST['title'];
$author = $_POST['author'];
$id = $_POST['category_id'];
$price = $_POST['price'];
$yr = $_POST['year'];
$is = $_POST['isbn'];
$pic = $_POST['pic'];

$stmt = $conn->("UPDATE book SET title, author, category_id, price, year_of_publication, isbn, filepath=:ti, :au, :id, :pr, :yr, :is, :pic WHERE book_id = :b");

$data = [

":ti" => $_POST['title'],
":au" => $_POST['author'],
":id" => $_POST['category_id'],
":pr" => $_POST['price'],
":yr" => $_POST['year'],
":is" => $_POST['isbn'],
":pic" => $destination,

];

$stmt->execute($data);
$success = "product edited";
header("location:view_product.php?success=$success");



?>




