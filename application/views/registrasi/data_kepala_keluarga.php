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
                <h4>Lengkapi data-data pribadi kepala keluarga berikut ini</h4>
            </div>

            <form class="formulir" method="post" action="<?php echo base_url('registrasi/send_kepala_keluarga'); ?>">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input name="nama_lengkap" type="text" id="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap anda" />
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        <option>--- Pilih Jenis Kelamin ---</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir:</label>
                    <input name="tempat_lahir" type="text" id="tempat_lahir" class="form-control" placeholder="Masukan tempat lahir anda" />
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <div class="input-group">
                        <input name="tanggal_lahir" type="text" id="tanggal_lahir" placeholder="yyyy-mm-dd" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama:</label>
                    <select name="agama" class="form-control" id="agama">
                        <option>--- Pilih Agama ---</option>
                        <option value="islam">Islam</option>
                        <option value="protestan">Protestan</option>
                        <option value="katolik">Katolik</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Buddha</option>
                        <option value="khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pendidikan">Pendidikan:</label>
                    <select name="pendidikan" class="form-control" id="pendidikan">
                        <option>--- Pilih Pendidikan ---</option>
                        <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
                        <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                        <option value="SD/SMP/SEDERAJAT">SD/SMP/SEDERAJAT</option>
                        <option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_pekerjaan">Jenis Pekerjaan:</label>
                    <select name="jenis_pekerjaan" class="form-control" id="jenis_pekerjaan">
                        <option>--- Pilih Jenis Pekerjaan ---</option>
                        <option value="PEGAWAI NEGERI SIPIL">PEGAWAI NEGERI SIPIL</option>
                        <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                        <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                        <option value="BURUH">BURUH</option>
                        <option value="BELUM/TIDAK BEKERJA">BELUM/TIDAK BEKERJA</option>
                        <option value="WIRASWASTA">WIRASWASTA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan:</label>
                    <select name="status_perkawinan" class="form-control" id="status_perkawinan">
                        <option>--- Pilih Status Perkawinan ---</option>
                        <option value="KAWIN">KAWIN</option>
                        <option value="BELUM KAWIN">BELUM KAWIN</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan:</label>
                    <select name="kewarganegaraan" class="form-control" id="kewarganegaraan">
                        <option>--- Pilih Kewarganegaraan ---</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_paspor">Nomor Paspor:</label>
                    <input name="no_paspor" type="text" id="no_paspor" class="form-control" placeholder="Masukan nomor paspor anda" />
                </div>

                <div class="form-group">
                    <label for="no_kitap">Nomor KITAP:</label>
                    <input name="no_kitap" type="text" id="no_kitap" class="form-control" placeholder="Masukan nomor KITAP anda" />
                </div>

                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah:</label>
                    <input name="nama_ayah" type="text" id="nama_ayah" class="form-control" placeholder="Masukan nama lengkap ayah anda" />
                </div>

                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu:</label>
                    <input name="nama_ibu" type="text" id="nama_ibu" class="form-control" placeholder="Masukan nama lengkap ibu anda" />
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
                    <h5 class="card-title">Urutan penggunaan:</h5>
                    <ol>
                        <li>
                            Lengkapi data Kepala Keluarga sesuai KTP.
                        </li>
                        <li>Masukkan Nomor Paspor (jika mempunyai) </li>
                        <li>Masukkan Nomor KITAP(Izin Tinggal Tetap bagi WNA)</li>
                        <li>Masukkan nama Ayah dan Ibu</li>
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