<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Wall</h3>
			</div>
			<div class="panel-body">
				<form class="form" method="post" action="<?= RoutesManagement::base_url() ?>app/controllers/post/insert.php">
					<div class="form-group">
						<textarea class="form-control" id="html_text" name="html_text"
						          placeholder="Write on the wall..." required="required"></textarea>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url_image" name="url_image"
						       placeholder="Path to image for post..." required="required">
					</div>
					<div class="pull-right">
						<div class="btn-toolbar">
							<button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
		if (isset($this->vars["panel_posts"])) {
			include_once $this->panel_posts;
		}
		?>
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