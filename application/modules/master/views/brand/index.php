<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Brand</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['brand[C]']))) : ?>
            <a href="<?= base_url('master/brand/create') ?>" class="btn btn-success btn-sm float-right">Create Brand</a>
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) :
                ?>

                    <?php foreach ($data as $item) : ?>
                        <tr>

                            <td><?= $item->name ?></td>
                            <td><?= $item->description ?></td>
                            <td>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['brand[U]']))) : ?>
                                    <a href="<?= base_url('master/brand/update/' . encrypt_url($item->id)) ?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['brand[D]']))) : ?>
                                    <a href="<?= base_url('master/brand/delete/' . encrypt_url($item->id)) ?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
