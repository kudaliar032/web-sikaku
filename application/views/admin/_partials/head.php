<?php
$page = $this->uri->segment(2);

switch ($page) {
    case '':
        $page_name = 'Home';
        break;
    case 'tambah_data':
        $page_name = 'Tambah Data';
        break;
    case 'ubah_data':
        $page_name = 'Ubah Data';
        break;
    case 'lacak_pengiriman':
        $page_name = 'Lacak Pengiriman';
        break;
    case 'bantuan':
        $page_name = 'Bantuan';
        break;
    default:
        $page_name = 'Not found';
}
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title>ADMIN | <?php echo $page_name; ?></title>

<!-- Vali Admin -->
<link href="<?php echo base_url('vali-admin/docs/css/main.css'); ?>" rel="stylesheet"/>

<!-- Fontawesome 4.7.0 -->
<link href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css'); ?>" rel="stylesheet"/>

<!-- Sweetalert -->
<link href="<?php echo base_url('assets/plugins/sweetalert2-7.29.0/dist/sweetalert2.min.css'); ?>" rel="stylesheet"/>