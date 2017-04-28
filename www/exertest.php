<?php

include 'employee.php';

include 'salaried.php';

include 'hourly.php';

	$hourEmp = new hourly(40, "Michael", "IT", 500);

	$hourEmp->calculatesalary();


	$salEmp = new salaried(100, "500", "mr Uche", "Accounting");

	$salEmp->getsalary();

	/*$emp = new employee("Oluwa Tade","$20", "Account");

	$name = $emp->getName();

	echo $name;

	echo "</br>";


	$salary = $emp->getsalary();

	echo $salary; 

	echo "</br>";

	echo "</br>";

echo "</br>";



	$sal = new salaried("15hrs", "$20", "akanji olowo poroku", "$15");

	$name = $sal->getName();

	echo $name;

	echo "</br>";

	$hours = $sal->getHours();

	echo $hours;

	echo "</br>";

	$salary = $sal->getSalary();

	echo $salary;

	echo "</br>"; */

	/*$hour = new hourly("5hrs", "$20", "Tina Jackson Janet my mentor","$500");

	$name = $hour->getName();

	echo $name;

	echo "</br>";

	$salary = $salary->getSalary();

	echo $salary; */








