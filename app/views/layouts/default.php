<?php
require_once "../../../core/routes/RoutesManagement.php";
require_once "../../../core/session/SessionManagement.php";
$session = SessionManagement::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unknown Social Network</title>
	<link rel="stylesheet" href="<?= RoutesManagement::base_url() ?>resources/plugins/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= RoutesManagement::base_url() ?>resources/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= RoutesManagement::base_url() ?>resources/styles/style.css">
	<script type="text/javascript" src="<?= RoutesManagement::base_url() ?>resources/plugins/jquery-1.11.2/package/dist/jquery.min.js"></script>
	<script type="text/javascript" src="<?= RoutesManagement::base_url() ?>resources/plugins/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= RoutesManagement::base_url() ?>resources/plugins/vue-2.5.9/package/dist/vue.min.js"></script>
	<script type="text/javascript" src="<?= RoutesManagement::base_url() ?>resources/plugins/axios-0.12.0/package/dist/axios.min.js"></script>
</head>
<body>
<header>
	<div class="container">
		<img src="../resources/images/logo.png" class="logo" alt="">
		<?php
		if (!$session->logged()) {
			?>
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
			<?php
		}
		?>
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
		<?php include $this->content ?>
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