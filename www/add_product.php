<?php

include 'includes/db.php';

include 'includes/bookhead.php';

include 'includes/function.php';

<<<<<<< HEAD
=======
/*$shuu = $conn->prepare("SELECT * FROM categories ");


for($i=0; $row = $shuu->fetch(); $i++){?> 
	
	<?php }
	$id = $row['category_id'];

*/	
>>>>>>> add

?>

<?php

define("MAX_FILE_SIZE", "2097152"); 

$ext = ["image/jpeg", "image/jpg", "image/png"];

$error = [];

if(array_key_exists('submit', $_POST)){

	
	if(empty($_FILES['pic']['name'])) {
			$error[] = "please choose a file";
<<<<<<< HEAD
	}else{


		if($_FILES['pic']['size'] > MAX_FILE_SIZE){

			$error['pic'] = "file size exceeds maximum. maximum:".MAX_FILE_SIZE;
		}

		if(!in_array($_FILES['pic']['type'], $ext)){

			$error['pic'] = "invalid file format";
		}


	}

	

	
=======
	}

	if(!in_array($_FILES['pic']['type'], $ext)){

		$error['pic'] = "invalid file format";
	}

	
>>>>>>> add
if(empty($_POST['btitle'])){

	$error['btitle'] = "please enter the book title";

}

if(empty($_POST['bauthor'])){

	$error['bauthor'] = "please enter author"; 
}

if(empty($_POST['category'])){

	$error['category'] = "please select category id";
}

if(empty($_POST['bprice'])){

	$error['bprice'] = "enter book price";
}

if(empty($_POST['year'])){

	$error['year'] = "enter year";
}

if(empty($_POST['isbn'])){

	$error['isbn'] = "enter isbn number";
}

if(empty($error)){

<<<<<<< HEAD

	$upload = fileupload($_FILES, 'pic');


	if($upload[0]) {

		addproduct($conn, $upload[1]);
		header('Location: view_product.php');
	}

	$error['pic'] = 'File Upload failed. Please Try again!';


}

=======
	if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)){

		$error['pic'] = "file upload failed";
	}

$clean = array_map('trim', $_POST);

addproduct($conn, $_FILES, $clean, 'pic', $error);

} 
>>>>>>> add
foreach($error as $err){
	echo "<p>".$err. "</p>";
}

}

if(isset($_GET['success'])){
	echo "<p>".$_GET['success']. "</p>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		</section>
	<div class="wrapper">

<<<<<<< HEAD
	
</form>
=======
	</form>
>>>>>>> add
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>BOOK Title</th>
						<th>Author</th>
						 <th>Price</th> 
						<th>Year of publication</th> 
						<th>ISBN</th>
					</tr>
<<<<<<< HEAD
								</tr>
=======
					</tr>
>>>>>>> add
          		</tbody>
			</table>
		</div>



<form id="file/add" action="add_product.php" method="post" enctype="multipart/form-data">
<<<<<<< HEAD
=======


<?php if(isset($error['pic'])){ echo '<span class="err">'.$error['pic']. '</span>';  }?>
>>>>>>> add
<label>PLEASE SELECT FILE</label></br>
<input type="file" name="pic"></br>
</br>
</br>

<<<<<<< HEAD


=======
>>>>>>> add
<?php displayErrors($error, 'btitle'); ?>
<label>BOOK TITLE:</label>
<input type="text" name="btitle" placeholder="book name"/></br>
</br>

<label>AUTHOR:</label>
<input type="text" name="bauthor" placeholder="Author"/></br>
</br>

<<<<<<< HEAD
<label>category</label>
<select name="category">
<option value="">select category</option>
<?php $view = getcategory($conn); echo $view ?>





</select>
=======
<label>category ID</label>
<select name="category">
<option>select category</option>
<?php  $stmt = $conn->prepare("SELECT * FROM categories");

$stmt->execute(); 
for($i=0; $row = $stmt->fetch(); $i++){

?>
<option value="<?php echo $row['category_id']; ?>">
<?php echo $row['category_id'];?></option>
<?php } ?></select>
>>>>>>> add



<input type="hidden" name="cat_id" placeholder="category ID"></br>

<label>PRICE:</label>
<input type="text" name="bprice" placeholder="Price of book"></br>
</br>

<label>Year Of Publication</label>
<input type="text" name="year" placeholder="year"></br>
</br>

<label>ISBN</label>
<input type="text" name="isbn" placeholder="isbn"></br>
</br>

<input type="submit" name="submit" value="Add book">

	



</form>


</body>
</html>