var getUrl = window.location;
var baseUrl =
	getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];
var controller = baseUrl + "/user";
$(document).ready(function () {
	//alert("Please enter a valid");
});

$(".btn-switch-user").click(function (e) {
	id = $(this).data("id");
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Anda Akan Pindah Acces User",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya,switch user",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: controller + "/switch_user",
				dataType: "JSON",
				type: "POST",
				data: {
					id: id,
				},

				success: function (data) {
					if (data.status) {
						console.log("success");
						window.location.href = baseUrl + "/site/dashboard";
					} else {
						console.log("filed");
						window.location.href = baseUrl + "/user";
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {},
			}); //end ajax
		}
	});
});
