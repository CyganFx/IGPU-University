<?php
class Database
{
	private $host = "localhost";
	private $db_name = "newigpu";
	private $username = "root";
	private $password = "duman070601";
	public $conn;

	public function getConnection()
	{
		$this->conn = null;
		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			echo "<script>console.log('connected to database')</script>";
		} catch (PDOException $exception) {
			echo "<script>console.log('Connection error: " . $exception->getMessage() . "')</script>";
		}
		return $this->conn;
	}
}
