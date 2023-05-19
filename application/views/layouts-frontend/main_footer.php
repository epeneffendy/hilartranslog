<!-- ======= Footer ======= -->
<footer id="footer">
    
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3><?= $company->name ?></h3>
                    <p>
                        <?= $company->address ?><br><br>
                        <strong>Phone:</strong> <?= $company->phone ?><br>
                        <strong>Email:</strong> <?= $company->email ?><br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <?php foreach ($menus as $item) : ?>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= $item->link ?>"><?= $item->menu ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Layayan Kami</h4>
                    <ul>
                        <?php foreach ($services as $item): ?>
                            <li><i class="bx bx-chevron-right"></i> <?= $item->name ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span><?= $company->alias ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <a href="https://bootstrapmade.com/">Effendy Anwar</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url(); ?>assets/hilar/vendor/aos/aos.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url(); ?>assets/hilar/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url(); ?>assets/hilar/js/main.js"></script>

</body>

</html>