<style>
    .old-price{
        text-decoration: line-through;
    }
</style>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Products</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['products[C]']))) : ?>
            <a href="<?= base_url('products/products/create') ?>" class="btn btn-success btn-sm float-right">Create
                Products</a>
        <?php endif; ?>

    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('failed')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('failed'); ?>
            </div>
        <?php endif; ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Kategori</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) :
                    $price = '';
                    if (!empty($item->discount_price)){
                        $dicount = $item->discount_price / 100;
                        $price = $item->price - ($item->price * $dicount);
                    }
                    ?>
                    <tr>
                        <td><?= $item->name ?></td>
                        <td><?= $item->kategori ?></td>
                        <td><?= $item->brand ?></td>
                        <td>
                            <div class="product-price">
                                <span class="<?= (!empty($item->discount_price) ? 'old-price':'price') ?>">Rp. <?= number_format($item->price) ?></span>
                                <?php if (!empty($item->discount_price)): ?>
                                    <br>
                                    <span class="price" style="font-weight: bold">Rp. <?= number_format($price) ?></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td><?= (!empty($item->discount_price)) ? $item->discount_price  . '%' :'' ?></td>
                        <td><?= ($item->status == 1) ? '<div class="btn btn-warning btn-xs">Draft</div>' : '<div class="btn btn-success btn-xs">Publish</div>' ?></td>
                        <td>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['products[R]']))) : ?>
                                <a href="<?= base_url('products/products/view/' . encrypt_url($item->id)) ?>"
                                   class="btn btn-warning btn-xs"><i class="fas fa-eye"></i></a>
                            <?php endif; ?>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['products[U]']))) : ?>
                                <a href="<?= base_url('products/products/update/' . encrypt_url($item->id)) ?>"
                                   class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['products[A]']))) : ?>
                                <?php if ($item->status == 1): ?>
                                    <a href="<?= base_url('products/products/isPublish/' . encrypt_url($item->id)) ?>"
                                       class="btn btn-success btn-xs">Publish</a>
                                    <?php else: ?>
                                    <a href="<?= base_url('products/products/isPublish/' . encrypt_url($item->id)) ?>"
                                       class="btn btn-warning btn-xs">Unpublish</a>
                                    <?php endif; ?>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic">Data is empty!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
