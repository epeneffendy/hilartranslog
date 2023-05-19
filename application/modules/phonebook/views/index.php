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
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['phonebook[C]']))) : ?>
            <a href="<?= base_url('phonebook/phonebook/create') ?>" class="btn btn-success btn-sm float-right">Create Data</a>
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
                <th>Phone Number</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->first_name .' '. $item->last_name ?></td>
                        <td><?= $item->phone_number ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= ($item->status == 0) ? '<div class="btn btn-warning btn-xs">Non Active</div>' : '<div class="btn btn-success btn-xs">Active</div>' ?></td>
                        <td>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['phonebook[U]']))) : ?>
                                <a href="<?= base_url('phonebook/phonebook/update/' . encrypt_url($item->id)) ?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['phonebook[A]']))) : ?>
                                <?php if ($item->status == 1): ?>
                                    <a href="<?= base_url('phonebook/phonebook/isPublish/' . encrypt_url($item->id)) ?>"
                                       class="btn btn-warning btn-xs">Disable</a>
                                <?php else: ?>
                                    <a href="<?= base_url('phonebook/phonebook/isPublish/' . encrypt_url($item->id)) ?>"
                                       class="btn btn-success btn-xs">Enable</a>
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
