<?php

	function doAdminRegister($dbconn, $input){

		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		#insert data
		$stmt = $dbconn->prepare("INSERT INTO admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

		#bind params...
		$data = [

			':fn' => $input['fname'],
			':ln' => $input['lname'],
			':e' => $input['email'],
			':h' => $hash

		];

		$stmt-> execute($data);

	}

	function doesEmailExist($dbconn, $email) {
		$result = false;

		$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email =:e");

		# bind params

		$stmt->bindparam(":e", $email);
		$stmt->execute();

		#get number of rows returned
		$count = $stmt->rowCount();

		if($count > 0) {
			$result = true;
		}

		return $result;





	}

	function displayErrors($inp){

		if(isset($inp['fname'])) { echo '<span class="err">'.$inp['fname']. '</span>';}

		if(isset($inp['lname'])) {echo '<span class="err">'.$inp['lname']. '</span';}

		if(isset($inp['email'])) {echo '<span class="err">'.$inp['email']. '</span>';}

		if(isset($inp['password'])) {echo '<span class="err">'.$inp['password']. '</span>';}

		if(isset($inp['pword'])){ echo '<span class="err">'.$inp['pword']. '</span>';}

	}


	function fileupload($in){

		$ext = ["image/jpg", "image/jpeg", "image/png"];

		if(!in_array($in['pic']['type'], $ext)){
			$errors[] = "invalid file type";
		}

		#generate random number to append
		$rnd = rand(0000000000, 9999999999);

		# strip filename for spaces
		$strip_name = str_replace(" ", "_", $in['pic']['name']);

		$filename = $rnd.$strip_name;
		$destination = 'uploads/'.$filename;

		if(!move_uploaded_file($in['pic']['tmp_name'], $destination)) {
			
			$errors[] = "file upload failed";

		}


		function adminLogin($dconn, $log){


			$log = array_map('trim', $_POST);

		$hash = password_hash($log['password'], PASSWORD_BCRYPT);

		#pull data

		$stmt = $dconn->prepare("SELECT * FROM admin WHERE email = :e AND hash = :h ");
		$success = "login successful";
		header("location:home.php?success=$success");

		#bind params

		$data = [
		':e' => $log['email'],
		':h' => $hash

		];

		$stmt->execute($data); 






		}







	}

	?>

	
