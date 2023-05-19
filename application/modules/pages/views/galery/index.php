<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Galery</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
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
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->title ?></td>
                        <td><?= (!empty($item->image) ? '&#10003;' : '&#x2717;') ?></td>
                        <td>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['galery[U]']))) : ?>
                                <a href="<?= base_url('pages/galery/update/' . encrypt_url($item->id)) ?>"
                                   class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['galery[A]']))) : ?>
                                <?php if ($item->status == 2): ?>
                                    <a href="<?= base_url('pages/galery/isPublish/' . encrypt_url($item->id)) ?>"
                                       class="btn btn-danger btn-xs">Delete Image</a>
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
