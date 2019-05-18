<div class="panel panel-default friends">
	<div class="panel-heading">
		<h3 class="panel-title">My Friends</h3>
	</div>
	<div class="panel-body">
		<ul>
			<?php
			foreach ($this->friends as $user) {
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
		<a class="btn btn-primary" href="<?= RoutesManagement::base_url() ?>app/controllers/user/list.php?action=friends">View All Friends</a>
	</div>
</div>