<?php
$app = $this->db->query("select * from company_profile")->row();
$link = 'site/login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($app) ? $app->name : '' ?> | Log in</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/dist/css/adminlte.min.css"/>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <p><b><?= isset($app) ? $app->name : '' ?></b></p>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="form-horizontal" method="POST" action="<?php echo base_url($link); ?>"
                  enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
        </div>
    </div>
    <div id="myalert">
        <?php echo $this->session->flashdata('alert', true)?>
    </div>
</div>

<script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>

<script>
    $('#myalert').delay('slow').slideDown('slow').delay(2000).slideUp(600);
</script>
</body>
</html>
