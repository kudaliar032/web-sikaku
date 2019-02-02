<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registarasi - Data Kartu Keluarga</title>

    <!-- FontAwesome -->
    <link href="<?php echo base_url(); ?>assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

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
                <h4>Lengkapi data-data berikut ini sebagai data kartu keluarga baru</h4>
            </div>

            <form class="formulir" method="post" action="<?php echo base_url('registrasi/send_kartu_keluarga'); ?>">
                <div class="form-group">
                    <label for="provinsi">Provinsi:</label>
                    <select name="provinsi" class="form-control" id="provinsi">
                        <?php foreach ($data_provinsi as $prov) { ?>
                            <option value="<?php echo $prov->kode; ?>"><?php echo $prov->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div id="container-kab" class="form-group d-none">
                    <label for="kabupaten">Kabupaten/Kota:</label>
                    <select name="kabupaten" class="form-control" id="kabupaten"></select>
                </div>

                <div id="container-kec" class="form-group d-none">
                    <label for="kecamatan">Kecamatan:</label>
                    <select name="kecamatan" class="form-control" id="kecamatan"></select>
                </div>

                <div id="container-kel" class="form-group d-none">
                    <label for="kelurahan">Desa/Kelurahan:</label>
                    <select name="kelurahan" class="form-control" id="kelurahan"></select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap:</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat anda, berupa nama jalan, gang atau nomor rumah"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rt">RT:</label>
                        <input name="rt" type="number" class="form-control" id="rt" placeholder="Masukan RT"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rw">RW:</label>
                        <input name="rw" type="number" class="form-control" id="rt" placeholder="Masukan RW"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kodepos">Kode Pos:</label>
                    <input name="kodepos" type="number" class="form-control" id="kodepos" placeholder="Masukan kode pos anda" />
                </div>

                <button style="marginTop: 20px" type="submit" class="btn btn-info">
                    SIMPAN
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1>KETERANGAN:</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><font color='#ff0000'>Halaman ini ditujukkan penduduk yang belum memiliki KK</font></h5>
                    <ol>
                        <li>
                            Persyaratan data Scan yang diperlukan untuk membuat KK
                        </li>
                        <li>Scan KTP Berwarna</li>
                        <li>Scan Surat Pengantar RT/RW Berwarna</li>
                        <li>Scan Surat Pengantar Kelurahan Berwarna</li>
                    </ol>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Urutan penggunaan:</h5>
                    <ol>
                        <li>
                            Memasukan Provinsi dan Alamat Lengkap sesuai KTP Kepala Keluarga.
                        </li>
                        <li>Masukan Kode Pos sesuai alamat Kepala Keluarga.</li>
                        <li>Klik tombol Simpan, secara otomatis data akan tersimpan.</li>
                    </ol>
                    <h5 class="card-title"><font color='#ff0000'>PASTIKAN DATA YANG ANDA ISI SUDAH SESUAI</font></h5>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Jquery -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-4.1.3-dist/js/bootstrap.bundle.min.js"></script>

<!-- My Script -->
<script type="text/javascript">
    $(document).ready(() => {
        const provinsi = $('#provinsi');
        const kabupaten = $('#kabupaten');
        const kecamatan = $('#kecamatan');
        const kelurahan = $('#kelurahan');

        function getKabupaten(prov) {
            $.getJSON(`<?php echo base_url(); ?>indonesia/get_kabupaten/${prov}`, data => {
                let list_kabupaten = "";
                $.each(data, (key, val) => {
                    list_kabupaten += `<option value="${val.kode}">${val.nama}</option>`;
                });
                kabupaten.html(list_kabupaten);
            });
        }

        function getKecamatan(prov, kab) {
            $.getJSON(`<?php echo base_url(); ?>indonesia/get_kecamatan/${prov}/${kab}`, data => {
                let list_kecamatan = "";
                $.each(data, (key, val) => {
                    list_kecamatan += `<option value="${val.kode}">${val.nama}</option>`;
                });
                kecamatan.html(list_kecamatan);
            });
        }

        function getKelurahan(prov, kab, kec) {
            $.getJSON(`<?php echo base_url(); ?>indonesia/get_kelurahan/${prov}/${kab}/${kec}`, data => {
                let list_kelurahan = "";
                $.each(data, (key, val) => {
                    list_kelurahan += `<option value="${val.kode}">${val.nama}</option>`;
                });
                kelurahan.html(list_kelurahan);
            });
        }

        provinsi.change(() => {
            getKabupaten(provinsi.val());
            getKecamatan(provinsi.val(), '01');
            getKelurahan(provinsi.val(), '01', '01');
            $('#container-kab').removeClass('d-none');
        });

        kabupaten.change(() => {
            getKecamatan(provinsi.val(), kabupaten.val());
            getKelurahan(provinsi.val(), kabupaten.val(), '01');
            $('#container-kec').removeClass('d-none');
        });

        kecamatan.change(() => {
            getKelurahan(provinsi.val(), kabupaten.val(), kecamatan.val());
            $('#container-kel').removeClass('d-none');
        });
    });
</script>
</body>
</html>