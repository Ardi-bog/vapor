<?php 
  $where=array('NAMA_WEB'=>'nicotine');
  $logo = $this->model_app->edit('logo',$where)->row_array();
 ?>
<!--=========-TOP_BAR============-->
<nav class="topBar">
  <div class="container">
   <ul class="topBarNav pull-right">
     <li style="color: navy;font-weight: bold;"><span>Kirim pertanyaan? </span>
      <a class="btn btn-wa btn-xs" href="https://api.whatsapp.com/send?phone=088777&text=Hallo Admin" target="_blank"> &nbsp;&nbsp;&nbsp;<i class="fab fa-whatsapp fa-2x"></i>&nbsp; <span style="margin-top: 100px;" class="wa">088777</span></a></li>
   </ul>
  </div>
</nav><!--=========-TOP_BAR============-->

  
 <!--=========MIDDEL-TOP_BAR============-->
    
<div class="middleBar">
 <div class="container">
  <div class="row display-table">
    <div class="col-sm-3 vertical-align text-left hidden-xs">
     <a href="#" class="text-uppercase"> <img class="middle-bar-logo" src="<?php echo base_url(); ?>asset/logo/<?=$logo[GAMBAR] ?>"/></a>
    </div>
    <!-- end col -->
    <div class="col-sm-7 vertical-align text-center" style="padding-top: 20px;">
      <form method="post" action="?menu=cari">
        <div class="row grid-space-1">
          <div class="col-sm-9">
            <input type="text" placeholder="cek pesanan" name="textcari" id="txtcari" class="form-control input-lg">
         </div>          
          <div class="col-sm-3">
            <input type="submit" class="btn btn-info btn-block btn-lg" value="Cek Pesanan">
         </div>
         <div id="hasil"></div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </form>
    </div>
    <!-- end col -->
    <div class="col-sm-2 vertical-align header-items hidden-xs" style="padding-top: 30px;">
      <div class="header-item mr-5">        
        <a data-toggle="tooltip" data-placement="top" title=""> 
          <i class="fas fa-concierge-bell fa-2x text-info"></i> <sub>6</sub> </a>        
      </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end  row -->
</div>
</div>

<!-- end midle mavbar -->