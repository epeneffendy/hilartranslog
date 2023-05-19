<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
    <!--Body Content-->
    <div id="page-content">
        <!--Home slider-->
        <div class="slideshow slideshow-wrapper pb-section sliderFull">
            <div class="home-slideshow">

                <?php
                $headers = $this->db->query("select * from master_image where type= '1' ")->result();
                foreach ($headers as $item) :
                    ?>
                    <div class="slide">
                        <div class="blur-up lazyload bg-size">
                            <img class="blur-up lazyload bg-img"
                                 data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                 src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                 alt="<?= $item->title ?>" title="<?= $item->title ?>"/>
                            <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                                <div class="slideshow__text-content bottom">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title"><?= $item->title ?></h2>
                                        <span class="mega-subtitle slideshow__subtitle"><?= $item->description ?></span>
                                        <!--                                        <span class="btn">Shop now</span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <!--End Home slider-->
        <!--Collection Tab slider-->
        <div class="tab-slider-product section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Top Seller</h2>
                            <p>Jelajahi berbagai macam product kami</p>
                        </div>
                        <div class="tabs-listing">
                            <div class="tab_container">
                                <div id="tab1" class="tab_content grid-products">
                                    <div class="productSlider">
                                        <?php if (count($products) > 0): ?>
                                            <?php foreach ($products as $item) :
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
                                                                 data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                                                 src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                                                 alt="image" title="product">
                                                            <img class="hover blur-up lazyload"
                                                                 data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                                                 src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                                                 alt="image" title="product">
                                                        </a>
                                                        <form class="variants add" action="<?= base_url('contact'); ?>">
                                                            <a href="<?= base_url('web/productDetail/' . $item->slug) ?>"
                                                               class="btn btn-addto-cart" type="button" tabindex="0">Lihat
                                                                Detail
                                                            </a>
                                                        </form>

                                                    </div>
                                                    <div class="product-details text-center">
                                                        <div class="product-name">
                                                            <a href="short-description.html"><?= $item->name ?></a>
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
        </div>
        <!--Collection Tab slider-->

        <!--Logo Slider-->
        <div class="section logo-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="logo-bar">
                            <?php
                            $headers = $this->db->query("select * from master_image where type= '2' ")->result();
                            foreach ($headers as $item) :
                                ?>
                                <div class="logo-bar__item">
                                    <img src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                         alt="<?= $item->title ?>"
                                         title="<?= $item->title ?>"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Logo Slider-->

        <!--Featured Product-->
        <div class="product-rows section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Product Kami</h2>
                            <p>Jelajahi berbagai macam product kami</p>
                        </div>
                    </div>
                </div>
                <div class="grid-products">
                    <div class="row">
                        <?php if (count($productLama) > 0): ?>
                            <?php foreach ($productLama as $item):
                                $isDiscount = false;
                                if (!empty($item->discount_price)) {
                                    $isDiscount = true;
                                    $dicount = $item->discount_price / 100;
                                    $price = $item->price - ($item->price * $dicount);
                                }
                                ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                                    <div class="grid-view_image">
                                        <a href="<?= base_url('web/productDetail/' . $item->slug) ?>" class="grid-view-item__link">
                                            <img class="grid-view-item__image primary blur-up lazyload"
                                                 data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                 src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>" alt="image"
                                                 title="product">
                                            <img class="grid-view-item__image hover blur-up lazyload"
                                                 data-src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                                 src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>" alt="image"
                                                 title="product">
                                        </a>
                                        <div class="product-details hoverDetails text-center mobile">
                                            <div class="product-name">
                                                <a href="<?= base_url('web/productDetail/' . $item->slug) ?>"><?= $item->name ?></a>
                                            </div>
                                            <div class="product-price">
                                                <?php if ($isDiscount): ?>
                                                    <span class="old-price">Rp. <?= number_format($item->price) ?></span>
                                                <?php endif; ?>
                                                <span class="price">Rp. <?= ($isDiscount) ? number_format($price) : number_format($item->price) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Featured Product-->

        <!--Latest Blog-->
        <div class="latest-blog section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Artikel Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $output = '';
                    foreach ($articles as $item): ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="wrap-blog">
                                <a href="<?= base_url('web/blogArticle/' . $item->slug) ?>" class="article__grid-image">
                                    <img src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?> "
                                         alt="<?= $item->title ?>" title="<?= $item->title ?>"
                                         class="blur-up lazyloaded"/>
                                </a>
                                <div class="article__grid-meta article__grid-meta--has-image">
                                    <div class="wrap-blog-inner">
                                        <h2 class="h3 article__title">
                                            <a href="<?= base_url('web/blogArticle/' . $item->slug) ?>"><?= $item->title ?></a>
                                        </h2>
                                        <span class="article__date"><?= date('d M Y', $item->created_at) ?></span>
                                        <div class="rte article__grid-excerpt">
                                        </div>
                                        <ul class="list--inline article__meta-buttons">
                                            <li><a href="<?= base_url('web/blogArticle/' . $item->slug) ?>">Baca
                                                    lanjutan</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--End Latest Blog-->

        <!--Store Feature-->
        <div class="store-feature section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="display-table store-info">
                            <li class="display-table-cell">
                                <i class="icon anm anm-repeat-alt"></i>
                                <h5>Reseller VIP Mom Uung Malang</h5>
                                <span class="sub-text"></span>
                            </li>
                            <li class="display-table-cell">
                                <i class="icon anm anm-repeat-alt"></i>
                                <h5>Reseller Bebetons</h5>
                                <span class="sub-text"></span>
                            </li>
                            <li class="display-table-cell">
                                <i class="icon anm anm-credit-card-front-r"></i>
                                <h5>Sewa Pompa Asi</h5>
                                <span class="sub-text"></span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Store Feature-->
    </div>
    <!--End Body Content-->

<?php $this->load->view("layouts-web/main_footer"); ?>