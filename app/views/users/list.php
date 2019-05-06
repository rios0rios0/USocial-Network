<div class="row">
	<div class="col-md-8">
		<div class="users">
			<h1 class="page-header">Users</h1>
			<?php
			foreach ($this->users as $user) {
				?>
				<div class="row user-row text-center">
					<div class="col-md-3">
						<img src="<?= RoutesManagement::base_url() ?>resources/images/user.png" class="img-thumbnail" alt="">
						<div class="text-center">
							<?= $user->username ?>
							<?php
							if ($user->friend) {
								?>
								<span class="label label-success"><i class="fa fa-check"></i></span>
								<?php
							}
							?>
						</div>
					</div>
					<div class="text-center">
						<?php
						if (($user->invited) && (!$user->friend)) {
							?>
							<div class="col-md-3 col-centered">
								<p>
									<span class="btn btn-warning btn-block" disabled="disabled"><i class="fa fa-check"></i> Invited</span>
								</p>
							</div>
							<?php
						} else if (($user->requester) && (!$user->friend)) {
							?>
							<div class="col-md-2 col-centered">
								<p>
									<span class="btn btn-success btn-block"><i class="fa fa-check"></i> Accept</span>
								</p>
							</div>
							<div class="col-md-2 col-centered">
								<p>
									<span class="btn btn-danger btn-block"><i class="fa fa-close"></i> Reject</span>
								</p>
							</div>
							<?php
						} else if (!$user->friend) {
							?>
							<div class="col-md-3 col-centered">
								<p>
									<a href="#" class="btn btn-primary btn-block"><i class="fa fa-users"></i> Add Friend</a>
								</p>
							</div>
							<?php
						}
						?>
						<div class="col-md-3 col-centered">
							<p>
								<a href="<?= RoutesManagement::base_url() ?>app/controllers/users/index.php?id=<?= $user->id ?>"
								   class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a>
							</p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default friends">
			<div class="panel-heading">
				<h3 class="panel-title">My Friends</h3>
			</div>
			<div class="panel-body">
				<ul>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
					<li><a href="profile.html" class="thumbnail"><img src="img/user.png" alt=""></a></li>
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
					<img src="img/group.png" alt="">
					<h4><a href="#" class="">Sample Group One</a></h4>
					<p>This is a paragraph of intro text, or whatever I want to call it.</p>
				</div>
				<div class="clearfix"></div>
				<div class="group-item">
					<img src="img/group.png" alt="">
					<h4><a href="#" class="">Sample Group Two</a></h4>
					<p>This is a paragraph of intro text, or whatever I want to call it.</p>
				</div>
				<div class="clearfix"></div>
				<div class="group-item">
					<img src="img/group.png" alt="">
					<h4><a href="#" class="">Sample Group Three</a></h4>
					<p>This is a paragraph of intro text, or whatever I want to call it.</p>
				</div>
				<div class="clearfix"></div>
				<a href="#" class="btn btn-primary">View All Groups</a>
			</div>
		</div>
	</div>
</div>