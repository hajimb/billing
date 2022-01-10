<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="<?= base_url();?>" name="base_url" />
  <title>FUDX</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- custom css -->  
  <link href='<?= base_url();?>assets/css/toastr.min.css' rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css' rel="stylesheet">
  <link href='<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css' rel="stylesheet">
  <link href='<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css' rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css?ver=<?= time();?>">
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon"/>

  <script>
    function goBack() {
      window.history.back();
    }
</script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>dashboard" class="nav-link"><img src="<?php echo base_url(); ?>assets/img/abs-name.png" style="height:40px;" class="img-responsive mb-2" alt=""></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" role="button" class="">Contact</a>
      </li> -->
      <?php if(in_array('Orders', $user_permission)): ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>order" class=" btn btn-danger mt-1" role="button"><strong>NEW ORDER </strong></a>
      </li>
      <?php endif; ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mt-1"> 
        <!-- <li class="nav-item">
            <a class="nav-link" href="#" role="button">
                <i class="header-icons fas fa-cogs"></i>
            </a>
        </li> -->
        <li class="nav-item">
            <button class="btn btn-outline-danger">
                <i class="header-icons fas fa-user mr-2"></i> <strong><?php echo $session_data['username']; ?></strong>
            </button>
           
        </li>
       <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="header-icons fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="header-icons fas fa-concierge-bell"></i>
            </a>
        </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">
            <i class="header-icons fas fa-history"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">
            <i class="header-icons fas fa-hand-sparkles"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">
            <i class="header-icons far fa-bell"></i>
        </a>
      </li> -->


      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url(); ?>login/logout"><i class="header-icons fas fa-power-off"></i></a>
      </li>
      
    </ul>
</nav> 
  <!-- /.navbar -->

  <!-- <div id="custom-target"></div>   -->
  <style>
    #custom-target {
      position: relative;
      width: 600px;
      height: 300px;
      border-style: solid;
    }

    .position-absolute {
      position: absolute;
    }

  </style>