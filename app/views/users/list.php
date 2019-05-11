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
							<btn-invited></btn-invited>
							<?php
						} else if (($user->requester) && (!$user->friend)) {
							?>
							<btn-accept-reject id="<?= $user->id ?>"></btn-accept-reject>
							<?php
						} else if (!$user->friend) {
							?>
							<btn-add-friendship id="<?= $user->id ?>"></btn-add-friendship>
							<?php
						} else {
							?>
							<btn-undo-friendship id="<?= $user->id ?>"></btn-undo-friendship>
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
					<div class="alert alert-danger text-center" v-if="errorMessage">
						<button type="button" class="close" @click="clearMessage();">
							<span aria-hidden="true">&times;</span>
						</button>
						<span class="glyphicon glyphicon-alert"></span> <span v-html="errorMessage"></span>
					</div>
					<div class="alert alert-success text-center" v-if="successMessage">
						<button type="button" class="close" @click="clearMessage();">
							<span aria-hidden="true">&times;</span>
						</button>
						<span class="glyphicon glyphicon-check"></span> <span v-html="successMessage"></span>
					</div>
				</div>
				<?php
			}
			?>
			<script src="<?= RoutesManagement::base_url() ?>resources/scripts/controllers/users/list.js"></script>
		</div>
	</div>
	<div class="col-md-4">
		<?php include_once $this->panel_friends; ?>
	</div>
</div>