<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="<?= base_url();?>" name="base_url" />
  <title>FUDX</title>
  
  <!-- custom css -->  
  <link href='<?= base_url();?>assets/css/toastr.min.css' rel="stylesheet">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css' rel="stylesheet">
  <link href='<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css' rel="stylesheet">
  <link href='<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css' rel="stylesheet">
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/custom.css?ver=<?= time();?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css?ver=<?= time();?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css">
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon"/>
  <?php
    if (isset($css)) {
        load_css($css);
    }
  ?>
</head>