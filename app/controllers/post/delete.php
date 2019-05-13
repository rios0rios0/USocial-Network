<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$id = isset($_POST["id"]) ? $_POST["id"] : "";
	//
	$sql = "DELETE P FROM post AS P WHERE P.id = $id";
	$query = $conn->query($sql);
	if ($query->rowCount() > 0) {
		$out["message"] = "Successful deleted post.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	} else {
		$out["error"] = true;
		$out["message"] = "Error on update.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	}
} else {
	RoutesManagement::redirect("/app/");
}