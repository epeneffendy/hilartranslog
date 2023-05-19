<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Link</h4>
            </div>
            <div class="modal-body">
                <form id="form-detail" autocomplete="off">

                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id" name="id"
                               value="<?= ($action == 'edit') ? $data_temp->id : '' ?>"
                               placeholder="ID">
                    </div>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="store_name" name="store_name"
                                   value="<?= ($action == 'edit') ? $data_temp->store_name : '' ?>"
                                   placeholder="Store Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Store</label>
                        <div class="col-sm-6">
                            <select class="form-control select2" id="store" name="store"
                                    style="width: 100%;">
                                <option>--Select Store--</option>
                                <option value="shopee" <?= ($action == 'edit') ? $item->store == 'shopee' ? "Selected" : "" : '' ?> >
                                    Shopee
                                </option>
                                <option value="tokopedia" <?= ($action == 'edit') ? $item->store == 'tokopedia' ? "Selected" : "" : '' ?> >
                                    Tokopedia
                                </option>
                                <option value="lazada" <?= ($action == 'edit') ? $item->store == 'lazada' ? "Selected" : "" : '' ?> >
                                    Lazada
                                </option>
                                <option value="bukalapak" <?= ($action == 'edit') ? $item->store == 'bukalapak' ? "Selected" : "" : '' ?> >
                                    Bukalapak
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Store</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="url" name="url"
                                   value="<?= ($action == 'edit') ? $data_temp->url : '' ?>"
                                   placeholder="URL Store">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-detail">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

    });

    $("body").off("click", "#btn-save-detail").on("click", "#btn-save-detail", function (e) {
        var data = $('#form-detail').serializeArray();
        data.push({name: "action", value: "<?= $action ?>"});
        $.ajax({
            type: 'POST',
            url: baseUrl + '/products/products/save_detail_temp',
            data: data,
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data.success);
                if (data.success == true) {
                    $('#modal-default').modal('toggle');
                    load_detail();
                } else {
                    alert(data.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
    });
</script>