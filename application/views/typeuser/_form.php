<?php
$link = 'typeuser/create';
if (!$isNewRecord) {
    $link = 'typeuser/update';
}

?>


<div class="row">

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Typeuser</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- HIDDEN FORM -->
                    <div class="form-group row">

                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord" value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="isNewRecord">

                            <input type="hidden" class="form-control" id="id" name="id" value="<?= (!$isNewRecord) ? $data->id : '' ?>" placeholder="id">
                        </div>
                    </div>
                    <!-- HIDDEN FORM -->


                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="code" name="code" value="<?= (!$isNewRecord) ? $data->code : '' ?>" placeholder="Code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="value" name="value" value="<?= (!$isNewRecord) ? $data->value : '' ?>" placeholder="Value">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_phone" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="description" name="description" value="<?= (!$isNewRecord) ? $data->description : '' ?>" placeholder="Description">
                        </div>
                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Profile' : 'Update Type User' ?></button>
                </div>
            </form>

        </div>

    </div>
</div>