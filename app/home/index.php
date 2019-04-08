<?php
session_start();
$conn = new mysqli("localhost", "root", "", "vuelogin");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
	header('location:index.php');
}
$sql = "select * from user where userid='" . $_SESSION['user'] . "'";
$query = $conn->query($sql);
$row = $query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vue.js Login with PHP/MySQLi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Welcome, <?php echo $row['username']; ?>!</h1>
        <a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
    </div>
</div>
</body>
</html>