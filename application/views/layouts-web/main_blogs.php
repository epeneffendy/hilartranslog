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
            <div class="wrapper"><h1 class="page-width">Article</h1></div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span><?= $breadcrumbs[0]['label'] ?></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php $this->load->view("layouts-web/main_left"); ?>

            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">

                <div class="blog--list-view blog--grid-load-more">
                    <?php foreach ($data as $item): ?>
                    <div class="article">
                        <!-- Article Image -->
                        <a class="article_featured-image" href="<?= base_url('web/blogArticle/' . $item['slug']) ?>"><img class="blur-up lazyload" data-src="<?= base_url(); ?>assets/img/upload/<?= $item['image'] ?>" src="<?= base_url(); ?>assets/img/upload/<?= $item['image'] ?>" alt="<?= $item['title'] ?>"></a>
                        <h2 class="h3"><a href="<?= base_url('web/blogArticle/' . $item['slug']) ?>"><?= $item['title'] ?></a></h2>
                        <ul class="publish-detail">
                            <li><i class="anm anm-user-al" aria-hidden="true"></i>  <?= $item['created_by'] ?></li>
                            <li><i class="icon anm anm-clock-r"></i> <time datetime="2017-05-02"><?= $item['created_at'] ?></time></li>

                        </ul>
                        <div class="rte">
                            <p><?= $item['short'] ?></p>
                        </div>
                        <p><a href="<?= base_url('web/blogArticle/' . $item['slug']) ?>" class="btn btn-secondary btn--small">Baca Lanjutan<i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>

</div>
<!--End Body Content-->


<?php $this->load->view("layouts-web/main_footer"); ?>
