<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$sql = "SELECT * FROM user AS U WHERE U.username='" . $session->user->username . "'";
	$query = $conn->query($sql);
	$vm = new ViewsManagement();
	$vm->session = $session;
	$vm->set("panel_friends", "/app/views/fragments/panel-friends.php");
	$vm->set("panel_groups", "/app/views/fragments/panel-groups.php");
	$vm->set("content", "/app/views/home/index.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}