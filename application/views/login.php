<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- FontAwesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Sweetalert -->
    <link href="<?php echo base_url('assets/plugins/sweetalert2-7.29.0/dist/sweetalert2.min.css'); ?>" rel="stylesheet"/>
</head>
<body>
<main style="margin-top: 15px">
    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('login/set_session'); ?>">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1>SIKAKU</h1>
                <hr/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-only" for="nik">Nomor Induk Kependudukan</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                        <i class="fa fa-2x fa-user"></i>
                    </div>
                    <input
                            type="text"
                            name="nik"
                            class="form-control"
                            id="nik"
                            placeholder="Masukan NIK anda"
                            required
                            autoFocus
                    />
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                        <i class="fa fa-2x fa-key"></i>
                    </div>
                    <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            placeholder="Masukan password anda"
                            required
                    />
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center" style="paddingTop: 1rem">
        <div class="col-md-6">
            <button type="submit" class="btn btn-info btn-lg btn-block">
                <i class="fa fa-sign-in"></i> Login
            </button>
        </div>
        </div>
    </form>
</main>

<!-- Jquery -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/js/bootstrap.bundle.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url('assets/plugins/sweetalert2-7.29.0/dist/sweetalert2.all.min.js'); ?>"></script>

<?php if ($this->session->flashdata('login_gagal')): ?>
    <script>
        swal('Login Salah', 'NIK atau Password yang anda masukan salah!', 'error');
    </script>
<?php endif; ?>
</body>
</html>