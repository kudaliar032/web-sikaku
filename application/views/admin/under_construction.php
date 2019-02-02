<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/_partials/head") ?>
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar -->
<?php $this->load->view('admin/_partials/navbar'); ?>

<!-- Sidebar -->
<?php $this->load->view('admin/_partials/sidebar'); ?>

<!-- Main Content -->
<main class="app-content">
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i> Error 503: Page under construction</h1>
        <p>The page you have requested is under construction.</p>
        <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
    </div>
</main>

<!-- Javascript DKK -->
<?php $this->load->view('admin/_partials/js'); ?>
</body>
</html>