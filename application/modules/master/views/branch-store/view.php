<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Location</h3>
                        <div class="text-center">
                            <iframe src="<?= $data->url_embed ?>" width="280" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#detail"
                                                    data-toggle="tab">Store</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="detail">
                                <strong><i class="fas fa-user-check"></i> Name Store</strong>
                                <p class="text-muted"><?= $data->name ?></p>
                                <hr>
                                <strong><i class="fas fa-envelope"></i> Address</strong>
                                <p class="text-muted"><?= $data->address ?></p>
                                <hr>
                                <strong><i class="fas fa-phone-square"></i> Phone</strong>
                                <p class="text-muted"><?= $data->phone ?></p>
                                <hr>
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