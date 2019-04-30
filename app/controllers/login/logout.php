<?php
require_once "../../core/routes/RoutesManagement.php";
require_once "../../core/session/SessionManagement.php";
$session = SessionManagement::getInstance();
$session->destroy();
RoutesManagement::redirect("/app/");