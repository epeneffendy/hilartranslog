<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Setting</h4>
            </div>
            <div class="modal-body">
                <form id="form-detail" autocomplete="off">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id" name="id"
                               value="<?= ($action == 'edit') ? $data->slug_menu : '' ?>"
                               placeholder="ID">
                    </div>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="menu" name="menu"
                                   value="<?= ($action == 'edit') ? $data->menu : '' ?>"
                                   placeholder="Menu" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <textarea id="content" name="content"><?= $data->content ?></textarea>
                            </div>
                        </div>
                    </div>

                    <?php if (in_array($data->slug_menu, $subContentEnable)): ?>
                        <div class="form-group row">
                            <label for="input_gudang" class="col-sm-2 col-form-label">Sub Content</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <textarea id="desc" name="desc"><?= $data->desc ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(in_array($data->slug_menu, $sectionDisable)): ?>
                        <div class="form-group row">
                            <label for="input_gudang" class="col-sm-2 col-form-label">Enable Section</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox" name="status" id="status" <?= ($data->status == 1) ? 'checked' : '' ?> >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group row">
                        <label for="input_gudang" class="col-sm-2 col-form-label">Enable Content</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="switch">
                                    <input type="checkbox" name="flag" id="flag"  <?= ($data->flag == 1) ? 'checked' : '' ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <?php if (in_array($data->slug_menu, $subContentEnable)): ?>
                        <div class="form-group row">
                            <label for="input_gudang" class="col-sm-2 col-form-label">Enable Sub Content</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox" name="flag_desc" id="flag_desc" <?= ($data->flag_desc == 1) ? 'checked' : '' ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


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
    $(function () {
        // Summernote
        $('#content').summernote();
        $('#desc').summernote();
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })

    $("body").off("click", "#btn-save-detail").on("click", "#btn-save-detail", function (e) {
        var data = $('#form-detail').serializeArray();



        var arr = $('#form-detail').serializeArray(),
            names = (function(){
                var n = [],
                    l = arr.length - 1;
                for(; l>=0; l--){
                    n.push(arr[l].name);
                }

                return n;
            })();

        $('input[type="checkbox"]:not(:checked)').each(function(){
            if($.inArray(this.name, names) === -1){
                arr.push({name: this.name, value: 'off'});
            }
        });
        arr.push({name: "action", value: "<?= $action ?>"});

        $.ajax({
            type: 'POST',
            url: baseUrl + '/setting/setting/update',
            data: arr,
            cache: false,
            dataType: 'json',
            success: function (data) {
                console.log(data.success);
                if (data.success == true) {
                    $('#modal-default').modal('toggle');
                    location.reload()
                } else {
                    alert(data.message);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            }
        });
    })
</script>