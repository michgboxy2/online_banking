<?php


	class Book extends Product {

		private $pageCount;


		#public function getPrice(){

		#return $this->price;

	#}

		public function __construct($pc, $title, $price)
		{

				#calling an overridden constructor
			parent::__construct($title, $price);

			$this->pageCount = $pc;

			$this->type = "book";


		}

		public function getPageCount(){

			return $this->pageCount;
		}

		public function preview() {

			echo "<p>Type:</p>".$this->getType();
			echo "<p>Price:</p>".$this->getPrice();
			echo "<p>Title:</p>".$this->getTitle();
			echo "<p>pageCount</p>".$this->getPageCount();
			

		}

	}