<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$sql = "SELECT * FROM user AS U WHERE U.username <> '" . $session->user->id . "'";
	$query = $conn->query($sql);
	$vm = new ViewsManagement();
	$vm->session = $session;
	$vm->users = $query->fetchAll(PDO::FETCH_CLASS);
	$vm->set("content", "/app/views/uers/index.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}