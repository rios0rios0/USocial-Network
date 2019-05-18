<?php

class UserService
{
	private $conn;

	public function __construct()
	{
		$this->conn = DatabaseConnection::getInstance();
	}

	public function get($id)
	{
		$sql = "SELECT
					U.id,
       				U.username,
       				U.password,
       				U.email,
       				U.photo 
				FROM user AS U
				WHERE U.id = $id";
		$query = $this->conn->query($sql);
		return $this->prepare($query->fetchObject());
	}

	public function list($id_user_exclude, $extra_condition)
	{
		$sql = "SELECT
					U.id,		
			        U.username,
			        U.email,
	                U.photo,
	                IF(F1.id_user_accepted IS NOT NULL, 1, 0)			AS invited,
					IF(F2.id_user_requested IS NOT NULL, 1, 0)			AS requester,
					IF((F1.accepted <> 0) OR (F2.accepted <> 0), 1, 0)	AS friend
				FROM user AS U
					LEFT JOIN friend AS F1
				        ON U.id = F1.id_user_accepted
							AND F1.id_user_requested = '" . $id_user_exclude . "'
					LEFT JOIN friend AS F2
		                ON U.id = F2.id_user_requested
							AND F2.id_user_accepted = '" . $id_user_exclude . "'
				WHERE U.id <> '" . $id_user_exclude . "'
					$extra_condition
				ORDER BY U.username ASC";
		$query = $this->conn->query($sql);
		return $this->prepare($query->fetchAll(PDO::FETCH_CLASS));
	}

	public function list_friends($id_user, $friend = 1, $limit = null)
	{
		$limit = (!is_null($limit) ? "LIMIT $limit" : "");
		$condition = (($friend === 0) ? "AND F.id_user_accepted = $id_user" : "");
		$sql = "SELECT 
       				U.id,
				   	U.username,
				   	U.email,
				   	U.photo,
       				IF(F.id_user_accepted <> $id_user, 1, 0)	AS invited,
					IF(F.id_user_requested <> $id_user, 1, 0)	AS requester,
					F.accepted									AS friend
				FROM friend AS F
					 LEFT JOIN user U
							   ON U.id = (CASE
											  WHEN F.id_user_requested = '$id_user'
												  THEN F.id_user_accepted
											  ELSE F.id_user_requested END)
				WHERE (F.id_user_accepted = '$id_user'
						OR F.id_user_requested = '$id_user')
				  	AND F.accepted = $friend
					$condition
				ORDER BY U.username ASC
				$limit";
		$query = $this->conn->query($sql);
		return $this->prepare($query->fetchAll(PDO::FETCH_CLASS));
	}

	private function prepare($users)
	{
		$url = RoutesManagement::base_url() . "app/controllers/user/index.php?id=";
		if (is_array($users)) {
			foreach ($users as $key => $value) {
				$users[$key]->photo = $this->get_photo($value->photo);
				$users[$key]->url = $url . $value->id;
			}
		} else {
			if (!is_null($users)) {
				$users->photo = $this->get_photo($users->photo);
				$users->url = $url . $users->id;
			}
		}
		return $users;
	}

	public function get_photo($abs_path)
	{
		return ((!is_null($abs_path) && getimagesize($abs_path))
			? $abs_path : (RoutesManagement::base_url() . "resources/images/user.png"));
	}
}