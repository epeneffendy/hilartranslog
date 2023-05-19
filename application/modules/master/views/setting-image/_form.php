<?php
$link = 'master/settingImage/create';
if (!$isNewRecord) {
    $link = 'master/settingImage/update';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">

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

                            <input type="hidden" class="form-control" id="type" name="type"
                                   value="<?= (!$isNewRecord) ? $data->type : '' ?>" placeholder="id">
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
                        <label for="input_email" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="<?= (!$isNewRecord) ? $data->title: '' ?>" placeholder="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="description" name="description"
                                   value="<?= (!$isNewRecord) ? $data->description : '' ?>" placeholder="description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Size Image</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="size_image" name="size_image"
                                   value="<?= (!$isNewRecord) ? $data->size_image : '' ?>" placeholder="size_image" readonly>
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
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Image' : 'Update Image' ?></button>
                    </div>
            </form>

        </div>

    </div>
</div>
