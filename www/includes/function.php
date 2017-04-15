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


	function fileupload($fileArray,$imageName){


		#generate random number to append
		$rnd = rand(0000000000, 9999999999);

		# strip filename for spaces
		$strip_name = str_replace(" ", "_", $fileArray[$imageName]['name']);

		$filename = $rnd.$strip_name;
		$destination = 'uploads/'.$filename;

		if(!move_uploaded_file($fileArray[$imageName]['tmp_name'], $destination)) {
			
			return [false,$destination];
		}
			return [true, $destination];
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
				header("Location:view_product.php");
			
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
		$result .= '<td>'.$row['category_name'].'</td>';




}
	return $result;

}


	function viewproduct($dbconn){
		$result="";

		$stmt = $dbconn->prepare("SELECT * FROM book");
		$stmt->execute();



		while($row = $stmt->fetch()){

			$bk_id = $row['book_id'];
			$title = $row['title'];
			$author = $row['author'];
			$cat_id = $row['category_id'];
			$price = $row['price'];
			$year = $row['year_of_publication'];
			$isbn = $row['isbn'];
			$fpth = $row['filepath'];
			/*$stmt = $dbconn->prepare("SELECT category_id FROM categories WHERE category_name= :cn");
			$stmt->bindparam(":cn", $row['category_name']);
			$stmt->execute();
			$row2 = $stmt->fetch();*/


									
					$result.= '<tr><td>' .$row['book_id']. '</td>';
					$result.= 	'<td>' .$row['title']. '</td>';
					$result.= 	'<td>' .$row['author']. '</td>';
					$result.= '<td>' .$row['category_id']. '</td>';
					$result.= 	'<td>' .$row['price']. '</td>';
					$result.= 	'<td>' .$row['year_of_publication']. '</td>';
					$result.= 	'<td>' .$row['isbn']. '</td>';
					$result.= 	'<td><img src="'.$row['filepath'].'" height="60" width="60"></td>';
					$result.=  '<td><a href="edit_product.php?book_id='.$bk_id.'">edit</a></td>';
					$result.= 	'<td><a href="delete_product.php?pid='.$bk_id.'">delete</a></td></tr>';

		}


		return $result;

}

	function addproduct($dbconn, $destin){

	
$stmt = $dbconn->prepare("INSERT INTO book VALUES(NULL,:bt, :au, :id, :bpr, :yr, :is,:fi, :flag)");

$clean = array_map('trim', $_POST);

#bind param
$data = [

":bt" => $clean['btitle'],
":au" => $clean['bauthor'],
":id" => $clean['category'],
":bpr" => $clean['bprice'],
":yr" => $clean['year'],
":is" => $clean['isbn'],
":fi" => $destin,
":flag" => $clean['flag'],
];

$stmt->execute($data);


}

	function editproduct($dbconn,$tino){

	$stmt = $dbconn->prepare("UPDATE book SET title=:ti,author=:au,category_id=:id,price=:pr,year_of_publication=:yr, isbn=:is WHERE book_id=:b");

	

		$data = [

		":ti" => $tino['btitle'],
		":au" => $tino['bauthor'],
		":id" => $tino['cat_id'],
		":pr" => $tino['bprice'],
		":yr" => $tino['year'],
		":is" => $tino['isbn'],
		#":ti" => $destination,
		":b"  => $tino['book_id'],

		];
		
		$stmt->execute($data);


}
	function bookloop($dbconn,$getbookbyid){

		$stmt = $dbconn->prepare("SELECT * FROM book WHERE book_id=:b");

		$stmt->bindparam(":b", $getbookbyid);

		$stmt->execute();


		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row;		
}



	function getcategory($dbconn){

		$stmt = $dbconn->prepare("SELECT * FROM categories");

		$stmt->execute();
		$result = "";

		while($record = $stmt->fetch()){
			$cat_id = $record['category_id'];
			$cat_name = $record['category_name'];

			$result .= "<option value='$cat_id'>$cat_name</option>";
		}

		return $result;

	}

	function editgetcategory($dbconn, $katty){

		$stmt = $dbconn->prepare("SELECT * FROM categories");

		$stmt->execute();
		$result = "";

		while($record = $stmt->fetch()){
			$cat_id = $record['category_id'];
			$cat_name = $record['category_name'];
			
			if($cat_name == $katty) { continue; }

			$result .= "<option value='$cat_id'>$cat_name</option>";

			
		}

		return $result;


	}

	function selectcategorybyid($dbconn, $catID){

	$stmt = $dbconn->prepare("SELECT * FROM categories WHERE category_id = :cat_id");

	$stmt->bindParam(":cat_id", $catID);

	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;

	}

	function redirect($loc){

		header("Location: $loc");


	}




function userRegister($dbconn, $post){

	$hash = password_hash($post['password'], PASSWORD_BCRYPT);

	$stmt = $dbconn->prepare("INSERT INTO users VALUES(NULL, :f,:ln,:em,:us,:h)");

	$data = [

	":f" => $post['fname'],
	":ln" => $post['lname'],
	":em" => $post['email'],
	":us" => $post['username'],
	":h" => $hash, ];

	$stmt->execute($data);

}



function doesUserEmailExist($dbconn, $email) {
		$result = false;

		$stmt = $dbconn->prepare("SELECT email FROM users WHERE email =:e");

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

	function UserLogin($dbconn, $clean){

		$stmt = $dbconn->prepare("SELECT * FROM users WHERE email=:em");
		
				#bind params
				$stmt->bindParam(":em", $clean['email']);
				
				$stmt->execute();

		$count = $stmt->rowCount();
		#print_r($count); exit();

		if($count == 1) {
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id'] = $row['user_id'];

			$_SESSION['name'] = $row['username'];

			#print_r($row); exit();
			
			if(password_verify($clean['password'], $row['hash'])){

				header("Location:userhome.php");
				}
			
			} else {
				$login_error = "wrong email or password";
				header("Location:user_login.php?login_error=$login_error");
			}
		
		
		
	}

		function displayTopBookImage($dbconn, $dir){

			$result = "";

			$stmt = $dbconn->prepare("SELECT * FROM book WHERE filepath=:f");

			$stmt->bindparam(":f", $dir);

			$stmt->execute();

			$result .= '<div class="display-book" style="background: url('.$dir.'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>';

			return $result; 

		}

		function displayTopSelling($dbconn, $dir){

			$result = "";

			$stmt = $dbconn->prepare("SELECT * FROM book WHERE filepath=:f");

			$stmt->bindparam(":f", $dir);

			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

					$title = $row['title'];
					$author = $row['author'];
					$price = '$'.$row['price'];

					$result .= '<h2 class="book-title">'.$title.'</h2>'.'<h3 class="book-author">'.$author.'</h3>'.'<h3 class="book-price">'.$price.'</h3>';

			}

				return $result;

		}


			function trendingBooks($dbconn){

				$result = "";

				$stmt = $dbconn->prepare("SELECT * FROM book WHERE flag='trending'");

				$stmt->execute();

				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

					$book_id = $row['book_id'];
					$filepath = $row['filepath'];
					$price = $row['price'];
					$author = $row['author'];
					$title = $row['title'];

				$result .= '<li class="book">
          <a href="bookpreview.php?book_id='.$book_id.'"><div class="book-cover"><img src="'.$filepath.'" height="200" width="100"></div></a>
          <div class="book-price"><p>'.$price.'</p></div>
        </li>';


				}

				return $result;
			}


			function mostViewed($dbconn){

				$result = "";

				$stmt = $dbconn->prepare("SELECT * FROM book WHERE flag='most viewed'");

				$stmt->execute();

				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

					$book_id = $row['book_id'];
					$price = $row['price'];
				$filepath = $row['filepath'];

					$result .=  '<li class="book">
          <a href="bookpreview.php?book_id='.$book_id.'"><div class="book-cover"><img src="'.$filepath.'" height="200" width="150"></div></a>
          <div class="book-price"><p>'.$price.'</p></div>
        </li>';
				}

				return $result;






			}




	
	

	?>



	 


