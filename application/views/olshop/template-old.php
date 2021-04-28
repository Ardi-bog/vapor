<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?php if ($title != null || $title != '') {echo $title;}else{echo "Admin";} ?>          
    </title>
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cedeen.netlify.app/font-awesome-5-pro/css/all.min.css" />
    <link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/nicotine/css/footer-bs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/nicotine/css/slider.css">
    <?php 
        $primaryColor='c9d5ff';
        $secondColor='e4eaff';
     ?>
    <style type="text/css">
      .topBar {
          padding-top: 10px;
          padding-bottom: 5px;
          background: #<?= $primaryColor ?>;
          border-bottom: 2px solid #<?= $secondColor ?>;
      }
      .navbar-default {
          background: #<?= $primaryColor ?>;
          border-bottom: 2px solid #<?= $secondColor ?>;
      }
      .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
        background:#<?= $primaryColor ?>;
        color:white;
      }
      .navbar-default .navbar-nav>li>a {
          color: #fff;
      }
      .navbar-default .navbar-nav>li>a:hover {
          color: orange;
      }
      .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
          color: yellow;
          background-color: orange;
      }
      .navbar {
          position: relative;
          min-height: 50px;
          margin-bottom: 20px;
          border: 1px solid transparent;
      }
      .middleBar {
          background: #<?= $secondColor ?>;
          border: 1px solid #<?= $secondColor ?>;
          color: #fff !important;
      }
      .middle-bar-logo{
        width: 150px !important;
        height: 100% !important;
        transition: 0.3s;
      }
      .middle-bar-logo:hover{
        width: 160px !important;
      }
      .text-warning{
        color: yellow !important;
      }
      .wa{
        color: #fff !important;
        font-size: 14px;
        transition: 0.3s;
        font-weight: bold;
        margin-top: -100px !important;
      }
      .btn-success{
        border-radius: 10px!important;
      }
      .btn-wa {
          background: green;
          border: 1px solid #449D44;
          color: #fff;
          transition: 0.3s;
      }
      .btn-wa:hover {
          background: #449D44;
          color: #fff;
      }
      .btn-default {
          background: #<?= $primaryColor ?>;
          border: 1px solid #<?= $primaryColor ?>;
          color: #f0ff00;
          margin: 10px;
      }
      .btn-default:hover {
          background: #<?= $primaryColor ?>;
          color: #fff;
          margin: 10px;
      }
      .btn-flat{
        border-radius: 0px !important;
      }
      .dropdown-menu {
          width: 400px !important;
      }
      .header-item{
        display: inline-block;
      }
      .header-item sub {
        background:navy;
        padding: 5px 8px;
        margin-left: -15px;
        border-radius: 100%;
        border:1px solid navy;
        color:white;
      }
      .hr{
        margin-top: -10px;
        margin-bottom: 30px;
        border-bottom: 2px dashed navy;
      }
      .thumbnails li> .fff .caption { 
          background:#<?=$primaryColor ?> !important; 
          padding:10px
      }
      .menuslider { 
          background-color: 1px solid #<?=$secondColor ?> !important; 
      }
    </style>
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <div class="content-wrapper">

        <section class="content">
            <?php echo $contents; ?>
        </section>
        <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="footer-bs">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(''); ?>asset/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
      // Carousel Auto-Cycle
      $(document).ready(function() {
        $('#myCarousel').carousel({
          interval: 6000
        });
      });
    </script>
  </body>
</html>