<?php

	#title
	$page_title = "Register USERs";

	# load db connection

	include 'includes/db.php';

	#load functions

	include 'includes/function.php';

	#include header
	
	include 'includes/header.php';
	#include 'styles/styles.css';

		$errors = [];
	if(array_key_exists('submit', $_POST)){
	

	if(empty($_POST['fname'])){

			$errors['fname'] = "please enter your firstname";
		}

	
	if(empty($_POST['lname'])){

			$errors['lname'] = "please enter last name";
	}


	if(empty($_POST['email'])){

			$errors['email'] = "please enter email";
	}

	if(doesUserEmailExist($conn, $_POST['email'])){

			$errors['email'] = "email already exists";
		}

	if(empty($_POST['username'])){

			$errors['username'] = "please enter your username";
	}

	if(empty($_POST['password'])){

			$errors['password'] = "please enter password";
	}

	if($_POST['password'] != $_POST['pword']){

			$errors['pword'] = "password doesnt match, please try again";
	}

	if(empty($errors)){

		$clean = array_map('trim', $_POST);

		userRegister($conn, $clean);

	}

	foreach($errors as $errors){

		echo "<p>".$errors."</p>";
	}



}








?>


<div class="wrapper">
		<form id="register" action="add_user.php" method="post">

		<?php displayErrors($errors,'fname');    ?>
		<label>FIRST NAME</label>
		<input type="text" name="fname" placeholder="first name"></br>
		</br>
		</br>


		<div>
		<?php displayErrors($errors,'lname');    ?>
		<label>LAST NAME</label>
		<input type="text" name="lname" placeholder="last name"></br>
		</div>
		</br>
		</br>
		
		<?php displayErrors($errors,'email');    ?>
		<label>Email</label>
		<input type="text" name="email" placeholder="email address"></br>
		</br>
		</br>

		<?php if(isset($errors['username'])){ echo '<span class="$err">'.$errors['username']. '</span>'; } ?>
		<label>Username</label>
		<input type="text" name="username" placeholder="username"></br>
		</br>
		</br>

		<label>Password</label>
		<input type="password" name="password" placeholder="password"></br>
		</br>
		</br>

		<label>confirm password</label>
		<input type="password" name="pword" placeholder="confirm password"></br>
		</br>
		</br>

		<input type="submit" name="submit" value="signup"></br>
			

















		</form>