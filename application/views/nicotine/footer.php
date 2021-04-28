<?php 
  $where=array('NAMA_WEB'=>'nicotine');
  $logo = $this->model_app->edit('logo',$where)->row_array();
  $where=array('NAMA_WEBSITE'=>'nicotine');
  $identitas = $this->model_app->edit('identitas_web',$where)->row_array();
  if ($identitas[FACEBOOK] == '') {
      $facebook='#';
  }else{
     $facebook= $identitas[FACEBOOK];
  }


  if ($identitas[INSTAGRAM] == '') {
      $instagram='#';
  }else{
     $instagram= $identitas[INSTAGRAM];
  }

  if ($identitas[TWITTER] == '') {
      $twitter='#';
  }else{
     $twitter= $identitas[TWITTER];
  }

 ?>
    <div class="row footer-bs">
    	<div class="col-lg-3 footer-brand animated fadeInLeft">
        	<h2><img style="background-color: white;" width="150" class="middle-bar-logo" src="<?php echo base_url(); ?>asset/logo/<?=$logo[GAMBAR] ?>"/></h2>
            <p><?= $identitas[DESKRIPSI] ?></p>
            <p>© <?= date('Y') ?>, All rights reserved</p>
        </div>
  
    	<div class="col-lg-2 footer-social animated fadeInDown">
        	<p>Follow Us</p>
        	<div class="row">
        		<div class="col">
        			<a target="_blank" href="<?= $facebook ?>" style="margin-left:5px;margin-right: 10px;"><i class="fab fa-facebook-square fa-2x"></i></a>
        			<a target="_blank" href="<?= $instagram ?>" style="margin-right: 10px;"><i class="fab fa-instagram fa-2x"></i></a>
        			<a target="_blank" href="<?= $twitter ?>"><i class="fab fa-twitter-square fa-2x"></i></a>
        		</div>
        	</div>
        </div>
    </div>