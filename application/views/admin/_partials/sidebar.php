<?php
$page = $this->uri->segment(2);
?>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li><a class="app-menu__item <?php echo $page == '' ? 'active' : null; ?>" href="<?php echo base_url('admin'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item <?php echo $page == 'ubah_data' ? 'active' : null; ?>" href="<?php echo base_url('admin/ubah_data'); ?>"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Ubah Data</span></a></li>
        <li><a class="app-menu__item <?php echo $page == 'kehilangan' ? 'active' : null; ?>" href="<?php echo base_url('admin/kehilangan'); ?>"><i class="app-menu__icon fa fa-plus-square-o"></i><span class="app-menu__label">Kehilangan KK</span></a></li>
        <li><a class="app-menu__item <?php echo $page == 'lacak_pengiriman' ? 'active' : null; ?>" href="<?php echo base_url('admin/lacak_pengiriman'); ?>"><i class="app-menu__icon fa fa-location-arrow"></i><span class="app-menu__label">Lacak Pengiriman</span></a></li>
        <li><a class="app-menu__item <?php echo $page == 'bantuan' ? 'active' : null; ?>" href="<?php echo base_url('admin/bantuan'); ?>"><i class="app-menu__icon fa fa-info-circle"></i><span class="app-menu__label">Bantuan</span></a></li>
    </ul>
</aside>