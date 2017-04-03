<?php

include 'includes/db.php';

include 'includes/bookhead.php';

include 'includes/function.php';


?>

<?php

if(array_key_exists('submit', $_POST)){

	$error = [];

if(empty($_POST['btitle'])){


}










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
				<!-- </thead> -->
				<!-- <tbody> -->
					<!-- <tr> -->
						<!-- <td>the knowledge gap</td> -->
						<!-- <td>maja</td> -->
						<!-- <td>January, 10</td> -->
						<!-- <td><a href="#">edit</a></td> -->
						<!-- <td><a href="#">delete</a></td> -->
					</tr>
          		</tbody>
			</table>
		</div>

<form id="add" action="add_product.php" method="post">

<label>BOOK TITLE:</label>
<input type="text" name="btitle" placeholder="book name"/></br>
</br>

<label>AUTHOR:</label>
<input type="text" name="bauthor" placeholder="Author"/></br>
</br>

<input type="hidden" name="cat_id"></br>

<label>PRICE:</label>
<input type="text" name="bprice" placeholder="Price of book"></br>
</br>

<label>Year Of Publication</label>
<input type="text" name="year" placeholder="year"></br>
</br>

<label>ISBN</label>
<input type="text" name="isbn" placeholder="isbn"></br>
</br>

<input type="submit" name="submt" value="Add book">

	




</form>


</body>
</html>