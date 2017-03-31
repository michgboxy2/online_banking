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

	function displayErrors($dummy, $what){
					$result = "";
		
				if(isset($dummy[$what])) {

				$result = '<span class="err">'.$dummy[$what]. '</span>';}
	
					return $result;
}


	function fileupload($in, $amp, $tom){

		define("MAX_FILE_SIZE", "2097152");


		$ext = ["image/jpg", "image/jpeg", "image/png"];


		# be sure if a file was selected
		#if(empty($in['pic']['name'])) {
			$amp[$tom] = "please choose a file";
		#}

		#check file size
		if($in[$tom]['size'] > MAX_FILE_SIZE) {
			$amp[$tom] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
		}

		if(!in_array($in[$tom]['type'], $ext)){
			$amp[$tom] = "invalid file type";
		}

		#generate random number to append
		$rnd = rand(0000000000, 9999999999);

		# strip filename for spaces
		$strip_name = str_replace(" ", "_", $in[$tom]['name']);

		$filename = $rnd.$strip_name;
		$destination = 'uploads/'.$filename;

		if(!move_uploaded_file($in[$tom]['tmp_name'], $destination)) {
			
			$amp[$tom] = "file upload failed";
		}

		/*if(empty($amp)){
			echo "done";
		} else {
			foreach ($amp as $err){
				echo $err. '</br>';
			}
		}*/
}

		function adminLogin($dbconn, $enter){

		#pull data

		$statement = $dbconn->prepare("SELECT * FROM admin WHERE email = :em");
		
				#bind params
		$statement->bindparam(":em", $enter['email']);
		$statement->execute();

		$count = $statement->rowcount();

		if($count == 1) {
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if(password_verify($enter['password'], $row['hash'])){

				$_SESSION['id'] = $row['admin_id'];
				$_SESSION['email'] = $row['email'];
				header("location:home.php");
			} else {
				$login_error = "wrong email or password";
				header("location:login.php?login_error=$login_error");
			}
		
		
		}

	}

	?>

	
