var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/setting';

$(document).ready(function () {
    load_setting();
});

$("body").off("click", "#show-modal").on("click", "#show-modal", function (e) {
    var action = $(this).attr("data-action");
    var key = $(this).attr("data-key");
    load_modal(action, key);
});

function load_modal(action, key) {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/setting/setting/load_modal',
        data: {
            action: action,
            key: key
        },
        success: function (data) {
            $("#modal-detail").html(data);
            $('#modal-default').modal('show');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        },
        complete: function () {

        }
    });
}