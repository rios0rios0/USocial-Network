<?php
require_once "../../../core/db/DatabaseConnection.php";
$conn = DatabaseConnection::getInstance();
$out = array("error" => false);
//
$firstName = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$lastName = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$confirmPassword = $_POST["confirm_password"] ? $_POST["confirm_password"] : "";
//
$check = (($password !== "") && ($confirmPassword !== "") && ($password === $confirmPassword));
if ($check) {
	if (($firstName !== "") && ($lastName !== "") && ($email !== "")) {
		$login = trim(strtolower($firstName . $lastName)) . rand(0, 100);
		$sql = "INSERT INTO user (login, password) VALUES ('$login', '$password')";
		$query = $conn->query($sql);
		if ($query->rowCount() > 0) {
			$out["message"] = "Sign Up successful. Your login is <strong>$login</strong>.";
		} else {
			$out["error"] = true;
			$out["message"] = "Sign Up failed. Database error, contact administrator...";
		}
	} else {
		$out["error"] = true;
		$out["message"] = "All fields is required.";
	}
} else {
	$out["error"] = true;
	$out["message"] = "Password and confirmation is required. Must be equal.";
}
DatabaseConnection::close();
header("Content-type: application/json");
echo json_encode($out);
die();