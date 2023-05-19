<?php
$link = 'master/branchStore/create';
if (!$isNewRecord) {
    $link = 'master/branchStore/update';
}

?>
<div class="row">

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Branch Store</h3>
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
                        <label for="input_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= (!$isNewRecord) ? $data->name : '' ?>" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="address" name="address"
                                   value="<?= (!$isNewRecord) ? $data->address : '' ?>" placeholder="address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="<?= (!$isNewRecord) ? $data->phone : '' ?>" placeholder="phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">URL Location</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="url_maps" name="url_maps"
                                   value="<?= (!$isNewRecord) ? $data->url_maps : '' ?>" placeholder="URL Maps">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">URL Embed</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="url_embed" name="url_embed"
                                   value="<?= (!$isNewRecord) ? $data->url_embed : '' ?>" placeholder="Url Embed">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Branch Store' : 'Update Branch Store' ?></button>
                    </div>
            </form>

        </div>

    </div>
</div>