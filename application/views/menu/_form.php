<?php
$link = 'menu/create';
if (!$isNewRecord) {
    $link = 'menu/update';
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Menu</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>"
                  enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" class="form-control" id="id" name="id"
                           value="<?= (!$isNewRecord) ? $data->id : '' ?>" placeholder="ID">
                    <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                           value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="isNewRecord">

                    <input type="hidden" class="form-control" id="level" name="level"
                           value="<?= (!$isNewRecord) ? $data->level : '' ?>" placeholder="Level">

                    <input type="hidden" class="form-control" id="parent_1" name="parent_1"
                           value="<?= (!$isNewRecord) ? $parent[1] : '' ?>" placeholder="Parent 1">

                    <input type="hidden" class="form-control" id="parent_2" name="parent_2"
                           value="<?= (!$isNewRecord) ? $parent[2] : '' ?>" placeholder="Parent 2">

                    <input type="hidden" class="form-control" id="slug" name="slug"
                           value="<?= (!$isNewRecord) ? $data->slug : '' ?>" placeholder="slug">

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= (!$isNewRecord) ? $data->name : '' ?>" placeholder="Nama Menu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_link" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="link" name="link"
                                   value="<?= (!$isNewRecord) ? $data->link : '' ?>"
                                   placeholder="Link / Function Controller">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_icon" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="icon" name="icon"
                                   value="<?= (!$isNewRecord) ? $data->icon : '' ?>" placeholder="Icon">
                        </div>
                        <div class="col-sm-3">
                            <a href="https://fontawesome.com/v5/search" class="btn btn-default btn-sm" target="_blank">
                                <i class="fab fa-font-awesome"></i>
                            </a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Position</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="position" name="position" style="width: 100%;">
                                        <option value="">-- Select Positon --</option>
                                        <option value="1" <?= (!$isNewRecord) ? $data->type == 1 ? "Selected" : "" : '' ?>>Left</option>
                                        <option value="2" <?= (!$isNewRecord) ? $data->type == 2 ? "Selected" : "" : '' ?>>Top</option>
                                        <option value="4" <?= (!$isNewRecord) ? $data->type == 4 ? "Selected" : "" : '' ?>>Website</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_urutan" class="col-sm-2 col-form-label">Urutan</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="urutan" name="urutan"
                                   value="<?= (!$isNewRecord) ? $data->urutan : '' ?>" placeholder="Urutan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_parent" class="col-sm-2 col-form-label">Parent</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="level_1" name="level_1" style="width: 100%;">
                                    <option value="">-- Select Level 1 --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="level_2" name="level_2" style="width: 100%;">
                                    <option value="">-- Select Level 2 --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Menu' : 'Update Menu' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
