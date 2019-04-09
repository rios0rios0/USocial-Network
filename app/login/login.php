<?php
require_once "../../core/db/DatabaseConnection.php";
$pdo = new DatabaseConnection();
$conn = $pdo->connection();
$out = array("error" => false);
$login = $_POST["login"];
$password = $_POST["password"];
if ($login == "") {
	$out["error"] = true;
	$out["message"] = "Login is required.";
} else if ($password == "") {
	$out["error"] = true;
	$out["message"] = "Password is required.";
} else {
	$sql = "SELECT U.id, U.login FROM user AS U WHERE U.login='$login' AND U.password='$password'";
	$query = $conn->query($sql);
	if ($query->rowCount() > 0) {
		$_SESSION["user"] = $query->fetchObject();
		$_SESSION["logged_user"] = true;
		$out["message"] = "Login successful.";
	} else {
		$out["error"] = true;
		$out["message"] = "Login failed. User not found...";
	}
}
$pdo->close();
header("Content-type: application/json");
echo json_encode($out);
die();