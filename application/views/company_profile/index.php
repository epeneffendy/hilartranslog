<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="<?= (!empty($data->logo)) ? base_url('assets/img/upload/' . $data->logo) : base_url('assets/img/system/no_img.jpg') ?>"
                                 alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $data->name ?></h3>
                        <p class="text-muted text-center"><?= $data->alias ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Year</b> <a class="float-right"><?= $data->year ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Version</b> <a class="float-right"><?= $data->version ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#detail"
                                                    data-toggle="tab">Detail</a></li>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['company-profile[U]']))) : ?>
                                <li class="nav-item"><a class="nav-link" href="#setting" data-toggle="tab">Setting</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="detail">
                                <strong><i class="fas fa-building"></i> Company</strong>
                                <p class="text-muted"><?= $data->company ?></p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                <p class="text-muted"><?= $data->address ?></p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Description</strong>
                                <p class="text-muted"><?= $data->description ?></p>
                                <hr>
                                <strong><i class="fas fa-globe"></i> Website</strong>
                                <p class="text-muted"><?= $data->website ?></p>
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
    </div>
</section>