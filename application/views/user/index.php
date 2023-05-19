<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">List User</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
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
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Typeuser</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model as $item): ?>
                <tr>
                    <td>
                        <a href="<?= base_url('profile/view/' . encrypt_url($item['user_id'])) ?>"><?= $item['username'] ?></a>
                    </td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['typeuser'] ?></td>
                    <td>
                        <a href="javascript:void(0)" data-id=<?= $item['user_id'] ?>
                        class="btn btn-primary btn-switch-user"><i class="fas fa-random"></i> Switch</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>