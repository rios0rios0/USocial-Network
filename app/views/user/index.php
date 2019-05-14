<div class="row">
	<div class="col-md-8">
		<div class="profile">
			<h1 class="page-header"><?= $this->user->username ?></h1>
			<div class="row">
				<div class="col-md-4">
					<img src="<?= RoutesManagement::base_url() ?>resources/images/user.png" class="img-thumbnail" alt="">
				</div>
				<div class="col-md-8">
					<ul>
						<li><strong>Username: </strong><?= $this->user->username ?></li>
						<li><strong>Email: </strong><?= $this->user->email ?></li>
					</ul>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-12">
					<?php
					if (isset($this->vars["panel_posts"])) {
						include_once $this->panel_posts;
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<?php
		if (isset($this->vars["panel_invitations"])) {
			include_once $this->panel_invitations;
		}
		if (isset($this->vars["panel_friends"])) {
			include_once $this->panel_friends;
		}
		?>
	</div>
</div>