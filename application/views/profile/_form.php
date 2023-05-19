<?php
$link = 'profile/create';
if (!$isNewRecord) {
    $link = 'profile/update';
}
$key = 'secret-key-in-config';

?>

<div class="row">

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Menu</h3>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>"
                  enctype="multipart/form-data">

                <div class="row" style="padding: 12px">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Akun User
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="row" style="padding: 20px">
                                    <div style="width: 100%">
                                        <div class="form-group row">
                                            <label for="input_username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="username"
                                                       name="User[username]"
                                                       value="<?= (!$isNewRecord) ? $data->username : '' ?>"
                                                       placeholder="Username" <?= (!$isNewRecord) ? 'readOnly' : '' ?> >
                                            </div>
                                        </div>

                                        <?php if ($isNewRecord): ?>
                                            <div class="form-group row">
                                                <label for="input_password"
                                                       class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control" id="password"
                                                           name="User[password]"
                                                           value="<?= (!$isNewRecord) ? $data->password : '' ?>"
                                                           placeholder="Password">
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="card-body">
                    <!-- HIDDEN FORM -->
                    <div class="form-group row">

                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="isNewRecord" name="isNewRecord"
                                   value="<?= (!$isNewRecord) ? 'false' : 'true' ?>"
                                   placeholder="isNewRecord">

                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                   value="<?= (!$isNewRecord) ? $data->user_id : '' ?>"
                                   placeholder="User ID">
                        </div>
                    </div>
                    <!-- HIDDEN FORM -->


                    <div class="form-group row">
                        <label for="input_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= (!$isNewRecord) ? $data->name : '' ?>"
                                   placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?= (!$isNewRecord) ? $data->email : '' ?>"
                                   placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="phone" name="phone"
                                   value="<?= (!$isNewRecord) ? $data->phone : '' ?>"
                                   placeholder="Phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_parent" class="col-sm-2 col-form-label">Typeuser</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select class="form-control select2" id="typeuser_id" name="typeuser_id"
                                        style="width: 100%;">
                                    <?php if ($isNewRecord) : ?>
                                        <option value="">-- Select Typeuser --</option>
                                    <?php endif; ?>
                                    <?php foreach ($typeuser as $item): ?>
                                        <option value="<?= $item->id ?>" <?= (!$isNewRecord) ? $item->id == $data->typeuser_id ? "Selected" : "" : '' ?>><?= $item->value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input_foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                        </div>
                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit"
                            class="btn btn-info float-right"><?= ($isNewRecord) ? 'Create Profile' : 'Update Profile' ?></button>
                </div>
            </form>

        </div>

    </div>
</div>
