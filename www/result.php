<?php

	class mysqlResult

{
			protected $conn;
			protected $sql;
			protected $result;
			protected $queryString;
			const FETCH_ASSOC = 1;
			const FETCH_NUM = 2;
			CONST FETCH_BOTH = 3;

		

		public function __construct($conn, $sql)

			{
				$this->conn = $conn;
				
				$this->sql = $sql;

				$this->queryString = $sql;

				$this->result = mysqli_query($this->conn, $this->sql);

			}

			public function fetch($mode = 1)
	{
					if($mode == 1)
					{

					return mysqli_FETCH_ASSOC($this->result);

					}

						if($mode == 2)
						{

							return mysqli_array($this->result, MYSQLI_NUM);
						}

							if($mode == 3)
							{

								return mysqli_fetch_array($this->result);
							}

	}

			public function bindParam($format, $value)

						{

							$this->queryString = str_replace($format, $value, $this->sql);

						}

			public function execute($data=false)
								{
									if($data !=  false && is_array($data))
									{
										 foreach($data as $format => $value)
										 {
										 	$this->queryString = str_replace($format, $value, $this->queryString);

										 }
									}

									$this->result = mysqli_query($this->conn, $this->queryString);

								}


}

?>