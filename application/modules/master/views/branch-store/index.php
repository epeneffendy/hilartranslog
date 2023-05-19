<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Branch Store</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['branch-store[C]']))) : ?>
            <a href="<?= base_url('master/branchStore/create') ?>" class="btn btn-success btn-sm float-right">Create Branch Store</a>
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
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) :
                ?>

                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <td><?= $item->name ?></td>
                            <td><?= $item->address ?></td>
                            <td><?= $item->phone ?></td>
                            <td>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['branch-store[R]']))) : ?>
                                    <a href="<?= base_url('master/branchStore/view/' . encrypt_url($item->id)) ?>" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i></a>
                                <?php endif; ?>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['branch-store[U]']))) : ?>
                                    <a href="<?= base_url('master/branchStore/update/' . encrypt_url($item->id)) ?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['branch-store[D]']))) : ?>
                                    <a href="<?= base_url('master/branchStore/delete/' . encrypt_url($item->id)) ?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
