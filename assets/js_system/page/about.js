var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/about';

$(document).ready(function () {
    load_setting();
});

function load_setting(key) {
    $.ajax({
        url: baseUrl + '/pages/about/load_setting',
        type: "POST",
        data: {},
        async: false,
        cache: false,
        success: function (data) {
            console.log(data);
            $("#div-setting").html(data);
        }
    });
}