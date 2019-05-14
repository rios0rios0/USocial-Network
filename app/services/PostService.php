<?php

class PostService
{
	private $conn;

	public function __construct()
	{
		$this->conn = DatabaseConnection::getInstance();
	}

	public function list($id_user, $id_session_user = 0)
	{
		$sql = "SELECT
					P.id,
       				P.id_user,
       				P.html_text,
       				P.photo,
       				P.created,
       				COALESCE((SELECT 'true' FROM `like` AS L WHERE L.id_post = P.id AND L.id_user = $id_session_user), 'false') AS liked,
       				P.modified,
       				(SELECT COUNT(*) FROM `like` AS L WHERE L.id_post = P.id) AS n_likes,
       				(SELECT COUNT(*) FROM comment AS C WHERE C.id_post = P.id) AS n_comments
				FROM post AS P
				WHERE P.id_user = $id_user
				ORDER BY P.created DESC";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}

	public function timeline($id_user)
	{
		$sql = "SELECT 
       				P.id,
				   	P.id_user,
				   	P.html_text,
				   	P.photo,
				   	P.created,
       				COALESCE((SELECT 'true' FROM `like` AS L WHERE L.id_post = P.id AND L.id_user = $id_user), 'false') AS liked,
				   	P.modified,
				   	(SELECT COUNT(*) FROM `like` AS L WHERE L.id_post = P.id)  AS n_likes,
				   	(SELECT COUNT(*) FROM comment AS C WHERE C.id_post = P.id) AS n_comments
				FROM post AS P
				WHERE P.id_user = $id_user
				   OR P.id_user IN (SELECT IF(F.id_user_requested <> $id_user, F.id_user_requested, F.id_user_accepted) AS id
									FROM friend AS F
									WHERE F.accepted = 1
									  AND (F.id_user_requested = $id_user OR F.id_user_accepted = $id_user))
				ORDER BY P.created DESC";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}

	public function list_comments($id_post)
	{
		$sql = "SELECT
					C.id,
       				C.id_user,
       				C.id_post,
       				C.html_text
				FROM comment AS C
				WHERE C.id_post = $id_post
				ORDER BY C.created DESC";
		$query = $this->conn->query($sql);
		return $query->fetchAll(PDO::FETCH_CLASS);
	}
}