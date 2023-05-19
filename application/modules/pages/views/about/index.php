<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#detail"
                                                    data-toggle="tab">Detail</a></li>
                            <?php if (($this->session->userdata('is_developer')) || (isset($this->session->userdata('you_can')['about-us[U]']))) : ?>
                                <li class="nav-item"><a class="nav-link" href="#setting" data-toggle="tab">Update</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="detail">
                                <strong><i class="far fa-file-alt mr-1"></i> Description</strong>
                                <p class="text-muted">
                                    <?= $data->desc ?>
                                </p>
                                <hr>
                                <strong><i class="fas fa-globe"></i> Vision</strong>
                                <p class="text-muted">
                                    <?= $data->vision ?>
                                </p>
                                <hr>
                                <strong><i class="fas fa-globe"></i> Mision</strong>
                                <p class="text-muted">
                                    <?= $data->mision ?>
                                </p>
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