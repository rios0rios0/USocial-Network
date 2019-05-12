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
	$vm->invites = $user_service->list_friends($session->user->id, 0, 6);
	$vm->friends = $user_service->list_friends($session->user->id, 1, 6);
	if (count($vm->invites) > 0) {
		$vm->set("panel_invites", "/app/views/fragments/panel-invites.php");
	}
	if (count($vm->friends) > 0) {
		$vm->set("panel_friends", "/app/views/fragments/panel-friends.php");
	}
	$vm->set("content", "/app/views/home/index.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}