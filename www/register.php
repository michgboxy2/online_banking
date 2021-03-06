<?php

	#title
	$page_title = "Register";

	# load db connection

	include 'includes/db.php';

	#load functions

	include 'includes/function.php';

	#include header
	
	include 'includes/header.php';
	#include 'styles/styles.css';

		$errors = [];
	if(array_key_exists('register', $_POST)){
		# cache errors
		

		#validate firstname
		if(empty($_POST['fname'])){
			$errors['fname'] = "please enter your first name</br>" ;

		}

		

		if(empty($_POST['lname'])){
			$errors['lname'] = "please enter your last name</br>";
		}

		if(empty($_POST['email'])){
			$errors['email'] = "please enter your email</br>";
		}

		if(doesEmailExist($conn, $_POST['email'])){
			$errors['email'] = "email already exists";
		}

		if(empty($_POST['password'])){
			$errors['password'] = "please enter your password</br>";
		}

		if($_POST['password'] != $_POST['pword']){
			$errors['pword'] = "passwords do not match</br>";
		} 


		if(empty($errors)){
			//do database stuff

			#eliminate unwanted spaces from values in the $_post array

			$clean = array_map('trim', $_POST);

			#register admin

			doAdminRegister($conn, $clean);
		
			
			
			
		}


	}
?>


<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div> <?php


					#if(isset($errors['fname'])) { echo '<span class="err">'.$errors['fname']. '</span>';}
					$display = displayErrors($errors,'fname');

					echo $display;

					?>

				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			
			<div><?php 
					if(isset($errors['lname'])) {echo '<span class="err">'.$errors['lname']. '</span';}

				  ?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div><?php if(isset($errors['email'])) {echo '<span class="err">'.$errors['email']. '</span>';}

					?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			
			<div><?php if(isset($errors['password'])) {echo '<span class="err">'.$errors['password']. '</span>';}

			?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div><?php if(isset($errors['pword'])){ echo '<span class="err">'.$errors['pword']. '</span>';}
			?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

	<?php

	include 'includes/footer.php';

	?>