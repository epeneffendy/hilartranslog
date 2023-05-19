<style>
    .old-price{
        text-decoration: line-through;
    }

    .mini-products-list li .product-image {
        width: 25%;
        float: left;
    }
</style>
<?php
    $price = '';
    if (!empty($model->discount_price)){
        $dicount = $model->discount_price / 100;
        $price = $model->price - ($model->price * $dicount);
    }
?>



<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Product</h3>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        <a href="<?= base_url('products/products/update/' . encrypt_url($model->id)) ?>"
                           class="btn btn-block bg-gradient-info btn-sm"> Update</a>
                    </div>
                    <div class="p-2">
                        <?php if ($model->status == 1): ?>
                            <a href="<?= base_url('products/products/isPublish/' . encrypt_url($model->id)) ?>"
                               class="btn btn-block bg-gradient-success btn-sm"> Publish</a>
                        <?php endif; ?>

                        <?php if ($model->status == 2): ?>
                            <a href="<?= base_url('products/products/isPublish/' . encrypt_url($model->id)) ?>"
                               class="btn btn-block bg-gradient-warning btn-sm"> Unpublish</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table ">
                    <tr>
                        <th width="30%">Name</th>
                        <td width="3%">:</td>
                        <td><?= $model->name  ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Kategori</th>
                        <td width="3%">:</td>
                        <td><?= $model->kategori ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Brand</th>
                        <td width="3%">:</td>
                        <td><?= $model->brand ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Price</th>
                        <td width="3%">:</td>
                        <td>
                            <div class="product-price">
                                <span class="<?= (!empty($model->discount_price) ? 'old-price':'price') ?>">Rp. <?= number_format($model->price) ?></span>
                                <?php if (!empty($model->discount_price)): ?>
                                    <br>
                                    <span class="price" style="font-weight: bold">Rp. <?= number_format($price) ?></span>
                                <?php endif; ?>
                            </div>
                    </tr>
                    <?php if (!empty($model->discount_price)): ?>
                        <tr>
                            <th width="30%">Discount Price</th>
                            <td width="3%">:</td>
                            <td><?= number_format($model->discount_price) ?>%</td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <th width="30%">Short Description</th>
                        <td width="3%">:</td>
                        <td><?= $model->short_description ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Description</th>
                        <td width="3%">:</td>
                        <td><?= $model->description ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <div class="product-image">
                        <img class="primary blur-up lazyload"
                             data-src="<?= base_url(); ?>assets/img/upload/<?= $model->image ?>"
                             src="<?= base_url(); ?>assets/img/upload/<?= $model->image ?>"
                             alt="image" title="product" style="width: 100%">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12" style="margin-top:20px;margin-left:5px;">
                <legend style="font-size:14px;">Online Store</legend>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Store</th>
                        <th>Online Store</th>
                        <th>Url</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($detail)): ?>
                        <?php
                        $no = 1;
                        foreach ($detail as $temp): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $temp->store_name ?></td>
                                <td><?= ucwords($temp->type_store) ?></td>
                                <td><?= $temp->url ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; font-style: italic">Tidak Ada Barang!</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>