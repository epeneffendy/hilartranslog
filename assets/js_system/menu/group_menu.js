var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/groupMenu';

$(document).ready(function () {
    $("body").off("click", "input[class=checkbox-three]").on("click", "input[class=checkbox-three]", function (e) {
        var key = $(this).val();
        var ket = 0;
        if ($(this).is(":checked")) {
            var ket = 1;
        }
        $.ajax({
            url: baseUrl + '/groupMenu/getChecked',
            type: "POST",
            data: {"key": key, "ket": ket},
            cache: false,
            dataType: 'json',
            success: function (data) {
                data.forEach(function (idm) {
                    if (ket == 1) {
                        $("[id='menu-" + idm + "']").prop("checked", true);
                    } else {
                        $("[id='menu-" + idm + "']").prop("checked", false);
                    }
                });
            }
        });
    });
});