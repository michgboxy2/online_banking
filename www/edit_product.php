<?php

$page_title = "EDIT PRODUCT";

	# load db connection

	include 'includes/db.php';

	#load functions

	include 'includes/function.php';

	#include header
	
	include 'includes/header.php';

	$ext = ["image/jpg", "image/jpeg", "image/png"];
		$errors = [];


	if(isset($_GET['book_id'])){
		$bid = bookloop($conn,$_GET['book_id']);
		
		}

		$category = selectcategorybyid($conn, $bid['category_id']);







		$errors= [];

	if(array_key_exists('submit',$_POST)){

		

	if(empty($_POST['pic'])){
		$errors['pic']="Select a file";
	}
	if(empty($_POST['btitle'])){
		$errors['btitle']= "enter book title";
	}
	
	if(empty($_POST['bauthor'])){
		$errors['bauthor'] = "enter author name";
	}

	if(empty($_POST['bprice'])){

		$errors['bprice'] = "enter price";
	}

	if(empty($_POST['year'])){
		$errors['year']=  "enter year";
	}

	if(empty($_POST['isbn'])){
		$errors['isbn'] = "enter isbn image";

	}

	if(empty($error)){

		$clean = array_map('trim', $_POST);

		editproduct($conn, $clean, $_GET['book_id']);

		

	}
	


	}



		

?>		





<div class="wrapper">
		<h3 id="register-label">EDIT BOOKS</h3>
		<hr>
		<form id="register" method="post" action="<?php echo "edit_product.php?book_id=".$_GET['book_id'];  ?>">
			<div> 

				
				<input type="file" name="pic" value="<?php echo $row['filepath'];  ?>">
			</div></br>
			
			<div>
				<label>Book Title:</label>	
				<input type="text" name="btitle" placeholder="title" value="<?php echo $bid['title']; ?>">
			</div></br>

			<div>
				
				<input type="hidden" name="book_id" placeholder="book_id" value="<?php echo $bid['book_id']; ?>">
			</div></br>


			<div>
				<label>Author:</label>
				<input type="text" name="bauthor" placeholder="author" value="<?php echo $bid['author'];?>">
			</div></br>
			
			<div>				
			<label>Category ID:</label>
				
				<select name="cat_id">
					
					<option>categories</option>
										
					
					<option value="<?php $category['category_id'];?>"><?php echo $category['category_id']; ?></option>

					<?php 
							$catlist = editgetcategory($conn, $category['category_name']);

							echo $catlist;

							?>

										
																							
					 </select>

				
			</div></br>
 
			<div>
				<label>Price:</label>	
				<input type="text" name="bprice" placeholder="Price" value="<?php echo $bid['price'] ;?>">
			</div></br>

			<div>
				<label>Year Of Publication:</label>	
				<input type="text" name="year" placeholder="year of publication" value="<?php echo $bid['year_of_publication'] ;?>">
			</div></br>

			<div>
				<label>ISBN:</label>	
				<input type="text" name="isbn" placeholder="isbn" value="<?php echo $bid['isbn'];?>">
			</div></br>



			<input type="submit" name="submit" value="Edit Book">
			
			</form>
			

			<?php

			include 'includes/footer.php';

	?>