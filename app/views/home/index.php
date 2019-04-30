<?php
require_once "../../../core/db/DatabaseConnection.php";
$conn = DatabaseConnection::getInstance();
$sql = "SELECT * FROM user AS U WHERE U.login='" . $session->user->login . "'";
$query = $conn->query($sql);
$object = $query->fetchObject();
?>
<!-- <h1 class="text-center">Welcome, <?= $object->login ?>!</h1> -->
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