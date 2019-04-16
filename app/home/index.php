<?php
require_once "../../core/db/DatabaseConnection.php";
require_once "../../core/routes/RoutesManagement.php";
require_once "../../core/session/SessionManagement.php";
$conn = DatabaseConnection::getInstance();
$session = SessionManagement::getInstance();
if (!$session->logged()) {
	RoutesManagement::redirect("/app/");
}
$sql = "SELECT * FROM user AS U WHERE U.login='" . $session->user->login . "'";
$query = $conn->query($sql);
$object = $query->fetchObject();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Unknown Social Network</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">Welcome, <?= $object->login ?>!</h1>
		<a href="../login/logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	</div>
</div>
</body>
</html>