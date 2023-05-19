<?php
$link = 'role/create';
if (!$isNewRecord) {
    $link = 'role/update';
}

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Menu</h3>
            </div>

            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>">
                <div class="card-body">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th width="200px">Nama</th>
                                <th width="2px">:</th>
                                <td><?= $model->name ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Username</th>
                                <th width="2px">:</th>
                                <td><?= $model->username ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Typeuser</th>
                                <th width="2px">:</th>
                                <td><?= $model->typeuser ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                                   value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="Group Menu">
                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                   value="<?= $user_id ?>" placeholder="User ID">
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 12px">
                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Group Menu
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="row" style="padding: 20px">
                                    <table class="table">
                                        <?php foreach ($group_menu as $item): ?>
                                            <tr>
                                                <td width="100px">
                                                    <input class="checkbox-three" type="checkbox"
                                                           name="MenuRoleForm[groupmenus][]"
                                                           value="<?= $item['slug'] ?>" <?= isset($arr_group[$item['slug']]) ? 'checked' : '' ?>
                                                           id="gmenu-<?= $item['slug'] ?>"> &nbsp;
                                                    &nbsp; <?= $item['name'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    List Menu
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="row" style="padding: 20px">
                                    <div style="overflow:auto;max-height:57vh; width: 100%">
                                        <table class="table table-hover">
                                            <?php foreach ($data_menu as $menu): ?>
                                                <?php
                                                $sql = $this->db->query("select * from menu where parent_id = '" . $menu->id . "' ");
                                                $level_2 = $sql->result_array();
                                                ?>
                                                <tr style="background-color:<?= (count($level_2) > 0) ? '#ff9999' : '' ?> ">
                                                    <td><?= $menu->name ?></td>
                                                    <?php foreach ($cruda as $ind => $val): ?>
                                                        <td width="75px">
                                                            <input class="checkbox-three" type="checkbox"
                                                                   name="MenuRoleForm[menus][]"
                                                                   value="<?= $menu->slug . '[' . $ind . ']' ?>" <?= isset($arr_menu[$menu->slug. '[' . $ind . ']']) ? 'checked' : '' ?>
                                                                   id="menu-<?= $menu->slug ?>[<?= $ind ?>]"> <?= $ind ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                                <?php foreach ($level_2 as $menu2): ?>
                                                    <?php
                                                    $sql = $this->db->query("select * from menu where parent_id = '" . $menu2['id'] . "' ");
                                                    $level_3 = $sql->result_array();
                                                    ?>
                                                    <tr style="background-color:<?= (count($level_3) > 0) ? '#91e4e4' : '' ?> ">
                                                        <td>&nbsp;&nbsp;<?= $menu2['name'] ?></td>
                                                        <?php foreach ($cruda as $ind => $val): ?>
                                                            <td width="75px">
                                                                <input class="checkbox-three" type="checkbox"
                                                                       name="MenuRoleForm[menus][]"
                                                                       value="<?= $menu2['slug'] . '[' . $ind . ']' ?>" <?= isset($arr_menu[$menu2['slug'] . '[' . $ind . ']']) ? 'checked' : '' ?>
                                                                       id="menu-<?= $menu2['slug'] ?>[<?= $ind ?>]"> <?= $ind ?>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                    <?php foreach ($level_3 as $menu3): ?>
                                                        <tr>
                                                            <td>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $menu3['name'] ?></td>
                                                            <?php foreach ($cruda as $ind => $val): ?>
                                                                <td width="75px">
                                                                    <input class="checkbox-three" type="checkbox"
                                                                           name="MenuRoleForm[menus][]"
                                                                           value="<?= $menu3['slug'] . '[' . $ind . ']' ?>" <?= isset($arr_menu[$menu3['slug'] . '[' . $ind . ']']) ? 'checked' : '' ?>
                                                                           id="menu-<?= $menu3['slug'] ?>[<?= $ind ?>]"> <?= $ind ?>
                                                                </td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit"
                            class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Group Menu' : 'Update Role' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>