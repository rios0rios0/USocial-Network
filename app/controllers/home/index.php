<?php
require_once "../../../core/views/ViewsManagement.php";
require_once "../../../core/session/SessionManagement.php";
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/db/DatabaseConnection.php";
$session = SessionManagement::getInstance();
$conn = DatabaseConnection::getInstance();
$sql = "SELECT * FROM user AS U WHERE U.login='" . $session->user->login . "'";
$query = $conn->query($sql);
$vm = new ViewsManagement();
$vm->session = $session;
$vm->user = $query->fetchObject();
$vm->set("content", "/app/views/home/index.php");
$vm->render();