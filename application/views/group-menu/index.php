<?php
$cruda = ['C' => 'CREATE', 'R' => 'READ', 'U' => 'UPDATE', 'D' => 'DELETE', 'A' => 'APPROVAL'];
?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">List Group Menu</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>

    <div class="card-header">
        <a href="<?= base_url('groupMenu/create') ?>" class="btn btn-success btn-sm float-right">Create Group Menu</a>
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
                <th>Child Menu</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td>
                        <?php foreach ($item['details']['group'] as $group => $val): ?>
                            <span class="badge badge-primary"><?= $group ?></span>
                        <?php endforeach; ?>

                        <?php foreach ($item['details']['menu'] as $menu => $val): ?>
                            <?php $lact = ""; ?>
                            <?php foreach ($cruda as $act => $keterangan) : ?>
                                <?php if (in_array($act, $val)) {
                                    $label = '';
                                    if ($act == 'C') {
                                        $label = 'success';
                                    } elseif ($act == 'R') {
                                        $label = 'info';
                                    } elseif ($act == 'U') {
                                        $label = 'warning';
                                    } elseif ($act == 'D') {
                                        $label = 'danger';
                                    } elseif ($act == 'A') {
                                        $label = 'primary';
                                    }

                                    $lact .= '<span class="badge badge-' . $label . '">' . $act . '</span>&nbsp;&nbsp;';
                                } ?>

                            <?php endforeach; ?>
                            <span class="badge badge-secondary"><?= $menu .'&nbsp;&nbsp;' . $lact ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('groupMenu/update/' . encrypt_url($item['id'])) ?>"
                           class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>