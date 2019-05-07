<?php

class PostService
{
	private $conn;

	public function __construct()
	{
		$this->conn = DatabaseConnection::getInstance();
	}

	public function count_likes($id_post)
	{
		$sql = "";
		$query = $this->conn->query($sql);
		return $query->fetchObject();
	}

	public function list_comments($id_post)
	{
		$sql = "";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}