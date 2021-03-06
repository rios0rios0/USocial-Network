let Posts = new Vue({
	el: ".posts",
	data: {
		uuid: 0,
		successMessage: "",
		errorMessage: "",
	},
	components: {
		"post": {
			data: function () {
				return {
					uuid: `post-uuid-${this.$parent.$data.uuid++}`,
					comment_form: {
						html_text: ""
					}
				}
			},
			props: {
				"id": Number,
				"text": String,
				"created": String,
				"photo": String,
				"liked": Boolean,
				"nLikes": Number,
				"nComments": Number,
				"user": Object,
				"comments": Object,
				"canLike": Boolean,
				"canDelete": Boolean
			},
			template:
				"<div v-bind:class='uuid' class='panel panel-default post'>" +
				"   <div class='panel-body'>" +
				"       <div class='row'>" +
				"           <div class='col-sm-2'>" +
				"	            <a v-bind:href='user.url' class='post-avatar thumbnail'>" +
				"                   <img v-bind:src='user.photo' alt=''>" +
				"                   <div class='text-center'>{{ user.username }}</div></a>" +
				"	            <p class='text-center'>{{ created }}</p>" +
				"	            <div class='likes text-center'>{{ nLikes }} Like{{ (!!(nLikes > 1) ? 's' : '') }}</div>" +
				"	            <div class='likes text-center'>{{ nComments }} Comment{{ (!!(nComments > 1) ? 's' : '') }}</div>" +
				"           </div>" +
				"           <div class='col-sm-10'>" +
				"               <div class='bubble'>" +
				"                   <div class='pointer'><p v-html='text'></p></div>" +
				"                   <div class='pointer-border text-center'>" +
				"                       <img v-bind:src='photo' class='post-img' alt=''>" +
				"                   </div>" +
				"               </div>" +
				"               <p class='post-actions'>" +
				"                   <a v-if='canLike' @click.prevent='like_post({ id })' v-html='render_like_text()' href='#'></a>" +
				"                   <a v-if='canDelete' @click.prevent='delete_post({ id })' href='#'>Delete</a>" +
				"               </p>" +
				"               <div class='comment-form'><form class='form-inline'>" +
				"                   <div class='form-group'>" +
				"                       <input v-model='comment_form.html_text' type='text' class='form-control'" +
				"                              id='comment' name='comment' placeholder='Comment...'>" +
				"                   </div>" +
				"                   <button @click.prevent='comment_post({ id })' type='submit' class='btn btn-default'>Add</button></form>" +
				"               </div>" +
				"               <div class='clearfix'></div>" +
				"               <div class='comments'>" +
				"                   <div v-for='comment in comments' class='comment'>" +
				"                       <a v-bind:href='comment.user.url' class='comment-avatar pull-left'>" +
				"                           <img v-bind:src='comment.user.photo' alt=''></a>" +
				"                       <div class='comment-text'><p v-html='render_html(comment.html_text)'></p></div>" +
				"                   </div>" +
				"                   <div class='clearfix'></div>" +
				"               </div>" +
				"           </div>" +
				"       </div>" +
				"   </div>" +
				"</div>",
			methods: {
				like_post: function ($options) {
					const self = this;
					const params = Posts.toFormData($options);
					axios.post(base_url + "app/controllers/post/like.php", params)
						.then(function (response) {
							if (response.data.error) {
								Posts.clearMessage();
								Posts.errorMessage = response.data.message;
							} else {
								Posts.clearMessage();
								if (!response.data.dislike) {
									self.nLikes++;
									self.liked = true;
								} else {
									self.nLikes--;
									self.liked = false;
								}
							}
						});
				},
				comment_post: function ($options) {
					const self = this;
					const params = Posts.toFormData($options, self.comment_form);
					axios.post(base_url + "app/controllers/post/comment.php", params)
						.then(function (response) {
							if (response.data.error) {
								Posts.clearMessage();
								Posts.errorMessage = response.data.message;
							} else {
								Posts.clearMessage();
								self.nComments++;
								self.comments.unshift(response.data.comment);
								self.comment_form = {html_text: ""};
							}
						});
				},
				delete_post: function ($options) {
					const self = this;
					const params = Posts.toFormData($options);
					axios.post(base_url + "app/controllers/post/delete.php", params)
						.then(function (response) {
							if (response.data.error) {
								Posts.clearMessage();
								Posts.errorMessage = response.data.message;
							} else {
								Posts.clearMessage();
								const target = Posts.$children.find((children) => {
									return children.$el.className.includes(self.uuid);
								});
								target.$el.remove();
							}
						});
				},
				render_html: function ($html_encoded) {
					return atob($html_encoded);
				},
				render_like_text: function () {
					return (JSON.parse(this.liked) ? "<strong>Dislike</strong>" : "Like");
				}
			}
		}
	},
	methods: {
		toFormData: function (...objects) {
			var form_data = new FormData();
			if (objects instanceof Array) {
				for (let k1 in objects) {
					for (let k2 in objects[k1]) {
						form_data.append(k2, objects[k1][k2]);
					}
				}
			} else {
				for (let key in objects) {
					form_data.append(key, obj[key]);
				}
			}
			return form_data;
		},
		clearMessage: function () {
			Posts.errorMessage = "";
			Posts.successMessage = "";
		}
	}
});