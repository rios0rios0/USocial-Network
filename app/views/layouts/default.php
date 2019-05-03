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
	<?php include $this->header ?>
</header>
<?php
if ($this->session->logged()) {
	?>
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
					<li class="active"><a href="<?= RoutesManagement::base_url() ?>">Home</a></li>
					<li><a href="<?= RoutesManagement::base_url() ?>app/controllers/members">Members</a></li>
					<li><a href="<?= RoutesManagement::base_url() ?>app/controllers/groups">Groups</a></li>
					<li><a href="<?= RoutesManagement::base_url() ?>app/controllers/photos">Photos</a></li>
					<li><a href="<?= RoutesManagement::base_url() ?>app/controllers/members/profile">Profile</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<?php
} else {
	?>
	<br>
	<?php
}
?>
<section>
	<div class="container">
		<?php include $this->content ?>
	</div>
</section>
<?php include $this->footer ?>
</body>
</html>