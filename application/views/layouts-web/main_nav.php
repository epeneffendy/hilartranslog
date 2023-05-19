<?php
$menuWeb = $this->db->query("select * from menu where type= 4 and level = 1 ")->result();
$company = $this->db->query("select * from company_profile")->row();
?>

<div class="header-wrap classicHeader animated d-flex">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!--Desktop Logo-->
            <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                <a href="<?= base_url('web/index') ?>">
                    <img src="<?= base_url(); ?>assets/img/upload/<?= $company->logo ?> "
                         alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template"/>
                </a>
            </div>
            <!--End Desktop Logo-->
            <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                <div class="d-block d-lg-none">
                    <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        <i class="icon anm anm-times-l"></i>
                        <i class="anm anm-bars-r"></i>
                    </button>
                </div>
                <!--Desktop Menu-->
                <nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                    <ul id="siteNav" class="site-nav medium center hidearrow">
                        <?php foreach ($menuWeb as $item): ?>
                            <?php
                            $level2 = $this->db->query("select * from menu where type= 4 and level = 2 and parent_id = '" . $item->id . "' ")->result();
                            ?>
                            <li class="lvl1 parent dropdown"><a href="<?= base_url($item->link); ?>"><?= $item->name ?>
                                    <i
                                            class="anm anm-angle-down-l"></i></a>

                                <?php if (count($level2) > 0) : ?>
                                    <ul class="dropdown">
                                        <?php foreach ($level2 as $detail):
                                            $level3 = $this->db->query("select * from menu where type= 4 and level = 3 and parent_id = '" . $item->id . "' ")->result();
                                            ?>
                                            <li><a href="<?= base_url($detail->link); ?>"
                                                   class="site-nav"><?= $detail->name ?>
                                                    <?php if (count($level3) > 0) : ?><i
                                                            class="anm anm-angle-right-l"></i><?php endif; ?></a>
                                                <?php if (count($level3) > 0): ?>
                                                    <ul class="dropdown">
                                                        <?php foreach ($level3 as $child): ?>
                                                            <li><a href="<?= base_url($child->link); ?>"
                                                                   class="site-nav"><?= $child->name ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <!--End Desktop Menu-->
            </div>
            <!--Mobile Logo-->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                <div class="logo">
                    <a href="<?= base_url('web/index') ?>">
                        <img src="<?= base_url(); ?>assets/img/upload/<?= $company->logo ?>"
                             alt="<?= $company->name ?>" title="<?= $company->name ?>"/>
                    </a>
                </div>
            </div>
            <!--Mobile Logo-->
        </div>
    </div>
</div>
<!--End Header-->

<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
    <ul id="MobileNav" class="mobile-nav">
        <?php foreach ($menuWeb as $item): ?>
            <?php
            $level2 = $this->db->query("select * from menu where type= 4 and level = 2 and parent_id = '" . $item->id . "' ")->result();
            ?>
            <li class="lvl1 parent megamenu"><a href="<?= base_url($item->link); ?>"><?= $item->name ?><i
                            class="anm <?= (count($level2) > 1) ? 'anm-plus-l' : '' ?>"></i></a>
                <?php if (count($level2) > 0) : ?>
                    <ul>
                        <?php foreach ($level2 as $detail):
                            $level3 = $this->db->query("select * from menu where type= 4 and level = 3 and parent_id = '" . $item->id . "' ")->result();
                            ?>
                            <li><a href="<?= base_url($detail->link) ?>" class="site-nav"><?= $detail->name ?><i
                                            class="anm <?= (count($level3) > 1) ? 'anm-plus-l' : '' ?>"></i></a>
                                <?php if (count($level3) > 0): ?>
                                    <ul>
                                        <?php foreach ($level3 as $child): ?>
                                            <li><a href="<?= base_url($child->link); ?>"
                                                   class="site-nav"><?= $child->name ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<!--End Mobile Menu-->