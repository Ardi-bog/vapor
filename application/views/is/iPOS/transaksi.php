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
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Page CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php include 'inc/header.php' ;?>
            <div class="content-body"> 
             <h2 class="content-header-title float-left mb-0">Apps iPOS</h2>
               <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">Transaksi Gudang</a></li>                     
                  </ol>
                </div>
            <!-- Nav Justified Starts -->
                <section id="nav-justified">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card overflow-hidden">                                
                        <div class="card-content">
                           <div class="card-body">                                        
                             <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                <li class="nav-item">
                                   <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">Beli Barang</a></li>
                                <li class="nav-item">
                                   <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="true">Retur Barang</a></li>                                
                             </ul>
							<!-- Tab panes -->
                             <div class="tab-content pt-1">
                                <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                                   <div class="row">
                                        <div class="col-md-12 col-12">
                                           <div class="card">                                
                                              <div class="card-content">
                                                 <div class="card-body">
                                                    <div class="row">
                                                    	<div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="beli_kategori">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        <div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="beli_subkategori">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        <div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="beli_produk">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        
                                                    </div>  
                                                    <div class="row">
                                                      <div class="col-6">
                                                      	<fieldset>
                                                           <div class="input-group">
                                                             <div class="input-group-append" id="button-addon2">
                                                                <button class="btn btn-primary btn-sm" type="button">
                                                                    <i class="fa fa-mobile fa-2x"></i></button>
                                                              </div>
                                                              <input type="text" class="form-control" aria-describedby="button-addon2" placeholder="Nomer">
                                                              </div>
                                                           </fieldset>
                                                           <hr>
                                                           <fieldset>
                                                           <div class="input-group">
                                                             <div class="input-group-append" id="button-addon2">
                                                                <button class="btn btn-primary btn-sm" type="button">
                                                                    <i class="fa fa-map-marker fa-2x"></i></button>
                                                              </div>
                                                              <textarea class="form-control" placeholder="Alamat"></textarea>
                                                              </div>
                                                           </fieldset>
                                                      </div>
                                                      <div class="col-6">
                                                      	<button class="btn btn-primary btn-lg p-5" type="submit" id="type-info">
                                                  			<i class="fa fa-print"></i> Cetak Nota</button>
                                                      </div>
                                                    </div>                                                      
                                                  </div>
                                               </div>
                                            </div>
                                         </div> 
                                     </div>     
                                                                                              
                                </div><!-------TAB CONTENT------->
                                <div class="tab-pane" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
                                	<div class="row">
                                        <div class="col-md-12 col-12">
                                           <div class="card">                                
                                              <div class="card-content">
                                                 <div class="card-body">
                                                    <div class="row">
                                                    	<div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="retur_kategori">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        <div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="retur_subkategori">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        <div class="col-4">
                                                      		 <div class="form-group">                                                  				<select class="select2 form-control" id="retur_produk">
                                                                    <option value="square">Square</option>
                                                                    <option value="rectangle">Rectangle</option>
                                                                  </select>
                                                              </div>
                                                        </div>
                                                        
                                                    </div>  
                                                    <div class="row">
                                                      <div class="col-6">
                                                      	<fieldset>
                                                           <div class="input-group">
                                                             <div class="input-group-append" id="button-addon2">
                                                                <button class="btn btn-primary btn-sm" type="button">
                                                                    <i class="fa fa-mobile fa-2x"></i></button>
                                                              </div>
                                                              <input type="text" class="form-control" aria-describedby="button-addon2" placeholder="Nomer">
                                                              </div>
                                                           </fieldset>
                                                           <hr>
                                                           <fieldset>
                                                           <div class="input-group">
                                                             <div class="input-group-append" id="button-addon2">
                                                                <button class="btn btn-primary btn-sm" type="button">
                                                                    <i class="fa fa-map-marker fa-2x"></i></button>
                                                              </div>
                                                              <textarea class="form-control" placeholder="Alamat"></textarea>
                                                              </div>
                                                           </fieldset>
                                                      </div>
                                                      <div class="col-6">
                                                      	<button class="btn btn-primary btn-lg p-5" type="submit" id="type-info">
                                                  			<i class="fa fa-print"></i> Cetak Nota</button>
                                                      </div>
                                                    </div>                                                      
                                                  </div>
                                               </div>
                                            </div>
                                         </div> 
                                     </div>     
                                               
                                </div><!-------TAB CONTENT------->
                                
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                    </div>
                </section>
                <!-- Nav Justified Ends -->
            
            
                           
			
                
			</div>
    <!-- END: Content-->

     <?php include 'inc/footer.php' ;?>


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>