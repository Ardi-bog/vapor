<!doctype html>
<html class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>.:VaporHitz:.</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>asset/logo/<?= $logo ?>">
<link href="<?php echo base_url() ?>asset/main/script/boilerplate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/fonts/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>asset/main/script/fonts/css/fontawesome.min.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url() ?>asset/main/script/respond.min.js"></script>
<script src="<?php echo base_url() ?>asset/main/script/js/jquery.js"></script>
<script src="<?php echo base_url() ?>asset/main/script/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>asset/main/script/js/popper.js"></script>
</head>
<body style="background-color:#121212">


 <div class="half">
    <div class="bg order-1 order-md-2">
    
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <!--ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol-->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url() ?>asset/main/img/banner-home-1.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <!--h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p-->
          </div>
        </div>
        
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>asset/main/img/banner-home-2.jpg" class="d-block w-100">
          <div class="carousel-caption d-none d-md-block">
            <!--h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p-->
          </div>
        </div>
       
      </div>
      <!--a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a-->
    </div>
    
    </div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3><img src="<?php echo base_url() ?>asset/main/img/Logo.png" width="250"></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <div class="text-center">
              	<a class="btn btn-danger btn-sm p-1" href="<?php echo base_url() ?>administrator">
                	<i class="fas fa-building"></i><br><small>VENOM</small></a>
              	<a class="btn btn-danger btn-sm p-1" href="#">
                	<i class="fas fa-store"></i><br><small>VAPORHITZ</small></a>
                <a class="btn btn-danger btn-sm p-1" href="<?php echo base_url() ?>nicotine">
                	<i class="fas fa-coffee"></i><br><small>NICOTINE</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="footer">
  <a href="#" class="btn btn-danger">© 2021 Copyright | VAPORHITZ.ID </a>
</div>
    
  </div>

<script>
$('.carousel').carousel({
  interval: 5000
})
</script>
</body>
</html>
