<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/_partials/head") ?>

    <style>
        .borderless td, .borderless th {
            border: none;
        }
    </style>
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar -->
<?php $this->load->view('admin/_partials/navbar'); ?>

<!-- Sidebar -->
<?php $this->load->view('admin/_partials/sidebar'); ?>

<!-- Main Content -->
<main class="app-content">


    <!-- PERINGATAN KALO BELUM DISETUJUI -->
    <?php if (!$status_verifikasi): ?>
        <div class="app-title bg-danger text-white">
            <div class="div">
                <h1><i class="fa fa-exclamation-triangle"></i> Peringatan</h1>
                <p>Data belum disetujui admin, anda tidak bisa mencetak atau menambahkan data lainnya. Mohon tunggu 2x24 jam.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="detailDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detailDataLabel">Detail Anggota Keluarga</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detailAnggotaKeluarga">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table borderless">
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td id="detail-nik">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Nama Lengkap</b></td>
                                    <td id="detail-nama-lengkap">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td id="detail-jenis-kelamin">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Tempat Lahir</b></td>
                                    <td id="detail-tempat-lahir">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Lahir</b></td>
                                    <td id="detail-tanggal-lahir">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Agama</b></td>
                                    <td id="detail-agama">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Pendidikan</b></td>
                                    <td id="detail-pendidikan">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Pekerjaan</b></td>
                                    <td id="detail-jenis-pekerjaan">Data</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="borderless table">
                                <tr>
                                    <td><b>Status Perkawinan</b></td>
                                    <td id="detail-status-perkawinan">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Hubungan Keluarga</b></td>
                                    <td id="detail-hubungan-keluarga">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Kewarganegaraan</b></td>
                                    <td id="detail-kewarganegaraan">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Paspor</b></td>
                                    <td id="detail-no-paspor">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Nomor KITAP</b></td>
                                    <td id="detail-no-kitap">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Nama Ayah</b></td>
                                    <td id="detail-nama-ayah">Data</td>
                                </tr>
                                <tr>
                                    <td><b>Nama Ibu</b></td>
                                    <td id="detail-nama-ibu">Data</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Daftar Anggota Keluarga</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Hubungan Keluarga</th>
                            <th class="text-center">Pekerjaan</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($anggota_keluarga as $anggota):
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $anggota->nik; ?></td>
                                <td class="text-center"><?php echo $anggota->nama_lengkap; ?></td>
                                <td class="text-center"><?php echo $anggota->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN';?></td>
                                <td class="text-center"><?php echo $anggota->hubungan_keluarga; ?></td>
                                <td class="text-center"><?php echo $anggota->jenis_pekerjaan; ?></td>
                                <td class="text-center"><?php echo $anggota->tempat_lahir; ?></td>
                                <td class="text-center"><?php echo $anggota->tanggal_lahir; ?></td>
                                <td>
                                    <button onclick="getDetail()" value="<?php echo $anggota->nik; ?>" data-target="#detailData" data-toggle="modal" class="btn btn-sm btn-secondary button-detail"><i class="fa fa-info"></i></button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>

                <!-- CETAK KARTU KELUARGA -->
                <?php if ($status_verifikasi && !$status_cetak): ?>
                    <div class="pt-4">
                        <a>
                            <button type="button" onclick="cetak()  " class="btn btn-success"><i class="fa fa-print"></i> CETAK</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<!-- Javascript DKK -->
<?php $this->load->view('admin/_partials/js'); ?>

<script>
    const buttonDetail = $('.button-detail');
    const modalDetailAnggta = $('#detailAnggotaKeluarga');

    function getDetail() {
        const nik = buttonDetail.val();
        const link = `<?php echo base_url('admin/get_data_anggota_keluarga')?>/${nik}`;
        $.getJSON(link, data => {
            $('#detail-nik').html(data.nik);
            $('#detail-nama-lengkap').html(data.nama_lengkap);
            $('#detail-jenis-kelamin').html(data.jenis_kelamin);
            $('#detail-tempat-lahir').html(data.tempat_lahir);
            $('#detail-tanggal-lahir').html(data.tanggal_lahir);
            $('#detail-agama').html(data.agama);
            $('#detail-pendidikan').html(data.pendidikan);
            $('#detail-jenis-pekerjaan').html(data.jenis_pekerjaan);
            $('#detail-status-perkawinan').html(data.status_perkawinan);
            $('#detail-hubungan-keluarga').html(data.hubungan_keluarga);
            $('#detail-kewarganegaraan').html(data.kewarganegaraan);
            $('#detail-no-paspor').html(data.no_paspor);
            $('#detail-no-kitap').html(data.no_kitap);
            $('#detail-nama-ayah').html(data.nama_ayah);
            $('#detail-nama-ibu').html(data.nama_ibu);
        });
    }

    function cetak() {
        swal({
            title: 'Cetak Kartu Keluarga?',
            text: "Anda akan mencetak kartu keluarga, pastikan anda sudah membaca mengenai pencetakan kartu keluarga!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cetak',
            cancelButtonText: 'Batal Cetak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url('admin/cetak_kk'); ?>",
                }).done(function () {
                    swal(
                        'Berhasil Cetak!',
                        'Pencetakan kartu keluarga akan segera diproses oleh admin.',
                        'success'
                    ).then(res => {
                        if (res.value) {
                            location.reload();
                        }
                    });
                });
            }
        })
    }
</script>
</body>
</html>