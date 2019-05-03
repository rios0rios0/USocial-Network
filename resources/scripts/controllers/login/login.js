var login = new Vue({
	el: "#login-form",
	data: {
		successMessage: "",
		errorMessage: "",
		logDetails: {username: "", password: ""},
	},
	methods: {
		keyMonitor: function (event) {
			if (event.key === "Enter") {
				login.login();
			}
		},
		login: function () {
			var logForm = login.toFormData(login.logDetails);
			axios.post("login/login.php", logForm)
				.then(function (response) {
					if (response.data.error) {
						login.errorMessage = response.data.message;
					} else {
						login.successMessage = response.data.message;
						login.logDetails = {username: "", password: ""};
						setTimeout(function () {
							window.location.href = "/app/controllers/home/index.php";
						}, 750);
					}
				});
		},
		toFormData: function (obj) {
			var form_data = new FormData();
			for (var key in obj) {
				form_data.append(key, obj[key]);
			}
			return form_data;
		},
		clearMessage: function () {
			login.errorMessage = "";
			login.successMessage = "";
		}
	}
});