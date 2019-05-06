<?php
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	$session->destroy();
	RoutesManagement::redirect("/app/");
} else {
	RoutesManagement::redirect("/app/");
}