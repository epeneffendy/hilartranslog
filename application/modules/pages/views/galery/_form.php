<?php
$link = 'pages/galery/create';
if (!$isNewRecord) {
    $link = 'pages/galery/update';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Galery</h3>
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
                        <label for="input_name" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="<?= (!$isNewRecord) ? $data->title : '' ?>" placeholder="Title">
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
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Galery' : 'Update Galery' ?></button>
                    </div>
            </form>


        </div>
    </div>
</div>

