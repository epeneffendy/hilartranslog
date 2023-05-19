<?php $this->load->view("layouts/main_header"); ?>
<?php $this->load->view("layouts/main_nav"); ?>
<?php $this->load->view("layouts/main_left"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $title ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <?php foreach ($breadcrumbs as $item) : ?>
                                <li class="breadcrumb-item <?= isset($item['active']) ? $item['active'] : '' ?>">
                                    <?= (isset($item['url']) ? '<a href="' . $item['url'] . '">' : '') ?>
                                    <?= $item['label'] ?>
                                    <?= (isset($item['url']) ? '</a>' : '') ?>
                                </li>
                            <?php endforeach; ?>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php $this->load->view($main_content); ?>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $this->load->view("layouts/main_footer"); ?>