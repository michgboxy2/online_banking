<?php

	 class Hourly extends employee {


	 	const rate = 10;
	 	private $expectedhours;
	 	private $hoursworked;


			 	public function __construct($expectedhours, $name, $department, $hoursworked){

	 			$this->expectedhours = $expectedhours;
	 			$this->name = $name;
	 			$this->department = $department;
	 			$this->hoursworked = $hoursworked;


	 	}
	 			public function calculatesalary(){

	 				$overtime = 0;

			if($this->hoursworked > $this->expectedhours){

				$overtime = $this->hoursworked - $this->expectedhours;

				$this->salary = (self::rate * $this->hoursworked);   
					
					
					} else {


			$this->salary = ($this->hoursworked * self::rate); 
					
					}


		echo "..............";

		echo "<p>Name: ".$this->getname()."</p>";

		echo "<p>Department: ".$this->getdepartment()."</p>";

		echo "<p>Salary: ".$this->getsalary()."</p>";


	}


























	 	/*private $extraHours;
	 	private $extraWages;

	 	public function __construct($extrahours, $extraWages, $name, $salary){

	 		parent::__construct($name, $salary);

	 		$this->extrahours = $extrahours;
	 		$this->extraWages = $extraWages;
	 		#$this->salary = $salary + $extraWages;
	 		$this->type = "employee";

	 	}

	 		function getExtraHours(){

	 			return $this->extrahours;

	 		}

	 		function getWages(){

	 			return $this->extraWages;

	 		}

	 		*/



	 }