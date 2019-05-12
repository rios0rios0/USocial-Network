<?php
foreach ($this->posts as $post) {
	?>
	<div class="panel panel-default post">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-2">
					<a href="<?= RoutesManagement::base_url() ?>app/controllers/users/index.php?id=<?= $post->user->id ?>"
					   class="post-avatar thumbnail"><img src="<?= RoutesManagement::base_url() ?>resources/images/user.png" alt="">
						<div class="text-center"><?= $post->user->username ?></div>
					</a>
					<p class="text-center"><?= date("d/m/Y", strtotime($post->created)) ?></p>
					<div class="likes text-center"><?= $post->n_likes ?> Like<?= ((intval($post->n_likes) > 1) ? "s" : "") ?></div>
					<div class="likes text-center"><?= $post->n_comments ?> Comment<?= ((intval($post->n_comments) > 1) ? "s" : "") ?></div>
				</div>
				<div class="col-sm-10">
					<div class="bubble">
						<div class="pointer">
							<p><?= $post->html_text ?></p>
						</div>
						<div class="pointer-border"></div>
					</div>
					<p class="post-actions">
						<?php
						if ($post->user->id !== $this->session->user->id) {
							?>
							<a href="#">Like</a>
							<?php
						}
						?>
					</p>
					<div class="comment-form">
						<form class="form-inline">
							<div class="form-group">
								<input type="text" class="form-control" id="comment" name="comment"
								       placeholder="Comment...">
							</div>
							<button type="submit" class="btn btn-default">Add</button>
						</form>
					</div>
					<div class="clearfix"></div>
					<div class="comments">
						<?php
						foreach ($post->comments as $comment) {
							?>
							<div class="comment">
								<a href="#" class="comment-avatar pull-left">
									<img src="<?= RoutesManagement::base_url() ?>resources/images/user.png" alt="">
								</a>
								<div class="comment-text">
									<p><?= $comment->html_text ?></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}