<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registarasi - Data Kartu Keluarga</title>

    <!-- FontAwesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">

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
                <h4>Upload berkas-berkas yang diminta berikut ini sebagai syarat pembuatan kartu keluarga baru</h4>
            </div>

            <form class="formulir" method="post" enctype="multipart/form-data" action="<?php echo base_url('registrasi/send_berkas'); ?>">
                <div class="form-group">
                    <label for="ktp">Scan Berwarna KTP:</label>
                    <input name="ktp" type="file" id="ktp" class="form-control-file" />
                </div>

                <div class="form-group">
                    <label for="pengantar_rtrw">Surat Pengantar RT/RW:</label>
                    <input name="pengantar_rtrw" type="file" id="pengantar_rtrw" class="form-control-file" />
                </div>

                <div class="form-group">
                    <label for="pengantar_kelurahan">Surat Pengantar Kelurahan:</label>
                    <input name="pengantar_kelurahan" type="file" id="pengantar_kelurahan" class="form-control-file" />
                </div>

                <button style="marginTop: 20px" type="submit" class="btn btn-info">
                    UPLOAD
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
                        <li>Unggah Scan KTP Berwarna</li>
                        <li>Unggah berkas Surat Pengantar dari RT/RW Setempat</li>
                        <li>Unggah berkas Surat Pengantar dari Kelurahan Setempat</li>
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

<!-- Date Picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- My Script -->
<script type="text/javascript">
    $('#tanggal_lahir').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>
</body>
</html>