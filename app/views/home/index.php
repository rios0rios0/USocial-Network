<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Wall</h3>
			</div>
			<div class="panel-body">
				<form>
					<div class="form-group">
						<textarea class="form-control" placeholder="Write on the wall"></textarea>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
					<div class="pull-right">
						<div class="btn-toolbar">
							<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>
							<button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image
							</button>
							<button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video
							</button>
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