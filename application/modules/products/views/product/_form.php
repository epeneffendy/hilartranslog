<?php
$link = 'products/products/create';
if (!$isNewRecord) {
    $link = 'products/products/update';
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
                        <label for="input_position" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="kategori_id" name="kategori_id"
                                        style="width: 100%;">
                                    <option value="0">-- Select Kategori --</option>
                                    <?php foreach ($kategori as $item): ?>
                                        <option value="<?= $item->id ?>" <?= (!$isNewRecord) ? $data->kategori_id == $item->id ? "Selected" : "" : '' ?>><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="brand_id" name="brand_id"
                                        style="width: 100%;">
                                    <option value="0">-- Select Brand --</option>
                                    <?php foreach ($brand as $item): ?>
                                        <option value="<?= $item->id ?>" <?= (!$isNewRecord) ? $data->brand_id == $item->id ? "Selected" : "" : '' ?>><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" id="price" name="price"
                                   value="<?= (!$isNewRecord) ? $data->price : '' ?>" placeholder="Price">
                        </div>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" id="discount_price" name="discount_price"
                                   value="<?= (!$isNewRecord) ? $data->discount_price : '' ?>" placeholder="Discount">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Short Desciption</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <textarea id="short_desciption" name="short_desciption"><?= (!$isNewRecord) ? $data->short_description : ''; ?></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Desciption</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <textarea id="long_desciption" name="long_desciption"><?= (!$isNewRecord) ? $data->description : ''; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_position" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" id="status" name="status"
                                        style="width: 100%;">
                                    <option value="0">-- Select Brand --</option>
                                    <option value="1" <?= (!$isNewRecord) ? $data->status == 1 ? "Selected" : "" : '' ?>>
                                        Draft
                                    </option>
                                    <option value="2" <?= (!$isNewRecord) ? $data->status == 2 ? "Selected" : "" : '' ?>>
                                        Publish
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="top_seller" name="top_seller" value="top_seller"  <?= (!$isNewRecord) ? $data->top_seller == 'top_seller' ? "checked" : "" : '' ?>>
                            <label for="top_seller" class="custom-control-label">Top Seller</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_logo" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="image" name="image" value="" placeholder="Image">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12" style="margin-top:20px;margin-left:5px;">

                            <legend style="font-size:14px;">Link Online Store
                                <hr>
                                <div id="btn-add" style="text-align:right">
                                    <button class="btn btn-primary btn-xs pull-right btn-add"
                                            style="margin-bottom:10px;" type="button" id="show-modal"
                                            data-action="new" data-key="">
                                        Add Link
                                    </button>
                                </div>
                            </legend>

                            <div class="text-center"><span id="load-detail">&nbsp;</span></div>
                            <div id="div-detail"></div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Product' : 'Update Product' ?></button>
                    </div>
            </form>


        </div>
    </div>
</div>

<div id="modal-detail"></div>