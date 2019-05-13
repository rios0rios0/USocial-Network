<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$id_user = isset($_POST["id_user"]) ? $_POST["id_user"] : "";
	$id_post = isset($_POST["id_post"]) ? $_POST["id_post"] : "";
	//
	$sql = "INSERT INTO `like` (id_user, id_post) VALUES ($id_user, $id_post)";
	$query = $conn->query($sql);
	if ($query->rowCount() > 0) {
		$out["message"] = "Successful inserted like on post.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	} else {
		$out["error"] = true;
		$out["message"] = "Error on insert like on post.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	}
} else {
	RoutesManagement::redirect("/app/");
}