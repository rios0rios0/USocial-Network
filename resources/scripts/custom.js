$(document).ready(function () {
	let pathname = window.location.pathname;
	$(".nav > li > a[href*='" + pathname + "']").parent().addClass("active");
});