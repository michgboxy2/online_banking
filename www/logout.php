<?php

session_start();
	
	include('includes/db.php');

	unset($_SESSION['id']);
	unset($_SESSION['email']);
	header('Location:login.php');





?>