var Base64 = {
	_keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", encode: function (e) {
		var t = "";
		var n, r, i, s, o, u, a;
		var f = 0;
		e = Base64._utf8_encode(e);
		while (f < e.length) {
			n = e.charCodeAt(f++);
			r = e.charCodeAt(f++);
			i = e.charCodeAt(f++);
			s = n >> 2;
			o = (n & 3) << 4 | r >> 4;
			u = (r & 15) << 2 | i >> 6;
			a = i & 63;
			if (isNaN(r)) {
				u = a = 64
			} else if (isNaN(i)) {
				a = 64
			}
			t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
		}
		return t
	}, decode: function (e) {
		var t = "";
		var n, r, i;
		var s, o, u, a;
		var f = 0;
		e = e.replace(/++[++^A-Za-z0-9+/=]/g, "");
		while (f < e.length) {
			s = this._keyStr.indexOf(e.charAt(f++));
			o = this._keyStr.indexOf(e.charAt(f++));
			u = this._keyStr.indexOf(e.charAt(f++));
			a = this._keyStr.indexOf(e.charAt(f++));
			n = s << 2 | o >> 4;
			r = (o & 15) << 4 | u >> 2;
			i = (u & 3) << 6 | a;
			t = t + String.fromCharCode(n);
			if (u != 64) {
				t = t + String.fromCharCode(r)
			}
			if (a != 64) {
				t = t + String.fromCharCode(i)
			}
		}
		t = Base64._utf8_decode(t);
		return t
	}, _utf8_encode: function (e) {
		e = e.replace(/\r\n/g, "n");
		var t = "";
		for (var n = 0; n < e.length; n++) {
			var r = e.charCodeAt(n);
			if (r < 128) {
				t += String.fromCharCode(r)
			} else if (r > 127 && r < 2048) {
				t += String.fromCharCode(r >> 6 | 192);
				t += String.fromCharCode(r & 63 | 128)
			} else {
				t += String.fromCharCode(r >> 12 | 224);
				t += String.fromCharCode(r >> 6 & 63 | 128);
				t += String.fromCharCode(r & 63 | 128)
			}
		}
		return t
	}, _utf8_decode: function (e) {
		var t = "";
		var n = 0;
		var r = c1 = c2 = 0;
		while (n < e.length) {
			r = e.charCodeAt(n);
			if (r < 128) {
				t += String.fromCharCode(r);
				n++
			} else if (r > 191 && r < 224) {
				c2 = e.charCodeAt(n + 1);
				t += String.fromCharCode((r & 31) << 6 | c2 & 63);
				n += 2
			} else {
				c2 = e.charCodeAt(n + 1);
				c3 = e.charCodeAt(n + 2);
				t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
				n += 3
			}
		}
		return t
	}
}
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
				"                   <a v-if='canLike' @click.prevent='like_post({ id })' href='#'>Like</a>" +
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
				"                           <img v-bind:src='comment.user.image.url' alt=''></a>" +
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
								self.nLikes++;
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
								self.comments.push(response.data.comment);
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