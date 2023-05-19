var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/products';

$(document).ready(function () {
    load_detail();
});

function load_detail() {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/products/products/load_detail',
        data: {},
        success: function (data) {
            $("#div-detail").html(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        },
        complete: function () {
        }
    });
}

$("body").off("click", "#show-modal").on("click", "#show-modal", function (e) {
    var action = $(this).attr("data-action");
    var key = $(this).attr("data-key");
    console.log(action);
    console.log(key);
    load_modal(action, key);
});

function load_modal(action, key) {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/products/products/load_modal',
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
