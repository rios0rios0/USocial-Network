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
	$sql = "INSERT INTO friend (id_user_requested, id_user_accepted) VALUES (" . $session->user->id . ", $id)";
	$query = $conn->query($sql);
	if ($query->rowCount() > 0) {
		$out["message"] = "Successful invited.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	} else {
		$out["error"] = true;
		$out["message"] = "Error on insertion.";
		header("Content-type: application/json");
		echo json_encode($out);
		die();
	}
} else {
	RoutesManagement::redirect("/app/");
}