<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="<?= (!empty($data->foto)) ? base_url('assets/img/upload/' . $data->foto) : base_url('assets/img/system/no_img.jpg') ?>"
                                 alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $data->name ?></h3>
                        <p class="text-muted text-center"><?= $data->typeuser ?></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#detail"
                                                    data-toggle="tab">Detail</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="detail">
                                <strong><i class="fas fa-user-check"></i> Username</strong>
                                <p class="text-muted"><?= $data->username ?></p>
                                <hr>
                                <strong><i class="fas fa-envelope"></i> Email</strong>
                                <p class="text-muted"><?= $data->email ?></p>
                                <hr>
                                <strong><i class="fas fa-phone-square"></i> Phone</strong>
                                <p class="text-muted"><?= $data->phone ?></p>
                                <hr>
                                <strong><i class="fas fa-toggle-on"></i> Status</strong>
                                <p class="text-muted">
                                    <?php if ($data->status == 1): ?>
                                        <span class="right badge badge-success">Active</span>
                                    <?php else: ?>
                                        <span class="right badge badge-danger">Blocked</span>
                                    <?php endif; ?>
                                </p>
                                <hr>
                            </div>
                            <div class="tab-pane" id="setting">
                                <div id="div-setting"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>