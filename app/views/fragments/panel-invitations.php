<div class="panel panel-default friends">
	<div class="panel-heading">
		<h3 class="panel-title">My Invitations</h3>
	</div>
	<div class="panel-body">
		<ul>
			<?php
			foreach ($this->invitations as $user) {
				?>
				<li>
					<a href="<?= $user->url ?>"
					   class="thumbnail"><img src="<?= $user->photo ?>" alt=""></a>
				</li>
				<?php
			}
			?>
		</ul>
		<div class="clearfix"></div>
		<a class="btn btn-primary" href="<?= RoutesManagement::base_url() ?>app/controllers/user/list.php?action=invitations">View All Invitations</a>
	</div>
</div>