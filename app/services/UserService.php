<?php

class UserService
{
	private $conn;

	public function __construct()
	{
		$this->conn = DatabaseConnection::getInstance();
	}

	public function list_friends($id_user)
	{
		$sql = "SELECT U.id,
				   U.username,
				   U.email,
				   U.photo
				FROM friend AS F
					 LEFT JOIN user U
							   ON U.id = (CASE
											  WHEN F.id_user_requested = '" . $id_user . "'
												  THEN F.id_user_accepted
											  ELSE F.id_user_requested END)
				WHERE (F.id_user_accepted = '" . $id_user . "'
					OR F.id_user_requested = '" . $id_user . "')
				  AND F.accepted = 1";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}

	public function list_posts($id_user)
	{
		$sql = "SELECT *
				FROM post AS P
				WHERE P.id_user = '" . $id_user . "'
				ORDER BY P.created DESC";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}