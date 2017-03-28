<?php #test.php sandbox

/*define('DBNAME', 'store');
define('DBUSER', 'root');
define('DBPASS', 'root');

try{ 
		#prepare a PDO INSTNCE

$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

	# SET verbose error modes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

} catch(PDOException $e) {

		echo $e->getMessage();
} */

	if(array_key_exists('save', $_POST)) {

		print_r($_FILES);
	}

?>

<form id="register" method="POST" enctype="multipart/form-data">
<p>please upload a file</p>
<input type="file" name="pic">

<input type="submit" name="save">
	





</form>