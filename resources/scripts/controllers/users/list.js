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
			template: "<span class='btn btn-primary btn-block' v-bind:class='uuid' " +
				"@click='add_friendship({ id })'><i class='fa fa-users'></i> Add Friend</span>",
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
			template: "<span class='btn btn-danger btn-block' v-bind:class='uuid' " +
				"@click='undo_friendship({ id })'><i class='fa fa-close'></i> Undo Friendship</span>",
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
			template: "<span class='btn btn-warning btn-block' v-bind:class='uuid' " +
				"disabled='disabled'><i class='fa fa-check'></i> Invited</span>"
		},
		"btn-accept-reject": {
			data: function () {
				return {
					uuid: `btn-accept-reject-uuid-${this.$parent.$data.uuid++}`
				}
			},
			props: ["id"],
			template: "<div v-bind:class='uuid'><div class='col-md-2 col-centered'><p>" +
				"<span @click='accept_reject(1, { id })' class='btn btn-success btn-block'>" +
				"<i class='fa fa-check'></i> Accept</span></p></div>" +
				"<div class='col-md-2 col-centered'><p>" +
				"<span @click='accept_reject(0, { id })' class='btn btn-danger btn-block'>" +
				"<i class='fa fa-close'></i> Reject</span></p></div></div>",
			methods: {
				accept_reject: function (decision, friendship) {
					const self = this;
					const params = list.toFormData(friendship);
					axios.post("accept_reject.php", params)
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
		}
	},
	methods: {
		toFormData: function (obj) {
			var form_data = new FormData();
			for (var key in obj) {
				form_data.append(key, obj[key]);
			}
			return form_data;
		},
		clearMessage: function () {
			list.errorMessage = "";
			list.successMessage = "";
		}
	}
});