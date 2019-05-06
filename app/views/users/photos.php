<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Dobble Social Network: Photos Page</title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/ekko-lightbox.css" rel="stylesheet">
</head>
<body>
<header>
	<div class="container">
		<img alt="" class="logo" src="img/logo.png">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail3">Email address</label>
				<input class="form-control" id="exampleInputEmail3" placeholder="Enter email" type="email">
			</div>
			<div class="form-group">
				<label class="sr-only" for="exampleInputPassword3">Password</label>
				<input class="form-control" id="exampleInputPassword3" placeholder="Password" type="password">
			</div>
			<button class="btn btn-default" type="submit">Sign in</button>
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
			<button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.html">Home</a></li>
				<li><a href="users.html">Users</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="groups.html">Groups</a></li>
				<li><a href="photos.html">Photos</a></li>
				<li><a href="profile.html">Profile</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="page-header">Photos</h1>
				<ul class="photos gallery-parent">
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample1.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample1.jpg"></a>
					</li>
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample2.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample2.jpg"></a>
					</li>
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample3.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample3.jpg"></a>
					</li>
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample4.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample4.jpg"></a>
					</li>
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample5.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample5.jpg"></a>
					</li>
					<li>
						<a data-footer="this is a footer" data-gallery="mygallery" data-hover="tooltip" data-parent=".gallery-parent" data-placement="top" data-title="title" data-toggle="lightbox" href="img/sample6.jpg" title="image"><img alt="" class="img-thumbnail" src="img/sample6.jpg"></a>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default friends">
					<div class="panel-heading">
						<h3 class="panel-title">My Friends</h3>
					</div>
					<div class="panel-body">
						<ul>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
							<li><a class="thumbnail" href="profile.html"><img alt="" src="img/user.png"></a></li>
						</ul>
						<div class="clearfix"></div>
						<a class="btn btn-primary" href="#">View All Friends</a>
					</div>
				</div>
				<div class="panel panel-default groups">
					<div class="panel-heading">
						<h3 class="panel-title">Latest Groups</h3>
					</div>
					<div class="panel-body">
						<div class="group-item">
							<img alt="" src="img/group.png">
							<h4><a class="" href="#">Sample Group One</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<div class="group-item">
							<img alt="" src="img/group.png">
							<h4><a class="" href="#">Sample Group Two</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<div class="group-item">
							<img alt="" src="img/group.png">
							<h4><a class="" href="#">Sample Group Three</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<a class="btn btn-primary" href="#">View All Groups</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<footer>
	<div class="container">
		<p>Dobble Copyright &copy, 2015</p>
	</div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/ekko-lightbox.js"></script>
<script>
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});
	$(function () {
		$('[data-hover="tooltip"]').tooltip()
	})
</script>
</body>
</html>