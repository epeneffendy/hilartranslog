var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var controller = baseUrl + '/menu';

$(document).ready(function () {
    var isNewRecord = $("#isNewRecord").val();
    if (isNewRecord == 'false') {
        var key = $("#position").val();
        var level = $("#level").val();

        if (level == 2) {
            change_position(key, $("#parent_1").val());
        } else if (level == 3) {
            change_position(key, $("#parent_1").val());
            change_parent($("#parent_1").val(), $("#parent_2").val());
        }
    }
});

$(".level_1").select2({
    placeholder: "Select Level 1",
    allowClear: true
});

$(".level_2").select2({
    placeholder: "Select Level 2",
    allowClear: true
});

$(".js-example-placeholder-single").select2({
    placeholder: "Select a state",
    allowClear: true
});

$("#position").change(function () {
    var key = $("#position").val();
    change_position(key, '', '');
});

function change_position(key, parent) {
    $.ajax({
        url: baseUrl + '/menu/getParent',
        data: {'key': key},
        type: 'POST',
        cache: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            if ($("#isNewRecord").val() == 'true') {
                html += '<option value="">-- Select Level 1 --</option>';
            }
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
            }
            $('#level_1').html(html);
            $('#level_1').val(parent);

        }
    });
}

function change_parent(key, parent_2) {
    console.log("aa" + key);
    $.ajax({
        url: baseUrl + '/menu/getChild',
        data: {'key': key},
        type: 'POST',
        cache: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            if ($("#isNewRecord").val() == 'true') {
                html += '<option value="">-- Select Level 2 --</option>';
            }
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
            }
            $('#level_2').html(html);
            $('#level_2').val(parent_2);
        }
    });
}

$("#level_1").change(function () {
    var key = $("#level_1").val();
    change_parent(key);
});