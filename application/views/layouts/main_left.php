<?php
$sql = $this->db->query("select * from menu where type = 1 and level = 1 order by urutan asc");
$menu_left_level_1 = $sql->result_array();

$app = $this->db->query("select * from company_profile")->row();

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <span class="brand-text font-weight-light"><?= isset($app) ? $app->name : '' ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= (!empty($this->session->userdata('foto'))) ? base_url('assets/img/upload/'. $this->session->userdata('foto')) : base_url('assets/img/system/no_person.jpg')  ?>" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $this->session->userdata('name') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>

                <?php if ($menu_left_level_1 > 0): ?>
                    <?php foreach ($menu_left_level_1 as $level_1): ?>

                        <?php
                        $sql = $this->db->query("select * from menu where type = 1 and level = 2 and parent_id = '" . $level_1['id'] . "' ");
                        $menu_left_level_2 = $sql->result_array();
                        ?>

                        <li class="nav-item">
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')[$level_1['slug'] . '[R]']))) : ?>
                                <a href="<?= base_url($level_1['link']) ?>" class="nav-link">
                                    <?php if (!empty($level_1['icon'])) : ?>
                                        <i class="nav-icon <?= $level_1['icon'] ?> nav-icon"></i>
                                    <?php endif; ?>
                                    <p>
                                        <?= $level_1['name'] ?>
                                        <?php if (!empty($menu_left_level_2)): ?>
                                            <i class="fas fa-angle-left right"></i>
                                        <?php endif; ?>
                                    </p>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($menu_left_level_2)): ?>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($menu_left_level_2 as $level_2):
                                        $sql = $this->db->query("select * from menu where type = 1 and level = 3 and parent_id = '" . $level_2['id'] . "' ");
                                        $menu_left_level_3 = $sql->result_array();
                                        ?>
                                        <li class="nav-item">
                                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')[$level_2['slug'] . '[R]']))) : ?>
                                                <a href="<?= base_url($level_2['link']) ?>" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p><?= $level_2['name'] ?></p>
                                                    <?php if (!empty($menu_left_level_3)): ?>
                                                        <i class="right fas fa-angle-left"></i>
                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (!empty($menu_left_level_3)): ?>
                                                <ul class="nav nav-treeview">
                                                    <?php foreach ($menu_left_level_3 as $level_3): ?>
                                                        <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')[$level_3['slug'] . '[R]']))) : ?>
                                                            <li class="nav-item">
                                                                <a href="<?= base_url($level_3['link']) ?>" class="nav-link">
                                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                                    <p><?= $level_3['name'] ?></p>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>

                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
