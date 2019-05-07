<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<div class="row" id="sign-up-form">
	<div class="col-md-6"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Sign Up</h3>
			</div>
			<div class="panel-body">
				<form class="form" v-on:submit.prevent>
					<div class="row">
						<div class="form-group col-sm-6">
							<label class="sr-only" for="first-name">First Name</label>
							<input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name"
							       v-model="logDetails.first_name">
						</div>
						<div class="form-group col-sm-6">
							<label class="sr-only" for="last-name">Last Name</label>
							<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name"
							       v-model="logDetails.last_name">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Your Mail"
						       v-model="logDetails.email">
					</div>
					<div class="form-group">
						<label class="sr-only" for="passwd">Password</label>
						<input type="password" class="form-control" id="passwd" name="password" placeholder="Your Password"
						       v-model="logDetails.password">
					</div>
					<div class="form-group">
						<label class="sr-only" for="conf-passwd">Confirm Password</label>
						<input type="password" class="form-control" id="conf-passwd" name="confirm-password" placeholder="Confirm Password"
						       v-model="logDetails.confirm_password">
					</div>
					<button type="submit" class="btn btn-default pull-right" @click="sign_up">Sign Up</button>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="alert alert-danger text-center" v-if="errorMessage">
			<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
			</button>
			<span class="glyphicon glyphicon-alert"></span> <span v-html="errorMessage"></span>
		</div>
		<div class="alert alert-success text-center" v-if="successMessage">
			<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span>
			</button>
			<span class="glyphicon glyphicon-check"></span> <span v-html="successMessage"></span>
		</div>
	</div>
	<script src="<?= RoutesManagement::base_url() ?>resources/scripts/controllers/login/sign-up.js"></script>
</div>