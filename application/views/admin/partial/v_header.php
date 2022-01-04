<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php if ($this->session->userdata('role_id')==2): ?>
        <title><?php echo 'Member Area' ?></title>
    <?php else: ?>
        <title>Admin - Atoze Capital</title>
    <?php endif ?>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo base_url() ?>/assets/admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="<?php echo base_url() ?>/assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/admin/css/custom_style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/vendor/toastr/css/toastr.min.css">
    <link href="<?php echo base_url() ?>/assets/admin/vendor/summernote/summernote.css" rel="stylesheet">




</head>

<body>

    <!--*******************
        Preloader start
        ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
    <!--*******************
        Preloader end
    ********************-->