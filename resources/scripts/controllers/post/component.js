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
					uuid: `post-uuid-${this.$parent.$data.uuid++}`
				}
			},
			props: {
				"id": Number,
				"text": String,
				"created": String,
				"nLikes": Number,
				"nComments": Number,
				"user": Object,
				"comments": Object,
				"canLike": Boolean,
				"canDelete": Boolean
			},
			template:
				"<div class='panel panel-default post' v-bind:class='uuid'>" +
				"   <div class='panel-body'>" +
				"       <div class='row'>" +
				"           <div class='col-sm-2'>" +
				"	            <a v-bind:href='user.url' class='post-avatar thumbnail'>" +
				"                   <img v-bind:src='user.image.url' alt=''>" +
				"                   <div class='text-center'>{{ user.username }}</div></a>" +
				"	            <p class='text-center'>{{ created }}</p>" +
				"	            <div class='likes text-center'>{{ nLikes }} Like{{ (!!(nLikes > 1) ? 's' : '') }}</div>" +
				"	            <div class='likes text-center'>{{ nComments }} Comment{{ (!!(nComments > 1) ? 's' : '') }}</div>" +
				"           </div>" +
				"           <div class='col-sm-10'>" +
				"               <div class='bubble'>" +
				"                   <div class='pointer'><p v-html='text'></p></div>" +
				"                   <div class='pointer-border'></div>" +
				"               </div>" +
				"               <p class='post-actions'>" +
				"                   <a v-if='canLike'>Like</a>" +
				"                   <a v-if='canDelete'>Delete</a>" +
				"               </p>" +
				"               <div class='comment-form'><form class='form-inline'>" +
				"                   <div class='form-group'>" +
				"                       <input type='text' class='form-control' id='comment' name='comment' placeholder='Comment...'>" +
				"                   </div>" +
				"                   <button type='submit' class='btn btn-default'>Add</button></form>" +
				"               </div>" +
				"               <div class='clearfix'></div>" +
				"               <div class='comments'>" +
				"                   <div class='comment' v-for='comment in comments'>" +
				"                       <a v-bind:href='comment.user.url' class='comment-avatar pull-left'>" +
				"                           <img v-bind:src='comment.user.image.url' alt=''></a>" +
				"                       <div class='comment-text'><p v-html='comment.html_text'></p></div>" +
				"                   </div>" +
				"                   <div class='clearfix'></div>" +
				"               </div>" +
				"           </div>" +
				"       </div>" +
				"   </div>" +
				"</div>",
			methods: {
				like: function () {
				},
				comment: function () {
				},
				delete: function () {
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