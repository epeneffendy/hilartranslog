<?php
$link = 'groupMenu/create';
if (!$isNewRecord) {
    $link = 'groupMenu/update';
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
                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= (!$isNewRecord) ? $data->name : '' ?>" placeholder="Group Menu">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                                   value="<?= (!$isNewRecord) ? 'false' : 'true' ?>" placeholder="Group Menu">
                            <input type="hidden" class="form-control" id="typpositione" name="position"
                                   value="3" placeholder="position">
                            <input type="hidden" class="form-control" id="id" name="id"
                                   value="<?= (!$isNewRecord) ? $data->id : '' ?>" placeholder="ID">
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 12px">
                    <div class="col-md-12">
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
                            class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Group Menu' : 'Update Group Menu' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>