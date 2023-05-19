<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
<br>
<br>
<br>
<br>

<div id="page-content">
    <?php if (isset($imageHeader)): ?>
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class="blur-up lazyload"
                                                     data-src="<?= base_url(); ?>assets/img/upload/<?= $imageHeader->image ?> "
                                                     src="<?= base_url(); ?>assets/img/upload/<?= $imageHeader->image ?> "
                                                     alt="<?= $imageHeader->name ?>" title="<?= $imageHeader->name ?>"/></div>
            <div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width"><?= $imageHeader->title ?></h1></div>
        </div>
    </div>
    <?php endif; ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <?php $this->load->view("layouts-web/main_left"); ?>

            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                <div class="productList product-load-more">
                    <div class="toolbar">
<!--                        <div class="filters-toolbar-wrapper">-->
<!--                            <div class="row">-->
<!--                                <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">-->
<!--                                    <a href="shop-left-sidebar.html" title="Grid View"-->
<!--                                       class="change-view change-view--active">-->
<!--                                        <img src="--><?//= base_url(); ?><!--assets/frontend/template/images/grid.jpg"-->
<!--                                             alt="Grid"/>-->
<!--                                    </a>-->
<!--                                    <a href="shop-listview.html" title="List View" class="change-view">-->
<!--                                        <img src="--><?//= base_url(); ?><!--assets/frontend/template/images/list.jpg"-->
<!--                                             alt="List"/>-->
<!--                                    </a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            <?php if (count($products) > 0): ?>
                                <?php foreach ($products as $item):
                                    $isDiscount = false;
                                    if (!empty($item->discount_price)) {
                                        $isDiscount = true;
                                        $dicount = $item->discount_price / 100;
                                        $price = $item->price - ($item->price * $dicount);
                                    }
                                    ?>
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                        <div class="product-image">
                                            <a href="<?= base_url('web/productDetail/' . $item->slug) ?>">
                                                <img class="primary blur-up lazyload"
                                                     data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                     src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                     alt="image" title="product">
                                                <img class="hover blur-up lazyload"
                                                     data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                     src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                     alt="image" title="product">
                                            </a>
                                            <form class="variants add">
                                                <a href="<?= base_url('web/productDetail/' . $item->slug) ?>"
                                                   class="btn btn-addto-cart" type="button">Lihat Detail</a>
                                            </form>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-name">
                                                <a href="#"><?= $item->name ?></a>
                                            </div>
                                            <div class="product-price">
                                                <?php if ($isDiscount): ?>
                                                    <span class="old-price">Rp. <?= number_format($item->price) ?></span>
                                                <?php endif; ?>
                                                <span class="price">Rp. <?= ($isDiscount) ? number_format($price) : number_format($item->price) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("layouts-web/main_footer"); ?>
