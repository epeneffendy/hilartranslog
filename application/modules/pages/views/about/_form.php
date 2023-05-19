<?php
$link = 'pages/about/update';
?>

<form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>" enctype="multipart/form-data">

    <input type="hidden" class="form-control" id="id" name="id"
           value="<?= $data->id ?>"
           placeholder="ID">


    <div class="form-group row">
        <label for="input_position" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-8">
            <div class="form-group">
                <textarea id="about_desc" name="about_desc"><?= $data->desc ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="input_position" class="col-sm-2 col-form-label">Vision</label>
        <div class="col-sm-8">
            <div class="form-group">
                <textarea id="about_vision" name="about_vision"><?= $data->vision ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="input_position" class="col-sm-2 col-form-label">Mision</label>
        <div class="col-sm-8">
            <div class="form-group">
                <textarea id="about_mision" name="about_mision"><?= $data->mision ?></textarea>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit"
                class="btn btn-info float-right">Update Data</button>
    </div>
</form>