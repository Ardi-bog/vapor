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
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/file-uploaders/dropzone.min.css">
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
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/extensions/sweetalert2.min.css">
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Upload</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">eMarket</a></li>
                                    <li class="breadcrumb-item active">Upload Bukti Pembayaran</li>
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
                <!-- Dropzone section start -->
                <section id="dropzone-examples">

                    <!-- warnings and info alerts starts -->
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="alert alert-danger" role="alert">
                                <strong>Upload!</strong> Silahkan unggah bukti transfer anda disini
                            </div>
                            
                        </div>
                    </div>
                    <!-- warnings and info alerts ends -->
					
                    <!-- single file upload starts -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kolom unggah bukti transfer</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">                                       
                                        
                                        <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumb">
                                            <div class="dz-message">Letakkan File Di Sini Untuk Diunggah/ Klik</div>
                                        </form>
                                        
                                    </div>
                                    <div class="text-center">
                                    <a href="invoice.php" class="btn btn-primary ml-50 mb-50 text-white" id="type-success">
                                    	Kirim Bukti Pembayaran & Cetak</a>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single file upload ends -->
                    
                    

                </section>
                <!-- // Dropzone section end -->

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
    <script src="../iPOS/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/ui/prism.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../iPOS/app-assets/js/core/app-menu.js"></script>
    <script src="../iPOS/app-assets/js/core/app.js"></script>
    <script src="../iPOS/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../iPOS/app-assets/js/scripts/extensions/dropzone.js"></script>
    <script src="../iPOS/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>