<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <link rel="stylesheet" href="<?= base_url();?>asset/emarket/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">    
    <link rel="apple-touch-icon" href="<?= base_url();?>asset/emarket/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>asset/emarket/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>asset/emarket/app-assets/css/pages/app-ecommerce-details.css">
    <!-- END: Page CSS-->
    

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <?php include 'inc/header.php';?>


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              <!-- <h3 class="display-4 text-center"style="color:#2980b9">Selamat Datang Di Toko Kami</h3> -->
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">                       
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card">                                
                               
                               <div class="card-content">
                                    <div class="card-body p-0">
                                        <div id="banner" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                
                                                <li data-target="#banner" data-slide-to="0" class="active"></li>
                                                
                                                <li data-target="#banner" data-slide-to="1"></li>
                                                
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
<!--------------------------------------------------SCRIPT LIMIT 1---------------------------------------->
                                                <div class="carousel-item active">
                                                    <img src="<?= base_url();?>asset/emarket/app-assets/images/banner/banner-7.jpg" width="1980" height="660" class="img-fluid">
                                                    <div class="carousel-caption">
                                                        <!-- <h3>First Slide Label</h3>
                                                        <p>Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I love donut sweet
                                                            chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.</p> -->
                                                    </div>
                                                </div>
<!--------------------------------------------------SCRIPT LIMIT 1---------------------------------------->

<!--------------------------------------------------SCRIPT RANDOM---------------------------------------->
                                                <div class="carousel-item">
                                                    <img src="<?= base_url();?>asset/emarket/app-assets/images/banner/banner-9.jpg" width="1980" height="660" class="img-fluid">
                                                    <div class="carousel-caption">
                                                        <!-- <h3>Second Slide Label</h3>
                                                        <p>Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes
                                                            chocolate cake gummies. Cupcake cake I love cake danish carrot cake.</p> -->
                                                    </div>
                                                </div>
<!--------------------------------------------------SCRIPT RANDOM---------------------------------------->
                                            </div>
                                            <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
<div class="container">
       <div class="row justify-content-center">
          <div class="col-10 kotak">
            <div class="row ">
              <div class="col-lg">
                <img src="<?= base_url();?>asset/emarket/app-assets/img/features_1.png "class="float-left"style="height: 150px;">
                <h4><b><i> Customer Service</i></b></h4>
                <p>Layanan tim support yang selalu cepat dan tanggap menangani keluhan anda.</p>
              </div>
              <div class="col-lg">
                <img src="<?= base_url();?>asset/emarket/app-assets/img/features_6.png"class="float-left" style="height: 150px;">
                <h4><b><i>Fitur Produk Lengkap</i></b></h4>
                <p>Menawarkan berbagai fitur terbaru.</p>
              </div>
              <div class="col-lg">
                <img src="<?= base_url();?>asset/emarket/app-assets/img/features_2.png"class="float-left" style="height: 150px;">
                <h4><b><i>Berbagai Macam Produk</i></b></h4>
                <p>Produk bervariatif</p>
              </div>
           </div>
            
          </div>
        </div>                       
         </div>   
                    <div class="row">
                        <div class="col-md-12 col-12"style="margin-top:50px;">
                            <div class="card p-0">
                             <div class="divider">
                                  <div class="divider-text display-4 "><h5 class="text-primary">Produk Toko Kami</h5></div>
                               </div>
                              <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                               <div class="row">
<!--------------------------------------------------SCRIPT---------------------------------------->
                                <div class="swiper-wrapper col-lg-4 col-6">
                                    <div class="swiper-slide rounded swiper-shadow border border-success">
                                        <div class="item-heading">
                                            <p class="text-truncate mb-0">
                                                Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                            </p>
                                            <p>
                                                <small>by</small>
                                                <small>Bowers & Wilkins</small>
                                            </p>
                                        </div>
                                        <div class="img-container w-50 mx-auto my-2 py-75">
                                            <img src="<?= base_url();?>asset/emarket/app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                        </div>
                                        <div class="item-meta">
                                            <div class="product-rating">
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-secondary"></i>
                                            </div>
                                            <p class="text-primary mb-0">$19.98</p>
                                        </div>
                                    </div>
                                   </div>
                                   
<!--------------------------------------------------SCRIPT---------------------------------------->
<div class="swiper-wrapper col-lg-4 col-6">
                                    <div class="swiper-slide rounded swiper-shadow border border-success">
                                        <div class="item-heading">
                                            <p class="text-truncate mb-0">
                                                Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                            </p>
                                            <p>
                                                <small>by</small>
                                                <small>Bowers & Wilkins</small>
                                            </p>
                                        </div>
                                        <div class="img-container w-50 mx-auto my-2 py-75">
                                            <img src="<?= base_url();?>asset/emarket/app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                        </div>
                                        <div class="item-meta">
                                            <div class="product-rating">
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-secondary"></i>
                                            </div>
                                            <p class="text-primary mb-0">$19.98</p>
                                        </div>
                                    </div>
                                   </div>
                               
<!--------------------------------------------------SCRIPT---------------------------------------->
                                   <div class="swiper-wrapper col-lg-4 col-6">
                                    <div class="swiper-slide rounded swiper-shadow border border-success">
                                        <div class="item-heading">
                                            <p class="text-truncate mb-0">
                                                Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                            </p>
                                            <p>
                                                <small>by</small>
                                                <small>Bowers & Wilkins</small>
                                            </p>
                                        </div>
                                        <div class="img-container w-50 mx-auto my-2 py-75">
                                            <img src="<?= base_url();?>asset/emarket/app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                        </div>
                                        <div class="item-meta">
                                            <div class="product-rating">
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-warning"></i>
                                                <i class="feather icon-star text-secondary"></i>
                                            </div>
                                            <p class="text-primary mb-0">$19.98</p>
                                        </div>
                                    </div>
                                   </div>
<!--------------------------------------------------SCRIPT---------------------------------------->                                   
                                   </div>
                                 </div>                                
                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-12">
                            <div class="card">                               
                               <div class="divider">
                                  <div class="divider-text display-4"><h5>Promo Hari Ini</h5></div>
                               </div>
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <div id="promo" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                
                                                <li data-target="#promo" data-slide-to="0" class="active"></li>
                                                
                                                <li data-target="#promo" data-slide-to="1"></li>
                                                
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                
                                                <div class="carousel-item active">
                                                    <img src="../iPOS/app-assets/images/banner/banner-27.jpg" class="img-fluid">
                                                    <div class="carousel-caption">
                                                        <h3>First Slide Label</h3>
                                                        <p>Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I love donut sweet
                                                            chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="carousel-item">
                                                    <img src="../iPOS/app-assets/images/banner/banner-29.jpg" class="img-fluid">
                                                    <div class="carousel-caption">
                                                        <h3>Second Slide Label</h3>
                                                        <p>Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes
                                                            chocolate cake gummies. Cupcake cake I love cake danish carrot cake.</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <a class="carousel-control-prev" href="#promo" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#promo" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->
<!--                     
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                       
                                       
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">                               
                                <div class="card-content">
                                	<div class="card-body">
                                       
                                       
                                       
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    
             </div>
          </div>
        </div>
      </div>
   </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

   <?php include 'inc/footer.php';?>


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url();?>asset/emarket/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url();?>asset/emarket/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="<?= base_url();?>asset/emarket/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?= base_url();?>asset/emarket/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="<?= base_url();?>asset/emarket/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url();?>asset/emarket/app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url();?>asset/emarket/app-assets/js/core/app.js"></script>
    <script src="<?= base_url();?>asset/emarket/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url();?>asset/emarket/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>