<style>
    .old-price{
        text-decoration: line-through;
    }

    .mini-products-list li .product-image {
        width: 25%;
        float: left;
    }
</style>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Article </h3>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        <a href="<?= base_url('blog/articles/update/' . encrypt_url($model->id)) ?>"
                           class="btn btn-block bg-gradient-info btn-sm"> Update</a>
                    </div>
                    <div class="p-2">
                        <?php if ($model->status == 1): ?>
                            <a href="<?= base_url('blog/articles/isPublish/' . encrypt_url($model->id)) ?>"
                               class="btn btn-block bg-gradient-success btn-sm"> Publish</a>
                        <?php endif; ?>

                        <?php if ($model->status == 2): ?>
                            <a href="<?= base_url('blog/articles/isPublish/' . encrypt_url($model->id)) ?>"
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
                        <th width="30%">Title</th>
                        <td width="3%">:</td>
                        <td><?= $model->title ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Created By</th>
                        <td width="3%">:</td>
                        <td><?= $model->created_by ?></td>
                    </tr>

                    <tr>
                        <th width="30%">Created At</th>
                        <td width="3%">:</td>
                        <td><?=  date('d M Y', $model->created_at) ?></td>
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
                <legend style="font-size:25px; font-weight: bold">Content</legend>
                <hr>
                <?= $model->content ?>

            </div>
        </div>

    </div>
</div>