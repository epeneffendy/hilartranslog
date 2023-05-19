<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
<br>
<br>
<br>
<br>

<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center mb-0">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Blog Article</h1></div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
            <a href="<?= $breadcrumbs[0]['url'] ?>" title="Back to News"><?= $breadcrumbs[0]['label'] ?></a><span aria-hidden="true">›</span><span><?= $breadcrumbs[1]['label'] ?></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php $this->load->view("layouts-web/main_left"); ?>

            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                <div class="blog--list-view">
                    <div class="article">
                        <!-- Article Image -->
                        <a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="<?= base_url(); ?>assets/img/upload/<?= $data->image ?> " src="<?= base_url(); ?>assets/img/upload/<?= $data->image ?> " alt="<?= $data->title ?>"></a>
                        <h1><a href="blog-left-sidebar.html"><?= $data->title ?></a></h1>
                        <ul class="publish-detail">
                            <li><i class="anm anm-user-al" aria-hidden="true"></i>  <?= $data->created_by ?></li>
                            <li><i class="icon anm anm-clock-r"></i> <time datetime="2017-05-02"><?= date('d M Y', $data->created_at) ?></time></li>

                        </ul>
                        <div class="rte">
                            <?= $data->content ?>
                        </div>
                        <hr/>
                    </div>
                    <div class="formFeilds contact-form form-vertical">

                    </div>
                </div>
            </div>
            <!--End Main Content-->

        </div>
    </div>

</div>
<!--End Body Content-->


<?php $this->load->view("layouts-web/main_footer"); ?>
