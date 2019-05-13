<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
require_once "../../services/UserService.php";
require_once "../../services/PostService.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$vm = new ViewsManagement();
	$vm->session = $session;
	$user_service = new UserService();
	$vm->invitations = $user_service->list_friends($session->user->id, 0, 6);
	$vm->friends = $user_service->list_friends($session->user->id, 1, 6);
	if (count($vm->invitations) > 0) {
		$vm->set("panel_invitations", "/app/views/fragments/panel-invitations.php");
	}
	if (count($vm->friends) > 0) {
		$vm->set("panel_friends", "/app/views/fragments/panel-friends.php");
	}
	//
	$post_service = new PostService();
	$vm->posts = $post_service->timeline($session->user->id);
	foreach ($vm->posts as $k1 => $v1) {
		$vm->posts[$k1]->user = $user_service->get($v1->id_user);
		$vm->posts[$k1]->user->url = RoutesManagement::base_url() . "app/controllers/user/index.php?id=" . $v1->id_user;
		$vm->posts[$k1]->user->image = new stdClass();
		$vm->posts[$k1]->user->image->url = RoutesManagement::base_url() . "resources/images/user.png";
		$comments = $post_service->list_comments($v1->id);
		foreach ($comments as $k2 => $v2) {
			$comments[$k2]->user = $user_service->get($v2->id_user);
			$comments[$k2]->user->url = RoutesManagement::base_url() . "app/controllers/user/index.php?id=" . $v2->id_user;
			$comments[$k2]->user->image = new stdClass();
			$comments[$k2]->user->image->url = RoutesManagement::base_url() . "resources/images/user.png";
		}
		$vm->posts[$k1]->comments = $comments;
	}
	if (count($vm->posts) > 0) {
		$vm->set("panel_posts", "/app/views/fragments/panel-posts.php");
	}
	//
	$vm->set("content", "/app/views/home/index.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/");
}