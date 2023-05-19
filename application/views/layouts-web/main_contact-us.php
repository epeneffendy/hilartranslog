<?php $this->load->view("layouts-web/main_header"); ?>
<?php $this->load->view("layouts-web/main_nav"); ?>
<style>
    .bredcrumbWrap {
        margin-top: -35px;
    }
</style>
<br>
<br>
<br>
<br>
<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Contact Us</h1></div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span
                    aria-hidden="true">›</span><span>Contact Us</span>
        </div>
    </div>

    <?php if (count($stores) > 0): ?>
        <div class="container">
            <div class="row">
                <?php foreach ($stores as $store):
                    $arr_store = explode("-", $store->address);
                    ?>
                    <div class="map-section__overlay-wrapper" style="padding-right: 10em">
                        <div class="map-section__overlay">
                            <h3 class="h4"><?= $store->name ?></h3>
                            <div class="rte-setting">
                                <p><?= $arr_store[0] ?><br> <?= $arr_store[1] ?></p>
                                <p><?= (!empty($store->phone) ? $store->phone :'<br>') ?></p>
                            </div>
                            <p><a href="<?= $store->url_maps ?>"
                                  class="btn btn--secondary btn--small" target="_blank">Get directions</a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    <?php endif; ?>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                <h2>Contact Us</h2>

                <div class="formFeilds contact-form form-vertical">
                    <form action="http://annimexweb.com/items/belle/assets/php/mail.php" method="post" id="contact_form"
                          class="contact-form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="ContactFormName" name="name" placeholder="Name" value=""
                                           required="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" id="ContactFormEmail" name="email" placeholder="Email" value=""
                                           required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input required="" type="tel" id="ContactFormPhone" name="phone" pattern="[0-9\-]*"
                                           placeholder="Phone Number" value="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input required="" type="text" id="ContactSubject" name="subject"
                                           placeholder="Subject" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <textarea required="" rows="10" id="ContactFormMessage" name="message"
                                              placeholder="Your Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
<!--                <div class="open-hours">-->
<!--                    <strong>Opening Hours</strong><br>-->
<!--                    Mon - Sat : 9am - 11pm<br>-->
<!--                    Sunday: 11am - 5pm-->
<!--                </div>-->
                <hr/>
                <ul class="addressFooter">
                    <li><i class="icon anm anm-map-marker-al"></i>
                        <p><?= $company->name ?></p></li>
                    <li class="phone"><i class="icon anm anm-phone-s"></i>
                        <p><?= $company->phone ?></p></li>
                    <li class="email"><i class="icon anm anm-envelope-l"></i>
                        <p><?= $company->email ?></p></li>
                </ul>
                <hr/>

            </div>
        </div>
    </div>

</div>
<!--End Body Content-->


<?php $this->load->view("layouts-web/main_footer"); ?>
