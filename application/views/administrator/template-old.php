<?php 
if ($this->session->level==''){
    redirect(base_url());
}else{
?>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/select2/select2.min.css">
    <!-- x -->
    <!-- sweet alert -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/sweet-alert/sweetalert2.min.css">
    <!-- x -->
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script src="<?php echo base_url(''); ?>asset/ckeditor/ckeditor.js"></script>
    <style type="text/css">
      @media only screen and (max-width: 600px) {
        #example1 {
          overflow: auto !important; display: block !important;
        }
      } 
    
      #example thead tr, #table1 thead tr, #example1 thead tr, #example2 thead tr
      { background-color: #e3e3e3; } 
    
      .checkbox-scroll 
      { border:1px solid #ccc; width:100%; height: 114px; padding-left:8px; overflow-y: scroll; }

      /*///////////////////////////////////////////////////////////*/
      /*header*/
      .navbar{
        background-color: white !important;
      }
      /*tombol pada sidebar */
      .sidebar-toggle {
          color: #3A352F !important;
      }
      /*background navbar brand*/
      .logo{
          background-color: #292521 !important;
      }
      /*tombol pojok kanan*/
      .skin-blue .main-header .navbar .nav>li>a {
          color: #83502E !important;
      }
      /*header in menu */
      .skin-blue .sidebar-menu>li.header {
          color: #4b646f;
          background-color: #292521 !important;
      }
      /* aktif menu*/
      .skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a {
          background: #292521 !important;
          border-left-color: brown !important;
      }
      /*backgrund warna pada side bar*/
      .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
          background-color: #3A352F !important;
      }
      /*warna tombol pada menu di side bar*/
      .skin-blue .treeview-menu>li>a {
          color: #fff;
      }
      /*menu pada saat hover*/
      .skin-blue .treeview-menu>li>a:hover {
          color: #fff;
      }
      /*background warna di dalam menu*/
      .skin-blue .sidebar-menu>li>.treeview-menu {
          margin: 0 1px;
          background: #83502E;
      }
      /*warna border pada konten*/
      .box.box-default {
          border-top-color: #83502E !important;
      }
      /*warna tombol default*/
      .btn-default {
          background-color: #83502E !important;
          border-color: #292521 !important;
          color: white !important;
      }
      /*pace progress bar*/
      .pace .pace-progress {
          background:#83502E !important;
          height: 3px !important;
      }
      .pace .pace-activity {
        border-top-color: #83502E !important;
        border-left-color: #83502E !important;
        width: 18px !important;
        height: 18px !important;
    }
    /*pagination*/
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        background-color: #83502E !important;
        border-color: #292521 !important;
    }
    </style>
      <link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.css">
    <script type="text/javascript">
    function nospaces(t){
        if(t.value.match(/\s/g)){
            alert('Maaf, Tidak Boleh Menggunakan Spasi,..');
            t.value=t.value.replace(/\s/g,'');
        }
    }
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php 
            if ($this->session->level =='super-admin') {
              include "menu-admin.php";
            }else{
              include "menu-admin-wil.php";
            }

          ?>
      </aside>

      <div class="content-wrapper">

        <section class="content-header">
          <h1> Dashboard Admin 
            <?php 
              if ($this->session->level =='super-admin') {
                  echo "";
              }else{
                  echo $this->session->nama_kota;
              }
             ?> 
          <small>Control panel </small> </h1>
        </section>

        <section class="content">
            <?php echo $contents; ?>
        </section>
        <div style='clear:both'></div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(''); ?>asset/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>asset/admin/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/dist/js/jquery.nestable.js"></script>
    <!-- select 2 -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/select2/select2.min.js"></script>
    <!-- sweet alert -->
    <script src="<?php echo base_url(); ?>asset/admin/sweet-alert/sweetalert2.min.js"></script>
    <!-- x -->
    <script>
    $('#rangepicker').daterangepicker();
    $('.datepicker').datepicker();
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

  <script>
    CKEDITOR.replace('editor1' ,{
      filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder'); ?>'
    });
  </script>
  <script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });
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


   $(document).ready(function(){
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
    });


    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
       return this.href == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
       return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    // const updateidentitasweb=document.querySelector('#updateidentitasweb');
    // updateidentitasweb.addEventListener('click',function(e){
    //   Swal.fire({
    //     title:'Data Identitas Web',
    //     text:'Berhasil di Update',
    //     type:'success',
    //     icon:'success'
    //   });
    // });
  </script>
  </body>
</html>
<?php } ?>
