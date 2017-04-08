<?php

include 'includes/db.php';

include 'includes/bookhead.php';

include 'includes/function.php';


?>

<?php

define("MAX_FILE_SIZE", "2097152"); 

$ext = ["image/jpeg", "image/jpg", "image/png"];

$error = [];

if(array_key_exists('submit', $_POST)){

	
	if(empty($_FILES['pic']['name'])) {
			$error[] = "please choose a file";
	}else{


		if($_FILES['pic']['size'] > MAX_FILE_SIZE){

			$error['pic'] = "file size exceeds maximum. maximum:".MAX_FILE_SIZE;
		}

		if(!in_array($_FILES['pic']['type'], $ext)){

			$error['pic'] = "invalid file format";
		}


	}

	

	
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


	$upload = fileupload($_FILES, 'pic');


	if($upload[0]) {

		addproduct($conn, $upload[1]);
		header('Location: view_product.php');
	}

	$error['pic'] = 'File Upload failed. Please Try again!';


}

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

	
</form>
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
								</tr>
          		</tbody>
			</table>
		</div>



<form id="file/add" action="add_product.php" method="post" enctype="multipart/form-data">
<label>PLEASE SELECT FILE</label></br>
<input type="file" name="pic"></br>
</br>
</br>



<?php displayErrors($error, 'btitle'); ?>
<label>BOOK TITLE:</label>
<input type="text" name="btitle" placeholder="book name"/></br>
</br>

<label>AUTHOR:</label>
<input type="text" name="bauthor" placeholder="Author"/></br>
</br>

<label>category</label>
<select name="category">
<option value="">select category</option>
<?php $view = getcategory($conn); echo $view ?>





</select>



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