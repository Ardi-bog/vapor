<?php 
if ($this->session->level==''){
    redirect(base_url());
}else{
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>
      <?php if ($title != null || $title != '') {echo $title;}else{echo "Admin";} ?>          
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content=""> 
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>asset/admin/app-assets/images/ico/apple-icon-120.png">
    <?php $logo  = $this->model_app->view_where('logo',array('NAMA_WEB'=>'vaporhitz'))->row()->GAMBAR; ?>
    <link rel="shortcut icon" href="<?php echo base_url() ?>asset/logo/<?= $logo ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/charts/apexcharts.css">
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/admin/app-assets/vendors/css/charts/apexcharts.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/select2/select2.min.css">
    <!-- FONT Awesome -->
    <script src="https://kit.fontawesome.com/27c970a153.js" crossorigin="anonymous"></script>
    <!-- END: Page CSS-->    
    <style type="text/css">
      /*pace progress bar*/
      .pace .pace-progress {
          background:#00CCFF !important;
          height: 4px !important;
      }
      .pace .pace-activity {
        border-top-color: #83502E !important;
        border-left-color: #83502E !important;
        width: 18px !important;
        height: 18px !important;
    }
    .datepicker {
      z-index: 9999 !important; /* has to be larger than 1050 */
    }
    .ui-datepicker { z-index: 9999 !important; }

    #nav-justified:fullscreen {
      background-color: #fff;
      height: 100%;
      padding-top: 100px;
      overflow-y: scroll; 
      overflow-x: hidden; 
    }

    /* edit desain filter data table*/
    #DataTables_Table_0_filter{
      text-align: right;
      margin-bottom: 10px;
    }

    #DataTables_Table_0_length{
      display: none;
    }
    /*end */

    </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script type="text/javascript">
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
   
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
   
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    </script>

</head>
<!-- END: Head-->
  
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

      <?php include "inc/main-header.php"; ?>

      <?php 
        if ($this->session->level =='super-admin') {
          include "inc/menu-admin.php";
        }else{
          include "inc/menu-admin-wil.php";
        }

        if ($this->session->level =='super-admin') {
            echo "";
        }else{
            echo $this->session->nama_kota;
        }

        echo "
        <div class='app-content content'>
        <div class='content-overlay'></div>
        <div class='header-navbar-shadow'></div>
        <div class='content-wrapper'>
             <h2 class='content-header-title float-left mb-0'>Apps iPOS</h2>
               <div class='breadcrumb-wrapper col-12'>
                  <ol class='breadcrumb'>
                     <li class='breadcrumb-item'>$title</a></li>                     
                  </ol>
                </div>
            <!-- Nav Justified Starts -->
                <section id='nav-justified'>
                  <div class='row'>
                    <div class='col-sm-12'>
                      <div class='card overflow-hidden'>                                
                        <div id='cont' class='card-content'>
                           <div class='card-body'>";
                          echo $contents; 
                      echo "</div>
                         </div>
                       </div>
                     </div>
                  </div>
              </section>
              <!-- Nav Justified Ends -->
            
            </div>    
      </div>
    <!-- END: Content-->";


        ?>

        
          <?php include "inc/footer.php"; ?>
    
    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/core/app.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url() ?>asset/admin/data-list-view-2.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/scripts/pages/invoice.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>asset/admin/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- select 2 -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/select2/select2.min.js"></script>
    <script type="text/javascript">
      function changeColor1(){
        var _color = $("#colorChange1").val().toLowerCase();
        $("#abc1").css('background',_color)
      }
      function changeColor2(){
        var _color = $("#colorChange2").val().toLowerCase();
        $("#abc2").css('background',_color)
      }
      function changeColor3(){
        var _color = $("#colorChange3").val().toLowerCase();
        $("#abc3").css('background',_color)
      }

      function nospaces(t){
          if(t.value.match(/\s/g)){
              alert('Maaf, Tidak Boleh Menggunakan Spasi,..');
              t.value=t.value.replace(/\s/g,'');
          }
      }


       $(document).ready(function(){
          // edit desain filter data table
          $(".dataTables_filter input").addClass('custom-classes');
          $(".custom-classes").attr("placeholder", "Cari data disini..");

          $(".custom-classes").toggleClass("form-control-sm", "form-control-md");
          // end

          $('#state').change(function(){
            var state_id = $(this).val();
            $.ajax({
              type:"POST",
              url:"<?php echo site_url('administrator/city'); ?>",
              data:"stat_id="+state_id,
              success: function(response){
                $('#city').html(response);
              }
            })
          });
          $('#provinsi').change(function(){
            var state_id = $(this).val();
            $.ajax({
              type:"POST",
              url:"<?php echo site_url('administrator/city'); ?>",
              data:"stat_id="+state_id,
              success: function(response){
                $('#kota').html(response);
              }
            })
          });
          
          $("#cariKota").select2({
             ajax: { 
               url: '<?= base_url() ?>/administrator/cariKotas',
               type: "post",
               dataType: 'json',
               delay: 250,
               data: function (params) {
                  return {
                    kata: params.term // search term
                  };
               },
               processResults: function (response) {
                  return {
                     results: response
                  };
               },
               cache: true
             }
         });

          $(".produkSearch").select2({
             ajax: { 
               url: '<?= base_url() ?>/administrator/cariMenus',
               type: "post",
               dataType: 'json',
               delay: 250,
               data: function (params) {
                  return {
                    kata: params.term // search term
                  };
               },
               processResults: function (response) {
                  return {
                     results: response
                  };
               },
               cache: true
             }
         });

        });
       // end on document rready
       $('#fullscreen').click(function() {
            var elem = document.getElementById("nav-justified");
            if (elem.requestFullscreen) {
              elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
              elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
              elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
              elem.webkitRequestFullscreen();
            }

            $('#fullscreen').attr('style', 'display: none');
            $('#close').attr('style', 'display: block');
        });
       $('#close').click(function() {
            var elem = document.getElementById("nav-justified");
            if (document.exitFullscreen) {
              document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
              document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
              document.msExitFullscreen();
            }

            $('#close').attr('style', 'display: none');
            $('#fullscreen').attr('style', 'display: block');
        });

      $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
          clearBtn: true,
          todayHighlight: true
        }); 

      $("#myInputSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelid tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });  

      $("#scanBarcode").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelid tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });  
    </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
<?php } ?>
