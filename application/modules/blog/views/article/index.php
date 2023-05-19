<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Article</h3>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="card-header">
        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['blog-1[C]']))) : ?>
            <a href="<?= base_url('blog/articles/create') ?>" class="btn btn-success btn-sm float-right">Create Article</a>
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
                <th>Title</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($data)) :
                ?>

                <?php foreach ($data as $item) : ?>
                <tr>
                    <td><?= $item->title ?></td>
                    <td><?= date('d M Y', $item->created_at)  ?></td>
                    <td><?= $item->created_by ?></td>
                    <td><?= ($item->status == 1) ? '<div class="btn btn-warning btn-xs">Draft</div>' : '<div class="btn btn-success btn-xs">Publish</div>' ?></td>
                    <td>
                        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['blog-1[R]']))) : ?>
                            <a href="<?= base_url('blog/articles/view/' . encrypt_url($item->id)) ?>"
                               class="btn btn-warning btn-xs"><i class="fas fa-eye"></i></a>
                        <?php endif; ?>
                        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['blog-1[U]']))) : ?>
                            <a href="<?= base_url('blog/articles/update/' . encrypt_url($item->id)) ?>" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                        <?php endif; ?>
                        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['blog-1[A]']))) : ?>
                            <?php if ($item->status == 1): ?>
                                <a href="<?= base_url('blog/articles/isPublish/' . encrypt_url($item->id)) ?>"
                                   class="btn btn-success btn-xs">Publish</a>
                            <?php else: ?>
                                <a href="<?= base_url('blog/articles/isPublish/' . encrypt_url($item->id)) ?>"
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
