<?php
session_start();

#title

$page_title = "login";

include 'includes/db.php';

include 'includes/function.php';

include 'includes/header.php';

	
	$error = [];

	if(array_key_exists('register', $_POST)){

		
	if(empty($_POST['email'])){

		$error['email'] = "please enter email"; 
	}

	if(empty($_POST['password'])){

		$error['password'] = "please enter password"; 

	}

		if(empty($error)){

		

		$clean = array_map('trim', $_POST);

		adminLogin($conn, $clean);

		

	}

}

?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div><?php #if(isset($error['email'])){echo '<span class="err">'.$error['email']. '</span>';}
					$display = displayErrors($error,'email');

					echo $display;
			  ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div><?php #if(isset($error['password'])){echo '<span class="err">'.$error['password']. '</span>';} 
					$display = displayErrors($error,'password');

					echo $display;

			 ?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="register" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

	<?php

	include 'includes/footer.php';

	?>