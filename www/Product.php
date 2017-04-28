<?php

abstract class Product
	{

		protected $title;
		protected $price;
		protected $type;


		#public function setTitle($title){

		public function __construct($title, $price)
		{

			$this->title = $title;

			$this->price = $price;

			#$this->type = $type;
}
			public function getPrice(){

				return $this->price;
			}

			public function getTitle(){

				return $this->title;
			}

			public function getType(){

				return $this->type;
			}


			abstract public function preview();

		


		#$this->title=$title;
		#}





	}