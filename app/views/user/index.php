<html lang="en">
<div class="row">
	<div class="col-md-8">
		<div class="profile">
			<h1 class="page-header"><?= $this->user->username ?></h1>
			<div class="row">
				<div class="col-md-4">
					<img src="<?= $this->user->photo ?>" class="img-thumbnail" alt="">
				</div>
				<div class="col-md-8">
					<ul>
						<li><strong>Username: </strong><?= $this->user->username ?></li>
						<li><strong>Email: </strong><?= $this->user->email ?></li>
						<?php
						if ($this->session->user->id === $this->user->id) {
							?>
							<li>
								<form class="form-inline" method="post" action="index.php">
									<div class="form-group">
										<label for="photo"><strong>Photo Link: </strong></label>
										<input type="text" class="form-control" id="photo" name="photo" placeholder="Photo Link"
										       value="<?= $this->user->photo_link ?>">
									</div>
									<button type="submit" class="btn btn-default">Set</button>
								</form>
							</li>
							<?php
						}
						?>
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