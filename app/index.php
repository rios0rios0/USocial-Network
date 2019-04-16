<?php
require_once "../core/routes/RoutesManagement.php";
require_once "../core/session/SessionManagement.php";
$session = SessionManagement::getInstance();
if ($session->logged()) {
	RoutesManagement::redirect("/app/home/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Unknown Social Network</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.9/vue.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.12.0/axios.min.js"></script>
</head>
<body>
<div id="app"></div>
<div class="container">
	<h1 class="page-header text-center">Unknown Social Network</h1>
	<div id="login">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Login</div>
				<div class="panel-body">
					<label for="login">Login:</label>
					<input type="text" id="login" class="form-control" v-model="logDetails.login" v-on:keyup="keymonitor">
					<label for="password">Password:</label>
					<input type="password" id="password" class="form-control" v-model="logDetails.password" v-on:keyup="keymonitor">
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary btn-block" @click="checkLogin();">
						<span class="glyphicon glyphicon-log-in"></span> Login
					</button>
				</div>
			</div>
			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
				</button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
				</button>
				<span class="glyphicon glyphicon-check"></span> {{ successMessage }}
			</div>
		</div>
	</div>
</div>
</body>
<script src="../resources/scripts/app.js"></script>
</html>