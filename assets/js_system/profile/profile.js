var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/profile';

$("body").off("click", "#btn-reset").on("click", "#btn-reset", function (e) {
    var key = $(this).attr("data-key");
    load_modal(key);
});

function load_modal(key) {
    $.ajax({
        type: 'POST',
        url: baseUrl + '/profile/load_modal',
        data: {
            key: key
        },
        success: function (data) {
            $("#div-reset").html(data);
            $('#modal-reset').modal('show');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        },
        complete: function () {

        }
    });
}