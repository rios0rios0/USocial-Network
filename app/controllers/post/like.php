<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$id_post = isset($_POST["id"]) ? $_POST["id"] : "";
	//
	if ($id_post !== "") {
		$id_user = $session->user->id;
		$sql = "INSERT INTO `like` (id_user, id_post) VALUES ($id_user, $id_post)";
		$query = $conn->query($sql);
		if ($query->rowCount() > 0) {
			$out["message"] = "Successful inserted like on post.";
		} else {
			$out["error"] = true;
			$out["message"] = "Error on insert like on post.";
		}
	} else {
		$out["error"] = true;
		$out["message"] = "All fields is required.";
	}
	DatabaseConnection::close();
	header("Content-type: application/json");
	echo json_encode($out);
	die();
} else {
	RoutesManagement::redirect("/app/");
}