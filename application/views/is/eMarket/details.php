<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" href="../iPOS/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../iPOS/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/pages/app-ecommerce-details.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <?php include 'inc/header.php';?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Detail Produk</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">eMarket</a></li>
                                    <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                                    <li class="breadcrumb-item active">Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                            	<a class="dropdown-item" href="#">Chat</a>
                                <a class="dropdown-item" href="#">Email</a>
                                <a class="dropdown-item" href="#">Calendar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5 mt-2">
                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../iPOS/app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="product image">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="display-4">Nama Produk</h5>
                                    <p class="text-muted">Kategori</p>
                                    <div class="ecommerce-details-price d-flex flex-wrap">
                                        <p class="text-primary font-medium-3 mr-1 mb-0">Rp.000.000,00</p>
                                    </div>
                                    <hr>
                                    <p>Deskripsi</p>
                                    <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Pengiriman
                                    </p>                                   
                                    <hr>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pilih warna</label>
                                        <ul class="list-unstyled mb-0 product-color-options">
                                            <li class="d-inline-block selected">
                                                <div class="color-option b-primary">
                                                    <div class="filloption bg-primary"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-success">
                                                    <div class="filloption bg-success"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-danger">
                                                    <div class="filloption bg-danger"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-warning">
                                                    <div class="filloption bg-warning"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-black">
                                                    <div class="filloption bg-black"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <p>Tersedia - <span class="text-success">Stok Ada</span></p>

                                    <div class="d-flex flex-column flex-sm-row">
                                        <form action="cart.php">
                                        <button type="submit" class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>MASUKKAN CART</button>
                                        </form>
                                        <button type="submit" class="btn btn-outline-danger" id="type-success"><i class="feather icon-heart mr-25"></i>SUKA</button>
                                    </div>
                                    <hr>
                                    <h5 class="display-4"><i class="feather icon-share-2"></i> Bagikan</h5>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1"><i class="feather icon-facebook"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1"><i class="feather icon-twitter"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1"><i class="feather icon-phone"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1"><i class="feather icon-instagram"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="item-features py-5">
                            <div class="row text-center pt-2">
                                <div class="col-12 col-md-4 mb-4 mb-md-0 ">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-award text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">100% Original</h5>
                                        <p>Jaminan kualitas produk.</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-truck text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">Pengiriman</h5>
                                        <p>Pengiriman aman</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-4 mb-md-0">
                                    <div class="w-75 mx-auto">
                                        <i class="feather icon-shield text-primary font-large-2"></i>
                                        <h5 class="mt-2 font-weight-bold">Garansi</h5>
                                        <p>Garansi produk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mt-4 mb-2 text-center">
                                <h2>PRODUK LAINNYA</h2>
                                <p>Pencarian terpopuler</p>
                            </div>
                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">
<!--------------------------------------------------SCRIPT---------------------------------------->                                    
                                    <div class="swiper-slide rounded swiper-shadow">
                                       <a href="details.php"> 
                                        <div class="item-heading">
                                            <p class="text-truncate mb-0">Nama Produk</p>
                                            <p>
                                                <small>by</small>
                                                <small>Kategori</small>
                                            </p>
                                        </div>
                                        <div class="img-container w-50 mx-auto my-2 py-75">
                                            <img src="../iPOS/app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                        </div>
                                        <div class="item-meta">                                            
                                            <p class="text-primary mb-0">Rp.000.000,00</p></a>
                                        </div>
                                    </div>
<!--------------------------------------------------SCRIPT---------------------------------------->                                    
                                    
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- app ecommerce details end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'inc/footer.php';?>


    <!-- BEGIN: Vendor JS-->
    <script src="../iPOS/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../iPOS/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../iPOS/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../iPOS/app-assets/js/core/app-menu.js"></script>
    <script src="../iPOS/app-assets/js/core/app.js"></script>
    <script src="../iPOS/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../iPOS/app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <script src="../iPOS/app-assets/js/scripts/forms/number-input.js"></script>
    <script src="../iPOS/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>