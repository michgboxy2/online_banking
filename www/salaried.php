<?php


	class salaried extends employee {

		private $hoursworked;
		

		public function __construct($hoursworked, $salary, $name, $department){

			$this->salary = $salary;
			$this->hoursworked = $hoursworked;
			$this->name = $name;
			$this->department = $department;
			$this->type = "salary worker";


			echo "............................";

		echo "<p>NAME: ".$this->getname()."</p>";
		echo "<p>DEPARTMENT: ".$this->getdepartment()."</p>";
		echo "<p>SALARY: ".$this->getsalary()."</p>";


		}


				#echo "<p>".$this->type."</p>";




		/*public function  __construct($hours, $name, $salary, $department){

			parent::__construct($name, $salary, $department);

			$this->hours = $hours;

			$this->type = "employee";

		} 

			function getHours(){

				return $this->hours;
			}
*/






	}