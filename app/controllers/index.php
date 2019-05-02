<?php
require_once "../../core/views/ViewsManagement.php";
require_once "../../core/session/SessionManagement.php";
require_once "../../core/routes/RoutesManagement.php";
$session = SessionManagement::getInstance();
$vm = new ViewsManagement();
$vm->session = $session;
$vm->set("content", !$session->logged() ? "/app/views/sign-up/index.php" : "/app/views/home/index.php");
$vm->render();