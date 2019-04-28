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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unknown Social Network</title>
	<link rel="stylesheet" href="../resources/plugins/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../resources/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../resources/styles/style.css">
	<script type="text/javascript" src="../resources/plugins/jquery-1.11.2/package/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../resources/plugins/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../resources/plugins/vue-2.5.9/package/dist/vue.min.js"></script>
	<script type="text/javascript" src="../resources/plugins/axios-0.12.0/package/dist/axios.min.js"></script>
</head>
<body>
<header>
	<div class="container">
		<img src="../resources/images/logo.png" class="logo" alt="">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label class="sr-only" for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-default">Log In</button>
			<br>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Remember me
				</label>
			</div>
		</form>
	</div>
</header>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="members">Members</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="groups">Groups</a></li>
				<li><a href="photos.html">Photos</a></li>
				<li><a href="members/profile.php">Profile</a></li>
			</ul>
		</div>
	</div>
</nav>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sign Up</h3>
					</div>
					<div class="panel-body">
						<form class="form">
							<div class="row">
								<div class="form-group col-sm-6">
									<label class="sr-only" for="first-name">First Name</label>
									<input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name">
								</div>
								<div class="form-group col-sm-6">
									<label class="sr-only" for="last-name">Last Name</label>
									<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name">
								</div>
							</div>
							<div class="form-group">
								<label class="sr-only" for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Your Mail">
							</div>
							<div class="form-group">
								<label class="sr-only" for="passwd">Password</label>
								<input type="password" class="form-control" id="passwd" name="password" placeholder="Your Password">
							</div>
							<div class="form-group">
								<label class="sr-only" for="conf-passwd">Confirm Password</label>
								<input type="password" class="form-control" id="conf-passwd" name="confirm-password" placeholder="Confirm Password">
							</div>
							<button type="submit" class="btn btn-default pull-right">Sign Up</button>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="container">
		<p>&copy Unknown Social Network, <?= date("Y") ?></p>
	</div>
</footer>
</body>
<script src="../resources/scripts/app.js"></script>
</html>