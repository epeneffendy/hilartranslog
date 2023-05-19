var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/company_profile';

$(document).ready(function () {
    load_setting();
});

function load_setting(key) {
    $.ajax({
        url: baseUrl + '/companyProfile/load_setting',
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