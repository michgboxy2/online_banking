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

				
						#check file size
		if($in[$tom]['size'] > MAX_FILE_SIZE) {
			$amp[$tom] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
		}

		/*if(!in_array($in[$tom]['type'], $ext)){
			$amp[$tom] = "invalid file type";
		}*/

		#generate random number to append
		$rnd = rand(0000000000, 9999999999);

		# strip filename for spaces
		$strip_name = str_replace(" ", "_", $in[$tom]['name']);

		$filename = $rnd.$strip_name;
		$destination = 'uploads/'.$filename;

		if(!move_uploaded_file($in[$tom]['tmp_name'], $destination)) {
			
			$amp[$tom] = "file upload failed";
		}

		}

		function adminLogin($dbconn, $enter){

		#pull data

		$statement = $dbconn->prepare("SELECT * FROM admin WHERE email=:em");
		
				#bind params
		$statement->bindParam(":em", $enter['email']);
		$statement->execute();

		$count = $statement->rowCount();
		#print_r($count); exit();

		if($count == 1) {
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if(password_verify($enter['password'], $row['hash'])){

				$_SESSION['id'] = $row['admin_id'];
				$_SESSION['email'] = $row['email'];
				header("Location:home.php");
			
			} else {
				$login_error = "wrong email or password";
				header("Location:login.php?login_error=$login_error");
			}
		
		}
		}

		function addcategory($dbconn, $hold){


					#insert data

		$stmt = $dbconn->prepare("INSERT INTO categories VALUES(:id, :ca)");

		#bind params

		$data = [

	

		':id' => $hold[NULL],
		':ca' => $hold['category'],
			];
		$stmt->execute($data);

		$success = "category added successfully";
		header("Location:categories.php");


	}

		function viewcategory($dbconn){
			$result="";

$stmt = $dbconn->prepare("SELECT category_id, category_name FROM categories");

$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		$result .= '<tr><td>'.$row['category_id'].'</td>';
		$result .= '<td>'.$row['category_name'].'</td></tr>';


}
	return $result;

}


	function viewproduct($dbconn){
		$result="";

		$stmt = $dbconn->prepare("SELECT * FROM book");
		$stmt->execute();



		while($row = $stmt->fetch()){


									
					$result.= '<tr><td>' .$row['book_id']. '</td>';
					$result.= 	'<td>' .$row['title']. '</td>';
					$result.= 	'<td>' .$row['author']. '</td>';
					$result.= '<td>' .$row['category_id']. '</td>';
					$result.= 	'<td>' .$row['price']. '</td>';
					$result.= 	'<td>' .$row['year_of_publication']. '</td>';
					$result.= 	'<td>' .$row['isbn']. '</td>';
					$result.= 	'<td><img src="'.$row['filepath'].'" height="60" width="60"></td>';
					$result.=  '<td><a href="edit_product.php">edit</a></td>';
					$result.= 	'<td><a href="#">delete</a></td></tr>';

		}


		return $result;

}

	function addproduct($dbconn, $fibu, $kiki, $pie, $in){

		define("MAX_FILE_SIZE", "2097152"); 

$ext = ["image/jpeg", "image/jpg", "image/png"];

	
	if($fibu[$pie]['size'] > MAX_FILE_SIZE){

		$in[$pie] = "FILE TOO LARGE".MAX_FILE_SIZE;
	}

	$rnd = rand(0000000000,9999999999);
	$strip_name = str_replace("_", "", $fibu[$pie]['name']);
	$filename = $rnd.$strip_name;
	$destination = "uploads/".$filename;

	if(!move_uploaded_file($fibu[$pie]['tmp_name'], $destination)){

		$in[$pie] = "file upload failed";
	}




	$stmt = $dbconn->prepare("INSERT INTO book VALUES(NULL,:bt, :au, :id, :bpr, :yr, :is, :fi)");
#bind param
$data = [

":bt" => $kiki['btitle'],
":au" => $kiki['bauthor'],
":id" => $kiki['category'],
":bpr" => $kiki['bprice'],
":yr" => $kiki['year'],
":is" => $kiki['isbn'],
":fi" => $destination,
];

$stmt->execute($data);
$success = "product added";
header("location:home.php?success=$success");


	}


function userRegister($dbconn, $post){

	$stmt = $dbconn->prepare("INSERT INTO users VALUES(NULL, :f,:ln,:em,:us,:h");

	$data = [

	":f" => $post['fname'],
	":ln" => $post['lname'],
	":em" => $post['email'],
	":us" => $post['username'],
	":h" => $hash,
];








}


	?>

	
