<?php
$sql = $this->db->query("select * from menu where type = 2 and level = 1");
$menu_top_level_1 = $sql->result_array();

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->userdata('switch')): ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="javascript:void(0)" data-id="<?= $this->session->userdata('user_initial')['id'] ?>"
                   class="nav-link btn-block btn-outline-danger btn-switch-admin"><i class="fas fa-random"></i>
                    <?= $this->session->userdata('user_initial')['name'] ?></a>
            </li>
        <?php endif; ?>
        <!-- Menu TOP -->
        <?php if ($menu_top_level_1 > 0) : ?>
            <?php foreach ($menu_top_level_1 as $level_1) : ?>
                <li class="nav-item dropdown">
                    <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')[$level_1['slug'] . '[R]']))) : ?>
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <?php if (!empty($level_1['icon'])) : ?>
                                <i class="<?= $level_1['icon'] ?>"></i>
                            <?php endif; ?>

                            <?= $level_1['name'] ?>
                        </a>
                    <?php endif; ?>
                    <?php
                    $sql = $this->db->query("select * from menu where type = 2 and level = 2 and parent_id = '" . $level_1['id'] . "' ");
                    $menu_top_level_2 = $sql->result_array();
                    ?>
                    <?php if ($menu_top_level_2 > 0) : ?>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header"><?= $level_1['name'] ?></span>
                            <?php foreach ($menu_top_level_2 as $level_2) : ?>
                                <div class="dropdown-divider"></div>
                                <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')[$level_2['slug'] . '[R]']))) : ?>
                                    <a href="<?= base_url() . $level_2['link'] ?>" class="dropdown-item">
                                        <?php if (!empty($level_2['icon'])) : ?>
                                            <i class="<?= $level_2['icon'] ?>"></i>
                                        <?php endif; ?>
                                        <?= $level_2['name'] ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i> <?= $this->session->userdata('name') ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="user-panel-admin mt-3 pb-3 mb-3 d-flex " style="justify-content: center">
                    <div class="image">
                        <img src="<?= (!empty($this->session->userdata('foto'))) ? base_url('assets/img/upload/'. $this->session->userdata('foto')) : base_url('assets/img/system/no_person.jpg')  ?>"
                             class="img-circle elevation-2" alt="User Image" style="width: 100px">
                    </div>
                </div>
                <p style="text-align: center; padding-bottom: 10px"><?= $this->session->userdata('name') ?></p>
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url('profile/view/' . encrypt_url($this->session->userdata('id'))) ?>"
                           class="dropdown-item dropdown-footer"> Profile</a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url('site/logout') ?>" class="dropdown-item dropdown-footer"> Log
                            Out</a>
                    </div>
                </div>

            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->