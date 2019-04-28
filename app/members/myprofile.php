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
			<button type="submit" class="btn btn-default">Sign in</button>
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
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Wall</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<textarea class="form-control" placeholder="Write on the wall"></textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
							<div class="pull-right">
								<div class="btn-toolbar">
									<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text
									</button>
									<button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image
									</button>
									<button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="panel panel-default post">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<a href="profile.html" class="post-avatar thumbnail"><img src="../resources/images/user.png" alt="">
									<div class="text-center">DevUser1</div>
								</a>
								<div class="likes text-center">7 Likes</div>
							</div>
							<div class="col-sm-10">
								<div class="bubble">
									<div class="pointer">
										<p>Hey I was wondering if you wanted to go check out the football game later. I heard they are supposed to be really good!</p>
									</div>
									<div class="pointer-border"></div>
								</div>
								<p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> -
									<a href="#">Follow</a> - <a href="#">Share</a></p>
								<div class="comment-form">
									<form class="form-inline">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter comment">
										</div>
										<button type="submit" class="btn btn-default">Add</button>
									</form>
								</div>
								<div class="clearfix"></div>
								<div class="comments">
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default post">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<a href="profile.html" class="post-avatar thumbnail"><img src="../resources/images/user.png" alt="">
									<div class="text-center">DevUser1</div>
								</a>
								<div class="likes text-center">7 Likes</div>
							</div>
							<div class="col-sm-10">
								<div class="bubble">
									<div class="pointer">
										<p>Hey I was wondering if you wanted to go check out the football game later. I heard they are supposed to be really good!</p>
									</div>
									<div class="pointer-border"></div>
								</div>
								<p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> -
									<a href="#">Follow</a> - <a href="#">Share</a></p>
								<div class="comment-form">
									<form class="form-inline">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter comment">
										</div>
										<button type="submit" class="btn btn-default">Add</button>
									</form>
								</div>
								<div class="clearfix"></div>
								<div class="comments">
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default post">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-2">
								<a href="profile.html" class="post-avatar thumbnail"><img src="../resources/images/user.png" alt="">
									<div class="text-center">DevUser1</div>
								</a>
								<div class="likes text-center">7 Likes</div>
							</div>
							<div class="col-sm-10">
								<div class="bubble">
									<div class="pointer">
										<p>Hey I was wondering if you wanted to go check out the football game later. I heard they are supposed to be really good!</p>
									</div>
									<div class="pointer-border"></div>
								</div>
								<p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> -
									<a href="#">Follow</a> - <a href="#">Share</a></p>
								<div class="comment-form">
									<form class="form-inline">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="enter comment">
										</div>
										<button type="submit" class="btn btn-default">Add</button>
									</form>
								</div>
								<div class="clearfix"></div>
								<div class="comments">
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="comment">
										<a href="#" class="comment-avatar pull-left"><img src="../resources/images/user.png" alt=""></a>
										<div class="comment-text">
											<p>I am just going to paste in a paragraph, then we will add another clearfix.</p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default friends">
					<div class="panel-heading">
						<h3 class="panel-title">My Friends</h3>
					</div>
					<div class="panel-body">
						<ul>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
							<li><a href="profile.html" class="thumbnail"><img src="../resources/images/user.png" alt=""></a>
							</li>
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
							<img src="../resources/images/group.png" alt="">
							<h4><a href="#" class="">Sample Group One</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<div class="group-item">
							<img src="../resources/images/group.png" alt="">
							<h4><a href="#" class="">Sample Group Two</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<div class="group-item">
							<img src="../resources/images/group.png" alt="">
							<h4><a href="#" class="">Sample Group Three</a></h4>
							<p>This is a paragraph of intro text, or whatever I want to call it.</p>
						</div>
						<div class="clearfix"></div>
						<a href="#" class="btn btn-primary">View All Groups</a>
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