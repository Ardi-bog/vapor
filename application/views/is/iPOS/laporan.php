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
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/invoice.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Page CSS-->
    

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php include 'inc/header.php' ;?>
    <!-- BEGIN: Content-->
            <div class="content-body"> 
             <h2 class="content-header-title float-left mb-0">Apps iPOS</h2>
               <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">Laporan</a></li>                     
                  </ol>
                </div>
               
               <!-- Pick-A-Date Picker start -->
                <section id="pick-a-date">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">                                
                                <div class="col-md-4 col-12 mb-1">
                                    <h5 class="text-bold-500">Periode Awal</h5>                                    
                                    <form>
                                        <input type="text" class="form-control pickadate" />
                                    </form>
                                </div>
                                <div class="col-md-4 col-12 mb-1">
                                    <h5 class="text-bold-500">Periode Akhir</h5>                                    
                                    <form>
                                        <input type="text" class="form-control pickadate" />
                                    </form>
                                </div>
                                
                                <div class="col-md-4 col-12 mt-2 text-center">
                                	<button type="button" class="btn btn-success btn-lg waves-effect waves-light" aria-haspopup="true" aria-expanded="false"><i class="feather icon-check"></i> Cek Laporan</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Pick-A-Date Picker end -->
               
               
               <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-success btn-print waves-effect waves-light" aria-haspopup="true" aria-expanded="false"><i class="feather icon-printer"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                           <thead>
                                <tr>
                                    <th></th>
                                    <th>ID TRANSAKSI</th>
                                    <th>TANGGAL</th>
                                    <th>TOTAL PENJUALAN</th>
                                    <th>PRODUK</th>
                                    <th>PEMBELI</th>
                                    <th>PEMBAYARAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="product-name">0001</td>
                                    <td class="product-category">DD/MM/YY</td>
                                   	<td class="product-price">Rp.000.000,00</td>
                                    <td class="product-price">
                                    	<ul class="list-group list-group-flush">
                                            <li class="list-group-item">Produk-1</li>
                                            <li class="list-group-item">Produk-2</li>
                                            <li class="list-group-item">Produk-3</li>                                            
                                        </ul>
                                    </td>
                                    <td class="product-price">USER</td>
                                    <td class="product-action">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                        		Transfer ATM</li>
                                        <li class="list-group-item"><i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                        		Internet Banking</li>
                                        <li class="list-group-item"><i class="fa fa-circle font-small-3 text-warning mr-25"></i>
                                        		Cash On Delivery</li>
                                    </ul>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'inc/footer.php' ;?>
   


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    
    <script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/ui/data-list-view-2.js"></script>
    <script src="app-assets/js/scripts/pages/invoice.js"></script>
    <script src="app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>