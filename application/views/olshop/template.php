<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?php if ($title != null || $title != '') {echo $title;}else{echo "Halaman Depan";} ?>          
    </title>
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>asset/admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>asset/admin/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/pages/app-ecommerce-details.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/nicotine/css/footer-bs.css">
    <!-- FONT Awesome -->
    <script src="https://kit.fontawesome.com/27c970a153.js" crossorigin="anonymous"></script>
    <!-- END: Page CSS-->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <?php 
        $primaryColor='c9d5ff';
        $secondColor='e4eaff';
     ?>

     <?php if ($this->session->costumer == ''): ?>
        <script type="text/javascript">
             $(window).on('load',function(){
                var delayMs = 0; // delay in milliseconds
                
                setTimeout(function(){
                    $('#myModalnamaUser').modal('show');
                }, delayMs);
                $('#myModalnamaUser').modal({backdrop: 'static', keyboard: false})  
            });   
         </script>
     <?php endif ?>

    
  </head>
  <body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" style="overflow-x: hidden;">

      
      <?php include "main-header.php"; ?>

      <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
              <div class="content-header row">
              </div>
              <div class="content-body">
              <?php echo $contents; ?>
              </div>
        </div>
    </div><!-- /.content-wrapper -->
      

          <?php include "footer.php"; ?>

    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
        // function changeSub(){
        //     var id = $(".id").val();
        //     var qty = parseInt($(".jumlha").val());
        //     var price = parseInt($(".harga").val());
        //     var amount = (qty*price)
        //     alert(id);
        //     document.getElementsByClassName("subtotal").value = amount;
        // }
        $('#banner').carousel({
            interval: 5000,
            cycle: true,
            pause: null
        })
    </script>
  </body>
</html>