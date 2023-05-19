<?php
    $menuBrand = $this->db->query("select * from menu WHERE slug = 'product' ")->row();
    $menuKat = $this->db->query("select * from menu WHERE slug = 'shop' ")->row();
    $kategori = $this->db->query("select * from menu where parent_id = '" . $menuKat->id . "' ")->result();
    $brands = $this->db->query("select * from menu WHERE parent_id = '" . $menuBrand->id . "' ")->result();
?>

<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
    <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
    <div class="sidebar_tags">
        <div class="sidebar_widget categories filter-widget">
            <div class="widget-title"><h2>Kategori</h2></div>
            <div class="widget-content">
                <ul class="sidebar_categories">
                    <?php if (count($kategori) > 0): ?>
                        <?php foreach ($kategori as $item):
                            $level2 = $this->db->query("select * from menu where type= 4 and level = 2 and parent_id = '" . $item->id . "' ")->result();
                            ?>
                            <li class="<?= (count($level2) > 1 ? 'level1 sub-level' : 'lvl-1') ?>"><a
                                    href="<?= base_url($item->link); ?>"
                                    class="site-nav"><?= $item->name ?></a>
                                <?php if (count($level2) > 1): ?>
                                    <ul class="sublinks">
                                        <?php foreach ($level2 as $lv2): ?>
                                            <li class="level2"><a href="<?= $lv2->link ?>"
                                                                  class="site-nav"><?= $lv2->name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title"><h2>Product</h2></div>
            <div class="widget-content">
                <ul class="sidebar_categories">
                    <?php if (count($brands) > 0): ?>
                        <?php foreach ($brands as $item):
                            $level2 = $this->db->query("select * from menu where type= 4 and level = 2 and parent_id = '" . $item->id . "' ")->result();
                            ?>
                            <li class="<?= (count($level2) > 1 ? 'level1 sub-level' : 'lvl-1') ?>"><a
                                    href="<?= base_url($item->link); ?>"
                                    class="site-nav"><?= $item->name ?></a>
                                <?php if (count($level2) > 1): ?>
                                    <ul class="sublinks">
                                        <?php foreach ($level2 as $lv2): ?>
                                            <li class="level2"><a href="<?= $lv2->link ?>"
                                                                  class="site-nav"><?= $lv2->name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>