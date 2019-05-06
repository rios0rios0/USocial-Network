<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<div class="container" id="login-form">
	<?php
	if (!$this->session->logged()) {
		?>
		<form class="form-inline" v-on:submit.prevent="login">
			<div class="form-group">
				<label class="sr-only" for="username">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username"
				       v-model="logDetails.username" v-on:keyup="keyMonitor">
			</div>
			<div class="form-group">
				<label class="sr-only" for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password"
				       v-model="logDetails.password" v-on:keyup="keyMonitor">
			</div>
			<button type="submit" class="btn btn-default" @click="login();">Log In</button>
			<br>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Remember me
				</label>
			</div>
			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
				</button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
				</button>
				<span class="glyphicon glyphicon-check"></span> {{ successMessage }}
			</div>
		</form>
		<script src="<?= RoutesManagement::base_url() ?>resources/scripts/controllers/login/login.js"></script>
	<?php
	} else {
	?>
		<div>
			<h1 class="text-center">Welcome, <?= $this->session->user->username ?>!</h1>
			<br>
		</div>
		<?php
	}
	?>
</div>