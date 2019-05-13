<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$id01 = $session->user->id;
	$id02 = isset($_POST["id"]) ? $_POST["id"] : "";
	$accepted = isset($_POST["accepted"]) ? $_POST["accepted"] : "";
	//
	if (intval($accepted) === 0) {
		$sql = "DELETE F FROM friend AS F 
				WHERE (F.id_user_accepted = $id01 AND F.id_user_requested = $id02)";
	} else {
		$sql = "UPDATE friend AS F SET F.accepted = $accepted
            	WHERE (F.id_user_accepted = $id01 AND F.id_user_requested = $id02)";
	}
	$query = $conn->query($sql);
	if ($query->rowCount() > 0) {
		$out["id"] = $id02;
		$out["message"] = "Successful updated friendship.";
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