<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class DatabaseConnection
{
	private $db = "social_db";
	private $host = "localhost";
	private $user = "root";
	private $password = "1q2w!Q@W";
	private $connection = null;

	public function __construct()
	{
		try {
			$this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if (is_null($this->connection)) {
				die();
			}
		} catch (PDOException $e) {
			error_log("Connection failed: " . $e->getMessage());
			die();
		}
	}

	public function connection()
	{
		return $this->connection;
	}

	public function close()
	{
		$this->connection = null;
	}
}