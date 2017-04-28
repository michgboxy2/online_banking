<?php

include 'database.php';
include  'result.php';


	$conn = new MysqliConn();

	$stmt = $conn->prepare("SELECT * FROM admin WHERE admin_id=:aid");

	$data = [':aid' => 7];

	$stmt->execute($data);

	$result = "";

	while($row = $stmt->fetch(mysqlResult::FETCH_NUM))
	{
		#print_r($row);exit();

		

		$result .= "<p>".$row[1]."</p>";
	}

		echo $result;





?>