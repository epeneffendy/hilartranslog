<?php
$link = 'clients/client/create';
if (!$isNewRecord) {
    $link = 'clients/client/update';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Products</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>"
                  enctype="multipart/form-data">
                <div class="card-body">
                    <!-- HIDDEN FORM -->
                    <div class="form-group row">

                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                                   value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="isNewRecord">

                            <input type="hidden" class="form-control" id="id" name="id"
                                   value="<?= (!$isNewRecord) ? $data->id : '' ?>" placeholder="id">

                        </div>
                    </div>
                    <!-- HIDDEN FORM -->

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Client</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="client" name="client"
                                   value="<?= (!$isNewRecord) ? $data->client : '' ?>" placeholder="Client">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="status" name="status"
                                        style="width: 100%;">
                                    <option value="0">-- Select Status --</option>
                                    <option value="1" <?= (!$isNewRecord) ? $data->status == 1 ? "Selected" : "" : '' ?>>
                                        Draft
                                    </option>
                                    <option value="2" <?= (!$isNewRecord) ? $data->status == 2 ? "Selected" : "" : '' ?>>
                                        Publish
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_logo" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image" value="" placeholder="Image">
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Article' : 'Update Client' ?></button>
                    </div>
            </form>


        </div>
    </div>
</div>

