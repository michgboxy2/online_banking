<?php

	class Dvd extends Product{

		private $duration;

		public function __construct($dr, $title, $price){

			parent::__construct($title, $price);

			$this->duration = $dr;

			$this->type = "DVD";


		}

		public function getDuration(){

			return $this->duration; 
		}


		public function preview() {

			echo "<p>Type:</p>".$this->getType();
		}





	}