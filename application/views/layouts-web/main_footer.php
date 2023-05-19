
<!--Footer-->
<footer id="footer">
    <div class="site-footer">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Kategori</h4>
                        <ul>
                            <?php
                            $kategori = $this->db->query("select * from master_kategori limit 5 ")->result();
                            foreach ($kategori as $item):
                                ?>
                                <li><a href="#"><?= $item->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Brands</h4>
                        <ul>
                            <?php
                            $brands = $this->db->query("select * from master_brand limit 5 ")->result();
                            foreach ($brands as $item):
                                ?>
                                <li><a href="#"><?= $item->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <?php $profile = $this->db->query("select * from company_profile")->row(); ?>
                        <?php if (!empty($profile)): ?>
                            <h4 class="h4">Hubungi Kami</h4>
                            <ul class="addressFooter">
                                <li><i class="icon anm anm-map-marker-al"></i><p><?= $profile->address ?></p></li>
                                <li class="phone"><i class="icon anm anm-phone-s"></i>
                                    <p><?= $profile->phone ?></p></li>
                                <li class="email"><i class="icon anm anm-envelope-l"></i>
                                    <p><?= $profile->email ?></p></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">

                    </div>
                </div>
            </div>
            <!--End Footer Links-->
            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <!--Footer Copyright-->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left">
                        <span></span> <a href="https://www.linkedin.com/in/epen-effendy/">&copy; Effendy
                            Anwar <?= date('Y') ?></a></div>
                    <!--End Footer Copyright-->
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->
<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->

<!--Quick View popup-->
<div class="modal fade quick-view-popup" id="content_quickview">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="ProductSection-product-template" class="product-template__container prstyle1">
                    <div class="product-single">
                        <!-- Start model close -->
                        <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                           title="close"><span class="icon icon anm anm-times-l"></span></a>
                        <!-- End model close -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="pl-20">
                                        <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-single__meta">
                                    <h2 class="product-single__title">Product Quick View Popup</h2>
                                    <div class="prInfoRow">
                                        <div class="product-stock"><span class="instock ">In Stock</span> <span
                                                    class="outstock hide">Unavailable</span></div>
                                        <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                    </div>
                                    <p class="product-single__price product-single__price-product-template">
                                        <span class="visually-hidden">Regular price</span>
                                        <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                        <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span
                                                    class="money">$500.00</span></span>
                                    </span>
                                    </p>
                                    <div class="product-single__description rte">
                                        Belle Multipurpose Bootstrap 4 Html Template that will give you and your
                                        customers a smooth shopping experience which can be used for various kinds of
                                        stores such as fashion,...
                                    </div>

                                    <form method="post" action="http://annimexweb.com/cart/add"
                                          id="product_form_10508262282" accept-charset="UTF-8"
                                          class="product-form product-form-product-template hidedropdown"
                                          enctype="multipart/form-data">
                                        <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                            <div class="product-form__item">
                                                <label class="header">Color: <span class="slVariant">Red</span></label>
                                                <div data-value="Red" class="swatch-element color red available">
                                                    <input class="swatchInput" id="swatch-0-red" type="radio"
                                                           name="option-0" value="Red">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-red"
                                                           style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);"
                                                           title="Red"></label>
                                                </div>
                                                <div data-value="Blue" class="swatch-element color blue available">
                                                    <input class="swatchInput" id="swatch-0-blue" type="radio"
                                                           name="option-0" value="Blue">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-blue"
                                                           style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);"
                                                           title="Blue"></label>
                                                </div>
                                                <div data-value="Green" class="swatch-element color green available">
                                                    <input class="swatchInput" id="swatch-0-green" type="radio"
                                                           name="option-0" value="Green">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-green"
                                                           style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);"
                                                           title="Green"></label>
                                                </div>
                                                <div data-value="Gray" class="swatch-element color gray available">
                                                    <input class="swatchInput" id="swatch-0-gray" type="radio"
                                                           name="option-0" value="Gray">
                                                    <label class="swatchLbl color medium rectangle" for="swatch-0-gray"
                                                           style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);"
                                                           title="Gray"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                            <div class="product-form__item">
                                                <label class="header">Size: <span class="slVariant">XS</span></label>
                                                <div data-value="XS" class="swatch-element xs available">
                                                    <input class="swatchInput" id="swatch-1-xs" type="radio"
                                                           name="option-1" value="XS">
                                                    <label class="swatchLbl medium rectangle" for="swatch-1-xs"
                                                           title="XS">XS</label>
                                                </div>
                                                <div data-value="S" class="swatch-element s available">
                                                    <input class="swatchInput" id="swatch-1-s" type="radio"
                                                           name="option-1" value="S">
                                                    <label class="swatchLbl medium rectangle" for="swatch-1-s"
                                                           title="S">S</label>
                                                </div>
                                                <div data-value="M" class="swatch-element m available">
                                                    <input class="swatchInput" id="swatch-1-m" type="radio"
                                                           name="option-1" value="M">
                                                    <label class="swatchLbl medium rectangle" for="swatch-1-m"
                                                           title="M">M</label>
                                                </div>
                                                <div data-value="L" class="swatch-element l available">
                                                    <input class="swatchInput" id="swatch-1-l" type="radio"
                                                           name="option-1" value="L">
                                                    <label class="swatchLbl medium rectangle" for="swatch-1-l"
                                                           title="L">L</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Action -->
                                        <div class="product-action clearfix">
                                            <div class="product-form__item--quantity">
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                    class="fa anm anm-minus-r"
                                                                    aria-hidden="true"></i></a>
                                                        <input type="text" id="Quantity" name="quantity" value="1"
                                                               class="product-form__input qty">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                    class="fa anm anm-plus-r"
                                                                    aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-form__item--submit">
                                                <button type="button" name="add" class="btn product-form__cart-submit">
                                                    <span>Add to cart</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- End Product Action -->
                                    </form>
                                    <div class="display-table shareRow">
                                        <div class="display-table-cell">
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i
                                                            class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-product-single-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Quick View popup-->


<!-- Including Jquery -->
<script src="<?= base_url(); ?>assets/frontend/template/js/vendor/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/vendor/jquery.cookie.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/vendor/wow.min.js"></script>
<!-- Including Javascript -->
<script src="<?= base_url(); ?>assets/frontend/template/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/plugins.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/lazysizes.js"></script>
<script src="<?= base_url(); ?>assets/frontend/template/js/main.js"></script>
<!--For Newsletter Popup-->
<script>
    jQuery(document).ready(function () {
        jQuery('.closepopup').on('click', function () {
            jQuery('#popup-container').fadeOut();
            jQuery('#modalOverly').fadeOut();
        });

        var visits = jQuery.cookie('visits') || 0;
        visits++;
        jQuery.cookie('visits', visits, {expires: 1, path: '/'});
        console.debug(jQuery.cookie('visits'));
        if (jQuery.cookie('visits') > 1) {
            jQuery('#modalOverly').hide();
            jQuery('#popup-container').hide();
        } else {
            var pageHeight = jQuery(document).height();
            jQuery('<div id="modalOverly"></div>').insertBefore('body');
            jQuery('#modalOverly').css("height", pageHeight);
            jQuery('#popup-container').show();
        }
        if (jQuery.cookie('noShowWelcome')) {
            jQuery('#popup-container').hide();
            jQuery('#active-popup').hide();
        }
    });

    jQuery(document).mouseup(function (e) {
        var container = jQuery('#popup-container');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.fadeOut();
            jQuery('#modalOverly').fadeIn(200);
            jQuery('#modalOverly').hide();
        }
    });
</script>
<!--End For Newsletter Popup-->
</div>
</body>
<!-- belle/index.html   11 Nov 2019 12:20:55 GMT -->
</html>