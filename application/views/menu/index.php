<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">List Menu</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>

    <div class="card-header">
        <a href="<?= base_url('menu/create') ?>" class="btn btn-success btn-sm float-right">Create Menu</a>
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
                <th>Position</th>
                <th>Level</th>
                <th>Urutan</th>
                <th>Link</th>
                <th>Icon</th>
                <th>Parent</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item->name ?></td>
                    <td><?= ($item->type == 1) ? 'Left' : 'Top' ?></td>
                    <td><?= $item->level ?></td>
                    <td><?= $item->urutan ?></td>
                    <td><?= $item->link ?></td>
                    <td><?= $item->icon ?></td>
                    <td><?= $item->parent ?></td>
                    <td>
                        <a href="<?= base_url('menu/update/' . encrypt_url($item->id)) ?>"
                           class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('menu/delete/' . encrypt_url($item->id)) ?>"
                           class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>