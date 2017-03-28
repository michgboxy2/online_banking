<?php #test.php sandbox

define('DBNAME', 'store');
define('DBUSER', 'root');
define('DBPASS', 'root');

$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);





?>