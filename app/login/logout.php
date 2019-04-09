<?php
require_once "../../core/session/SessionManagement.php";
$session = new SessionManagement();
$session->destroy();
header("Location: " . base_u() . "/app/");