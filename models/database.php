<?php
	namespace models;

	class Database{
		private $servername;
		private $username;
		private $password;
		private $dbname;
		private $conn;
		private $num;

		public function __construct($servername, $username, $password, $dbname){
			//setting database
			$this->servername = $servername;
			$this->username = $username;
			$this->password = $password;
			$this->dbname = $dbname;

			//connect database
			$this->conn = mysqli_connect($servername, $username, $password, $dbname);
			if (mysqli_connect_errno()){
				die ("Could not connect to the database: <br />".mysqli_connect_error());
			}
		}

		public function query($query){
			$result = mysqli_query($this->conn, $query);
			if (!$result) die('Invalid query: ' . mysqli_error($this->conn));
			return $result;
		}

		public function escapeString($query){
			$con = $this->conn;
			$escape = mysqli_escape_string($con, $query);
			return $escape;
		}

		public function fetchArray($num){
			$result_array = mysqli_fetch_array($num);
			return $result_array;
		}

		public function numRows($num){
			if (!empty($num)) {
				return $num->num_rows;
			} else {
				return 0;
			}
		}

		public function __destruct() {
			mysqli_close($this->conn)
				OR die("There was a problem disconnecting from the database.");
		}
	}

?>
