<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $company->name ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/hilar/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/hilar/img/favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/hilar/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/hilar/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/hilar/css/style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="<?= base_url('web/index') ?>">
                <img src="<?= base_url(); ?>assets/hilar/img/logo.png"
                     alt="<?= $company->logo ?>" title="<?= $company->logo ?>"/>
            </a>
        </h1>

        <nav id="navbar" class="navbar">
            <ul>
                <?php foreach ($menus as $item):  ?>
                    <?php if($item->status == 1) : ?>
                        <li><a class="nav-link scrollto <?= ($item->slug_menu == 'home')? 'active' : '' ?>" href="<?= $item->link ?>"><?= $item->menu ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->