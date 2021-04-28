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
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <!-- END: Page CSS-->    

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php include 'inc/header.php' ;?>

    <!-- BEGIN: Content-->
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                                        <img src="app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Grafik Penjualan</h1>
                                            <p class="m-auto w-75">Penjualan anda mencapai <strong>57.6%</strong> silahkan tingkatkan transaksi anda.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    
                        <div class="col-md-9 col-12">
                        
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rating Penjualan Terbaik</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body p-0 m-0">
                                        <div id="bar-chart" class="height-400"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                        </div>
                        
                        
                        
                   </div> 
                        
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">                            
                                <div class="card-header">
                                	<ul class="list-inline p-1 d-flex align-items-center">
                                        <li class="pr-1"><i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                        		Transfer ATM</li>
                                        <li class="pr-1"><i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                        		Internet Banking</li>
                                        <li class="pr-1"><i class="fa fa-circle font-small-3 text-warning mr-25"></i>
                                        		Cash On Delivery</li>
                                    </ul>
                                    <h4 class="mb-1">Daftar Pesanan</h4>
                                </div>
                                <div class="card-content">
                                   
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ANGGOTA</th>
                                                    <th>TOTAL BELANJA</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                               
                                                <tr>
                                                    <td>
                                                        <ul class="list-group list-group-flush scrollable-container height-100">
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->                                                        </ul>
                                                    </td>                                                   
                                                    <td>
                                                       <span> > 1.000K</span>
                                                        <div class="progress progress-bar-danger mt-1 mb-0">
                                                             <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                         
                                                        	
                                                    </td>                                                   
                                                </tr>  
                                                <tr>
                                                    <td>
                                                        <ul class="list-group list-group-flush scrollable-container height-100">
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-warning mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-warning mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->                                                        </ul>
                                                    </td>                                                   
                                                    <td>
                                                        <span> 500 - 1.000K</span>
                                                        <div class="progress progress-bar-warning mt-1 mb-0">
                                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <ul class="list-group list-group-flush scrollable-container height-100">
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->                                                        </ul>
                                                    </td>                                                   
                                                    <td>
                                                        <span> 100 - 500K</span>
                                                        <div class="progress progress-bar-info mt-1 mb-0">
                                                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <ul class="list-group list-group-flush scrollable-container height-100">
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->
															<li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->
                                                        </ul>
                                                    </td>                                                   
                                                    <td>
                                                        <span> < 100K</span>
                                                        <div class="progress progress-bar-secondary mt-1 mb-0">
                                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        
    <!-- END: Content-->

    <?php include 'inc/footer.php' ;?>


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/charts/echarts/echarts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->    
    <script src="app-assets/js/scripts/charts/chart-echart.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>