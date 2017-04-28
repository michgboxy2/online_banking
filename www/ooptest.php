<?php

	include 'Product.php';
	include 'book.php';
	include 'Dvd.php';

	/*$product = new Product();
	$product->setTitle("book"); */

	#$prod = new Product("jangbalajugbun", 200,"book");

	#$price = $prod->getPrice();

	#echo $price;

	#echo "</br>";

	#$title = $prod->getTitle();

	#echo $title;

	#echo "</br>";

	#$type = $prod->getType();

	#echo $type;

	#echo "</br>";

	#$b = new Book("things fall apart", 500, "book");

	#$price = $b->getPrice();

	#echo $price;

	echo "</br>";

	$book = new Book("300", "Tina on 2g0", 500, "book");

	$pageCount = $book->getpageCount();

	echo $pageCount;

	echo "</br>";


	$title = $book->getTitle();

	echo $title;

	echo "</br>";

	$dvd = new Dvd("1hr30mins", "ilu awon aje", 250);

	$duration = $dvd->getDuration();

	echo $duration;

	$book->preview();


