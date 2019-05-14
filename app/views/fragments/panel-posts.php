<div class="posts">
	<?php
	foreach ($this->posts as $post) {
		?>
		<post id="<?= $post->id ?>"
		      text="<?= $post->html_text ?>"
		      created="<?= date("d/m/Y", strtotime($post->created)) ?>"
		      liked="<?= $post->liked ?>"
		      n-likes="<?= intval($post->n_likes) ?>"
		      n-comments="<?= intval($post->n_comments) ?>"
		      v-bind:user="<?= str_replace('"', "'", json_encode($post->user)) ?>"
		      v-bind:comments="<?= str_replace('"', "'", json_encode($post->comments)) ?>"
		      v-bind:can-like="<?= intval($post->user->id !== $this->session->user->id) ?>"
		      v-bind:can-delete="<?= intval($post->user->id === $this->session->user->id) ?>"></post>
		<?php
	}
	?>
	<script src="<?= RoutesManagement::base_url() ?>resources/scripts/controllers/post/component.js"></script>
</div>