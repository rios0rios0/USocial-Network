<div class="container">
	<img src="<?= RoutesManagement::base_url() ?>resources/images/logo.png" class="logo" alt="">
	<?php
	if (!$this->session->logged()) {
		?>
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label class="sr-only" for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-default">Log In</button>
			<br>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Remember me
				</label>
			</div>
		</form>
		<?php
	}
	?>
</div>