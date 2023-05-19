<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
<?php
$price = '';
$isDiscount = false;
if (!empty($model->discount_price)) {
    $isDiscount = true;
    $dicount = $model->discount_price / 100;
    $price = $model->price - ($model->price * $dicount);
}
?>
<br>
<br>
<br>
<br>
<!--Body Content-->
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="<?= $breadcrumbs[0]['url'] ?>"
                   title="Back to the home page"><?= $breadcrumbs[0]['label'] ?></a><span
                        aria-hidden="true">›</span><span><?= $breadcrumbs[1]['label'] ?></span>
            </div>
        </div>
        <!--End Breadcrumb-->

        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="blur-up lazyload zoompro"
                                         data-zoom-image="<?= base_url(); ?>assets/img/upload/<?= $model->image ?>"
                                         alt="" src="<?= base_url(); ?>assets/img/upload/<?= $model->image ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title"><?= $model->name ?></h1>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">Regular price</span>
                                <?php if ($isDiscount): ?>
                                    <s id="ComparePrice-product-template"><span
                                                class="money">Rp. <?= number_format($model->price) ?></span></s>
                                <?php endif; ?>

                                <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                <span id="ProductPrice-product-template"><span
                                                            class="money">Rp. <?= ($isDiscount) ? number_format($price) : number_format($model->price) ?></span></span>
                                            </span>
                                <?php if ($isDiscount): ?>
                                    <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                                <span>Kamu Hemat</span>
                                                <span id="SaveAmount-product-template"
                                                      class="product-single__save-amount">
                                                <span class="money">Rp. <?= number_format($model->price * ($model->discount_price / 100)) ?></span>
                                                </span>
                                                <span class="off">(<span><?= $model->discount_price ?></span>%)</span>
                                            </span>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php if (!empty($model->short_description)) : ?>
                            <div class="product-single__description rte">
                                <?= $model->short_description ?>
                            </div>
                        <?php endif; ?>
                        <p id="freeShipMsg" class="freeShipMsg" data-price="199">Kategori : <b><?= $kategori ?></b></p>
                        <?php foreach ($details as $item): ?>
                            <a target="_blank" href="<?= $item->url ?>"
                               class="btn btn--small btn--secondary btn--share share-facebook"
                               title="<?= $item->store_name ?>" style="margin-bottom: 1em">
                                 <span
                                        class="share-title" aria-hidden="true"><?= $item->store_name ?></span>
                            </a>
                        <?php endforeach; ?>
                        <br>
                    </div>
                </div>
            </div>
            <!--End-product-single-->

            <!--Product Tabs-->
            <div class="tabs-listing">
                <ul class="product-tabs">
                    <li rel="tab1"><a class="tablink">Product Details</a></li>
                </ul>
                <div class="tab-container">
                    <div id="tab1" class="tab-content">
                        <div class="product-description rte">
                            <?= $model->description ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Product Tabs-->
            <?php if (count($relateds) > 0): ?>
            <div class="related-product grid-products">
                <header class="section-header">
                    <h2 class="section-header__title text-center h2"><span>Product Terkait</span></h2>

                </header>
                <div class="productPageSlider">
                        <?php foreach ($relateds as $item):
                            $price = '';
                            $isDiscount = false;
                            if (!empty($item->discount_price)) {
                                $isDiscount = true;
                                $dicount = $item->discount_price / 100;
                                $price = $item->price - ($item->price * $dicount);
                            }
                            ?>
                            <div class="col-12 item">
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
                                </div>
                                <div class="product-details text-center">
                                    <div class="product-name">
                                        <a href="<?= base_url('web/productDetail/' . $item->slug) ?>"><?= strtoupper($item->name) ?></a>
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
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php $this->load->view("layouts-web/main_footer"); ?>

