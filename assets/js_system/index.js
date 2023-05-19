var getUrl = window.location;
var baseUrl =
	getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];
var controller = baseUrl;
$(document).ready(function () {
	//alert("Please index js");
});
$(".btn-switch-admin").click(function (e) {
	id = $(this).data('id');
	console.log(id);
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
				url: controller + "/user/switch_user_back",
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
