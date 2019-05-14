var list = new Vue({
	el: ".users",
	data: {
		uuid: 0,
		successMessage: "",
		errorMessage: "",
	},
	components: {
		"btn-add-friendship": {
			data: function () {
				return {
					uuid: `btn-add-friendship-uuid-${this.$parent.$data.uuid++}`
				}
			},
			props: ["id"],
			template: "<div v-bind:class='uuid' class='col-md-3 col-centered'><p>" +
				"<span @click='add_friendship({ id })' class='btn btn-primary btn-block'>" +
				"<i class='fa fa-users'></i> Add Friend</span></p></div>",
			methods: {
				add_friendship: function (friendship) {
					const self = this;
					const params = list.toFormData(friendship);
					axios.post("add_friendship.php", params)
						.then(function (response) {
							if (response.data.error) {
								list.clearMessage();
								list.errorMessage = response.data.message;
							} else {
								list.clearMessage();
								const Construct = Vue.extend(list.$options.components["btn-invited"]);
								const target = list.$children.find((children) => {
									return children.$el.className.includes(self.uuid);
								});
								new Construct({
									parent: self.$parent
								}).$mount(target.$el);
							}
						});
				}
			}
		},
		"btn-undo-friendship": {
			data: function () {
				return {
					uuid: `btn-undo-friendship-uuid-${this.$parent.$data.uuid++}`
				}
			},
			props: ["id"],
			template: "<div v-bind:class='uuid' class='col-md-3 col-centered'><p>" +
				"<span @click='undo_friendship({ id })' class='btn btn-danger btn-block'>" +
				"<i class='fa fa-close'></i> Undo Friendship</span></p></div>",
			methods: {
				undo_friendship: function (friendship) {
					const self = this;
					const params = list.toFormData(friendship);
					axios.post("undo_friendship.php", params)
						.then(function (response) {
							if (response.data.error) {
								list.clearMessage();
								list.errorMessage = response.data.message;
							} else {
								list.clearMessage();
								const Construct = Vue.extend(list.$options.components["btn-add-friendship"]);
								const target = list.$children.find((children) => {
									return children.$el.className.includes(self.uuid);
								});
								new Construct({
									parent: self.$parent,
									propsData: {id: response.data.id}
								}).$mount(target.$el);
							}
						});
				}
			}
		},
		"btn-invited": {
			data: function () {
				return {
					uuid: `btn-invited-uuid-${this.$parent.$data.uuid++}`
				}
			},
			template: "<div v-bind:class='uuid' class='col-md-3 col-centered'><p>" +
				"<span class='btn btn-warning btn-block' disabled='disabled'>" +
				"<i class='fa fa-check'></i> Invited</span></p></div>"
		},
		"btn-accept-reject": {
			data: function () {
				return {
					uuid: `btn-accept-reject-uuid-${this.$parent.$data.uuid++}`
				}
			},
			props: ["id"],
			template: "<div v-bind:class='uuid'><div class='col-md-2 col-centered'><p>" +
				"<span @click='accept_reject({ id, accepted: 1 })' class='btn btn-success btn-block'>" +
				"<i class='fa fa-check'></i> Accept</span></p></div>" +
				"<div class='col-md-2 col-centered'><p>" +
				"<span @click='accept_reject({ id, accepted: 0 })' class='btn btn-danger btn-block'>" +
				"<i class='fa fa-close'></i> Reject</span></p></div></div>",
			methods: {
				accept_reject: function (options) {
					const self = this;
					const params = list.toFormData(options);
					axios.post("accept_reject.php", params)
						.then(function (response) {
							if (response.data.error) {
								list.clearMessage();
								list.errorMessage = response.data.message;
							} else {
								list.clearMessage();
								let component = ((options.accepted) ? "btn-undo-friendship" : "btn-add-friendship");
								const Construct = Vue.extend(list.$options.components[component]);
								const target = list.$children.find((children) => {
									return children.$el.className.includes(self.uuid);
								});
								new Construct({
									parent: self.$parent,
									propsData: {id: response.data.id}
								}).$mount(target.$el);
							}
						})
						.catch(function (response) {
							list.clearMessage();
							console.log(response);
						});
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
			list.errorMessage = "";
			list.successMessage = "";
		}
	}
});