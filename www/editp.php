<?php

include 'includes/db.php';

include 'includes/header.php';

include 'includes/function.php';


$stmt = $conn->prepare("UPDATE book SET title=:ti,author=:au,category_id=:id,price=:pr,year_of_publication=:yr, isbn=:is, filepath=:ti WHERE book_id=:b");

$data = [

":ti" => $_POST['title'],
":au" => $_POST['author'],
":id" => $_POST['category_id'],
":pr" => $_POST['price'],
":yr" => $_POST['year'],
":is" => $_POST['isbn'],
":ti" => $_POST['pic'],
":b"  => $_POST['book_id'],


];

$stmt->execute($data);




$success = "product edited";
header("location:view_product.php?success=$success");

?>




