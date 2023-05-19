<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">List Profile</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['profile[C]']))) : ?>
            <a href="<?= base_url('profile/create') ?>" class="btn btn-success btn-sm float-right">Create Profile</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('failed')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('failed'); ?>
            </div>
        <?php endif; ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Typeuser</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['username'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['typeuser'] ?></td>
                        <td>
                            <?php if ($item['status'] == 1): ?>
                                <span class="right badge badge-success">Active</span>
                            <?php else: ?>
                                <span class="right badge badge-danger">Blocked</span>
                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['profile[R]']))) : ?>
                                <a href="<?= base_url('profile/view/' . encrypt_url($item['user_id'])) ?>"
                                   class="btn btn-warning btn-xs"><i class="fas fa-eye"></i></a>
                            <?php endif; ?>
                            <?php if ($item['status'] == 1) : ?>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['profile[U]']))) : ?>
                                    <a href="<?= base_url('profile/update/' . encrypt_url($item['user_id'])) ?>"
                                       class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                                <?php if ($item['typeuser_id'] != 1) : ?>
                                    <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['profile[D]']))) : ?>
                                        <a href="<?= base_url('profile/blocked/' . encrypt_url($item['user_id'])) ?>"
                                           class="btn btn-danger btn-xs"><i class="fas fa-ban"> Block</i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic">Data is empty!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>