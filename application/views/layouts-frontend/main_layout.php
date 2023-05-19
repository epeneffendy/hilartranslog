<?php $this->load->view("layouts-frontend/main_header"); ?>

    <!-- ======= Hero Section ======= -->
    <?php if ($section['home']['status'] == 1): ?>
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                         data-aos="fade-up" data-aos-delay="200">
                        <h1><?= $section['home']['content'] ?></h1>
                        <h2><?= $section['home']['desc'] ?></h2>
    <!--                    <div class="d-flex justify-content-center justify-content-lg-start">-->
    <!--                        <a href="#about" class="btn-get-started scrollto">Get Started</a>-->
    <!--                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i-->
    <!--                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
    <!--                    </div>-->
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                        <img src="<?= base_url(); ?>assets/hilar/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section><!-- End Hero -->
    <?php endif; ?>

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <?php if ($section['tentang-kami']['status'] == 1): ?>
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Tentang Kami</h2>
                    </div>
                    <div class="row content">
                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <p>
                                <?= $about->desc ?>
                            </p>
                            <!--                    <a href="#" class="btn-learn-more">Learn More</a>-->
                        </div>
                        <div class="col-lg-6">
                            <?php if (!empty($about->vision)): ?>
                                <h3>Visi</h3>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> <?= $about->vision ?></li>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($about->mision)): ?>
                                <h3>Misi</h3>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> <?= $about->mision ?></li>
                                </ul>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </section><!-- End About Us Section -->
        <?php endif; ?>

        <!-- ======= Why Us Section ======= -->
        <?php if ($section['tentang-kami']['status'] == 1): ?>
            <section id="why-us" class="why-us section-bg">
                <div class="container-fluid" data-aos="fade-up">

                    <div class="row">

                        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                            <div class="content">
                                <h3><strong>Layanan Kami</strong></h3>
                                <?php if ($section['tentang-kami']['flag'] == 1): ?>
                                    <p>
                                        <?= $section['tentang-kami']['content'] ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="accordion-list">
                                <ul>

                                    <?php
                                    $no = 1;
                                    foreach ($services as $ind => $item): ?>
                                        <li>
                                            <a data-bs-toggle="collapse"
                                               data-bs-target="#accordion-list-<?= $item->id ?>"
                                               class="collapsed"><span><?= $no++ ?></span> <?= $item->name ?><i
                                                        class="bx bx-chevron-down icon-show"></i><i
                                                        class="bx bx-chevron-up icon-close"></i></a>
                                            <div id="accordion-list-<?= $item->id ?>" class="collapse"
                                                 data-bs-parent=".accordion-list">
                                                <p>
                                                    <?= $item->desc ?>
                                                </p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>

                        </div>

                        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                             style='background-image: url("<?= base_url(); ?>assets/hilar/img/why-us.png");'
                             data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                    </div>

                </div>
            </section><!-- End Why Us Section -->
        <?php endif; ?>

        <!-- ======= Cta Section ======= -->
        <?php if ($section['hubungi-kami']['status'] == 1): ?>
            <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3><?= $section['hubungi-kami']['content'] ?></h3>
                        <p> <?= $section['hubungi-kami']['desc'] ?></p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Call To Action</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->
        <?php endif; ?>

        <!-- ======= Portfolio Section ======= -->
        <?php if ($section['galeri']['status'] == 1): ?>
            <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Galeri</h2>
                    <p><?= $section['galeri']['content']  ?></p>
                </div>

<!--                <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">-->
<!--                    <li data-filter="*" class="filter-active">All</li>-->
<!--                    <li data-filter=".filter-app">App</li>-->
<!--                    <li data-filter=".filter-card">Card</li>-->
<!--                    <li data-filter=".filter-web">Web</li>-->
<!--                </ul>-->

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($galerys as $item): ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-img"><img
                                        src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>" class="img-fluid"
                                        alt=""></div>
                            <div class="portfolio-info">
                                <h4><?= $item->title ?></h4>
<!--                                <p>App</p>-->
                                <a href="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>"
                                   data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $item->title ?>"><i
                                            class="bx bx-plus"></i></a>
<!--                                <a href="portfolio-details.html" class="details-link" title="More Details"><i-->
<!--                                            class="bx bx-link"></i></a>-->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section><!-- End Portfolio Section -->
        <?php endif; ?>

        <!-- ======= Clients Section ======= -->
        <?php if ($section['klien-kami']['status'] == 1): ?>
            <section id="clients" class="clients section-bg">
            <div class="container">
                <div class="row" data-aos="zoom-in" style="text-align: center">
                    <div class="section-title">
                        <h2>Klien Kami</h2>
                        <p><?= $section['klien-kami']['content'] ?></p>
                    </div>
                    <?php foreach ($clients as $item):
                        ?>
                        <div class="col-lg-<?= $col_lg ?> col-md-4 col-6 d-flex align-items-center justify-content-center">
                            <img src="<?= base_url(); ?>assets/img/upload/<?= $item->image ?>" class="img-fluid" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section><!-- End Cliens Section -->
        <?php endif; ?>

        <!-- ======= Contact Section ======= -->
        <?php if ($section['kontak-kami']['status'] == 1): ?>
            <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                    <p><?= $section['kontak-kami']['content'] ?>/p>
                </div>

                <div class="row">
                    <?php foreach ($branchs as $item) : ?>

                        <div class="col-lg-<?= $col_lg_branch ?> d-flex align-items-stretch">

                            <div class="info">
                                <div class="section-title">
                                    <h3><?= $item->name ?></h3>
                                </div>
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Alamat:</h4>
                                    <p><?= $item->address ?></p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p><?= $company->email ?></p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Telp:</h4>
                                    <p><?= $item->phone ?></p>
                                </div>
                                <?= $item->url_embed ?>
                                <!--                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>-->
                            </div>

                        </div>

                    <?php endforeach; ?>


                </div>

            </div>
        </section><!-- End Contact Section -->
        <?php endif; ?>
    </main><!-- End #main -->

<?php $this->load->view("layouts-frontend/main_footer"); ?>