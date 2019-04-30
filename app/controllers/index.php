<?php
require_once "../../core/views/ViewsManagement.php";
require_once "../../core/session/SessionManagement.php";
$session = SessionManagement::getInstance();
$vm = new ViewsManagement();
$vm->content = (!$session->logged() ?
	"/app/views/sign-up/index.php" :
	"/app/views/home/index.php");
$vm->render();