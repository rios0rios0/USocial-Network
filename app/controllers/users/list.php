<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
require_once "../../services/UserService.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$conn = DatabaseConnection::getInstance();
	$out = array("error" => false);
	//
	$search = new stdClass();
	$search->action = isset($_GET["action"]) ? $_GET["action"] : "";
	$search->username = isset($_GET["username"]) ? $_GET["username"] : "";
	$condition = "";
	if ($search->username !== "") {
		$condition = "AND U.username LIKE '%" . $search->username . "%'";
	}
	//
	$vm = new ViewsManagement();
	$vm->session = $session;
	$vm->search = $search;
	$user_service = new UserService();
	switch ($search->action) {
		case "friends":
			$vm->users = $user_service->list_friends($session->user->id);
			break;
		case "invites":
			$vm->users = $user_service->list_friends($session->user->id, 0);
			break;
		default:
			$vm->users = $user_service->list($session->user->id, $condition);
			break;
	}
	$vm->invites = $user_service->list_friends($session->user->id, 0, 6);
	$vm->friends = $user_service->list_friends($session->user->id, 1, 6);
	if (count($vm->invites) > 0) {
		$vm->set("panel_invites", "/app/views/fragments/panel-invites.php");
	}
	if (count($vm->friends) > 0) {
		$vm->set("panel_friends", "/app/views/fragments/panel-friends.php");
	}
	$vm->set("content", "/app/views/users/list.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}