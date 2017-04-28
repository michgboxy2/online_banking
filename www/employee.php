<?php

	/*class Employee {


		protected $salary;

		protected $name;



	public function __construct($name,$salary)

		{ $this->salary = $salary;

			$this->name = $name;

		  #$this->hours = $hours;

		}
			function getSalary(){

				return $this->salary;
			}


			function getName(){

				return $this->name;
			}

		}*/


			abstract class Employee{

				protected $salary;

				protected $name;

				protected $department;


			public function setname($name){

				$this->salary = $salary;
			}

			public function setdepartment($department){

				$this->department = $department;
			}




			public function getsalary(){

				return $this->salary;

			}

			public function getname(){

				return $this->name;
			}

			public function getdepartment(){

				return $this->department;
			}


			public function calculatesalary(){


			}









			}

