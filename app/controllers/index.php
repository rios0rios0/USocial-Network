<?php
require_once "../../core/views/ViewsManagement.php";
require_once "../../core/session/SessionManagement.php";
require_once "../../core/routes/RoutesManagement.php";
$session = SessionManagement::getInstance();
if (!$session->logged()) {
	$vm = new ViewsManagement();
	$vm->session = $session;
	$vm->set("content", "/app/views/login/sign-up.php");
	$vm->render();
} else {
	RoutesManagement::redirect("/app/controllers/home/");
}