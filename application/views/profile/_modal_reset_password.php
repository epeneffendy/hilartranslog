<div class="modal fade" id="modal-reset">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">
                <form id="form-reset" autocomplete="off">

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="New Password">
                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                   value="<?= $user_id ?>"
                                   placeholder="User ID">
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-reset-password">Reset</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("body").off("click", "#btn-reset-password").on("click", "#btn-reset-password", function (e) {
        var data = $('#form-reset').serializeArray();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/profile/reset_password',
            data: data,
            cache: false,
            dataType: 'json',
            success: function (data) {
                location.reload();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
    });
</script>