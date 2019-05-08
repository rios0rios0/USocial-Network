<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
require_once "../../services/UserService.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$vm = new ViewsManagement();
	$vm->session = $session;
	$user_service = new UserService();
	$vm->friends = $user_service->list_friends($session->user->id);
	$vm->set("panel_friends", "/app/views/fragments/panel-friends.php");
	$vm->set("content", "/app/views/home/index.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}