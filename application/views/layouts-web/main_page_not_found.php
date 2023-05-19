<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
<style>
    .empty-page-content h1 {
        font-size: 60px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .empty-page-content h2 {
        font-size: 40px;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>
<!--Body Content-->
<div id="page-content">
    <!-- Lookbook Start -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="empty-page-content text-center">
                    <h1><?= $error_code ?> </h1>
                    <h2> <?= $title ?></h2>
                    <p>The page you requested does not exist.</p>
                    <p><a href="<?= base_url('web/index') ?>" class="btn btn--has-icon-after">Continue shopping <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Lookbook Start -->
</div>
<!--End Body Content-->

<?php $this->load->view("layouts-web/main_footer"); ?>

