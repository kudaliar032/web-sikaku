<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registarasi</title>

    <!-- FontAwesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Sweetalert -->
    <link href="<?php echo base_url('assets/plugins/sweetalert2-7.29.0/dist/sweetalert2.min.css'); ?>" rel="stylesheet"/>

    <style>
        .formulir {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<main style="padding: 50px">
    <div class="row">
        <div class="col-md-6">
            <div>
                <h1>SIKAKU</h1>
                <h4>Minta password untuk pendaftaran Kartu Keluarga baru</h4>
            </div>

            <form class="formulir" method="post" action="<?php echo base_url('registrasi/index_post'); ?>">
                <div class="form-group">
                    <label htmlFor="nik">Nomor Induk Kependudukan:</label>
                    <input
                            name="nik"
                            type="text"
                            class="form-control"
                            id="nik"
                            placeholder="Masukan nomor induk kepala keluarga"
                    />
                </div>
                <div class="form-group">
                    <label htmlFor="email">Alamat Email:</label>
                    <input
                            name="email"
                            type="text"
                            class="form-control"
                            id="email"
                            placeholder="Masukan alamat email"
                    />
                </div>
                <button style="marginTop: 20px" type="submit" class="btn btn-info">
                MINTA PASSWORD
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1>KETERANGAN:</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Urutan penggunaan:</h5>
                    <ol>
                        <li>
                            Memasukan NIK dan email pada form disamping
                            <ul>
                                <li>Masukan NIK yang akan menjadi kepala keluarga</li>
                                <li>Masukan email yang aktif, karena password akan dikirimkan melalui email</li>
                            </ul>
                        </li>
                        <li>Tekan tombol "Minta Password" untuk mendapatkan password login</li>
                        <li>Buka email anda untuk melihat password login milik anda</li>
                        <li>Login dengan NIK dan Password yang diapatkan, dan lengkapi berkas yang diminta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Jquery -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/js/bootstrap.bundle.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url('assets/plugins/sweetalert2-7.29.0/dist/sweetalert2.all.min.js'); ?>"></script>

<?php if ($this->session->flashdata('registrasi_gagal')): ?>
    <script>
        swal('Registrasi Gagal', 'Maaf, registrasi yang anda lakukan mengalami kegagalan!', 'error');
    </script>
<?php endif; ?>

</body>
</html>