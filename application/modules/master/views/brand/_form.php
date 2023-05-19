<?php
$link = 'master/brand/create';
if (!$isNewRecord) {
    $link = 'master/brand/update';
}

?>
<div class="row">

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Brands</h3>
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

                            <input type="hidden" class="form-control" id="slug" name="slug"
                                   value="<?= (!$isNewRecord) ? $data->slug : '' ?>" placeholder="id">
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
                        <label for="input_email" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="Mutter" name="description"
                                   value="<?= (!$isNewRecord) ? $data->description : '' ?>" placeholder="description">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="input_phone" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="description" name="description" value="(!$isNewRecord) ? $data->description : '' ?>" placeholder="Description">
                        </div>
                    </div>

                </div> -->


                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Brand' : 'Update Brand' ?></button>
                    </div>
            </form>

        </div>

    </div>
</div>