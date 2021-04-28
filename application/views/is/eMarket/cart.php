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
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/vendors/css/extensions/toastr.css">
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
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../iPOS/app-assets/css/plugins/extensions/toastr.css">
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
                            <h2 class="content-header-title float-left mb-0">Cart</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">eMarket</a></li>
                                    <li class="breadcrumb-item active">Cart</li>
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
                <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">
                    <!-- Checkout Place order starts -->
                    <h6><i class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
                    <fieldset class="checkout-step-1 px-0">
                        <section id="place-order" class="list-view product-checkout">
                            <div class="checkout-items">
<!--------------------------------------------------SCRIPT---------------------------------------->
                                <div class="card ecommerce-card">
                                    <div class="card-content">
                                        <div class="item-img text-center">
                                            <a href="details.php">
                                                <img src="../iPOS/app-assets/images/pages/eCommerce/9.png" alt="img-placeholder">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <a href="details.php">Nama Barang</a>
                                                <span></span>
                                                <p class="item-company"><span class="company-name">Kategori</span></p>
                                                <p class="stock-status-in">Jumlah Stok</p>
                                            </div>
                                            <div class="item-quantity">
                                                <p class="quantity-title">Jumlah</p>
                                                <div class="input-group quantity-counter-wrapper">
                                                    <input type="text" class="quantity-counter" value="1">
                                                </div>
                                            </div>
                                            <p class="delivery-date">Pengiriman oleh...</p>
                                            <p class="offers">Diskon</p>
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-rating">
                                                    <div class="badge badge-primary badge-md">
                                                        4 <i class="feather icon-star ml-25"></i>
                                                    </div>
                                                </div>
                                                <div class="item-cost">
                                                    <h6 class="item-price">Rp.000.000,00</h6>
                                                </div>
                                            </div>
                                            <div class="wishlist remove-wishlist">
                                                <i class="feather icon-x align-middle"></i> Remove
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
<!--------------------------------------------------SCRIPT---------------------------------------->


<!--------------------------------------------------SCRIPT---------------------------------------->
                                <div class="card ecommerce-card">
                                    <div class="card-content">
                                        <div class="item-img text-center">
                                            <a href="details.php">
                                                <img src="../iPOS/app-assets/images/pages/eCommerce/5.png" alt="img-placeholder">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-name">
                                                <a href="details.php">Nama Barang</a>
                                                <span></span>
                                                <p class="item-company"><span class="company-name">Kategori</span></p>
                                                <p class="stock-status-in">Jumlah Stok</p>
                                            </div>
                                            <div class="item-quantity">
                                                <p class="quantity-title">Jumlah</p>
                                                <div class="input-group quantity-counter-wrapper">
                                                    <input type="text" class="quantity-counter" value="1">
                                                </div>
                                            </div>
                                            <p class="delivery-date">Pengiriman oleh...</p>
                                            <p class="offers">Diskon</p>
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-rating">
                                                    <div class="badge badge-primary badge-md">
                                                        4 <i class="feather icon-star ml-25"></i>
                                                    </div>
                                                </div>
                                                <div class="item-cost">
                                                    <h6 class="item-price">Rp.000.000,00</h6>
                                                </div>
                                            </div>
                                            <div class="wishlist remove-wishlist">
                                                <i class="feather icon-x align-middle"></i> Remove
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
<!--------------------------------------------------SCRIPT---------------------------------------->
                                
                            </div>
                            <div class="checkout-options">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="options-title text-uppercase">Detail Pesanan</p>
                                            
                                            <div class="price-details">
                                                <p>Rincian Pesanan</p>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">Total Belanja</div>
                                                <div class="detail-amt">Rp.000.000,00</div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">Diskon</div>
                                                <div class="detail-amt discount-amt">0%</div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">Pajak</div>
                                                <div class="detail-amt">0%</div>
                                            </div>                                            
                                            <div class="detail">
                                                <div class="detail-title">Biaya Pengiriman</div>
                                                <div class="detail-amt discount-amt">Rp.000.000,00</div>
                                            </div>
                                            <hr>
                                            <div class="detail">
                                                <div class="detail-title detail-total">Total</div>
                                                <div class="detail-amt total-amt">Rp.000.000,00</div>
                                            </div>
                                            <div class="btn btn-primary btn-block place-order">LENGKAPI PESANAN</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                    <!-- Checkout Place order Ends -->

                    <!-- Checkout Customer Address Starts -->
                    <h6><i class="step-icon step feather icon-home"></i>Alamat</h6>
                    <fieldset class="checkout-step-2 px-0">
                        <section id="checkout-address" class="list-view product-checkout">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Alamat Pengiriman</h4>
                                    <p class="text-muted mt-25">Pastikan untuk mencentang "Kirim ke alamat ini" setelah Anda selesai</p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-name">Nama Penerima</label>
                                                    <input type="text" id="checkout-name" class="form-control required" name="fname">
                                                </div>
                                            </div>                                   
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-landmark">Alamat Lengkap</label>
                                                    <input type="text" id="checkout-landmark" class="form-control" name="landmark">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-number">No.Hp/ Telp:</label>
                                                    <input type="number" id="checkout-number" class="form-control" name="mnumber">
                                                </div>
                                            </div> 
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-city">Kab/Kota</label>
                                                    <input type="text" id="checkout-city" class="form-control" name="city">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label for="checkout-pincode">Kodepos</label>
                                                    <input type="number" id="checkout-pincode" class="form-control" name="pincode">
                                                </div>
                                            </div>                                           
                                            
                                            <div class="col-sm-6 offset-md-6">
                                                <div class="btn btn-primary delivery-address float-right">SIMPAN DAN KIRIM</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Nama User</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body actions">
                                            <p class="mb-0">Alamat Lengkap</p>
                                            <p>No.Telp</p>                                           
                                            <hr>
                                            <div class="btn btn-primary btn-block delivery-address">KIRIM KE ALAMAT TERSEBUT</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </fieldset>

                    <!-- Checkout Customer Address Ends -->

                    <!-- Checkout Payment Starts -->
                    <h6><i class="step-icon step feather icon-credit-card"></i>Pembayaran</h6>
                    <fieldset class="checkout-step-3 px-0">
                        <section id="checkout-payment" class="list-view product-checkout">
                            <div class="payment-type">
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Pilih Pembayaran</h4>
                                        <p class="text-muted mt-25">Pastikan pilih opsi pembayaran yang benar</p>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
<!-----------------------------------SCRIPT-------------------------------------->
                                            <div class="d-flex justify-content-between flex-wrap">
                                                <div class="vs-radio-con vs-radio-primary">
                                                    <input type="radio" name="vueradio" checked="" value="false">
                                                    <span class="vs-radio">
                                                        <span class="vs-radio--border"></span>
                                                        <span class="vs-radio--circle"></span>
                                                    </span>
                                                    <img src="../iPOS/app-assets/images/pages/eCommerce/bri.png" height="40">
                                                </div>
                                                <div class="card-holder-name mt-75">
                                                   <div class="detail">
                                                        <span class="text-bold-700">BRI</span><br>
                                                   		<span class="text-bold-300">Atas Nama</span>
                                                    </div> 
                                                </div>
                                                <div class="card-expiration-date mt-75">
                                                    <span>No.Rekening</span>
                                                </div>
                                            </div>
<!-----------------------------------SCRIPT-------------------------------------->  

<!-----------------------------------SCRIPT-------------------------------------->
                                            <div class="d-flex justify-content-between flex-wrap">
                                                <div class="vs-radio-con vs-radio-primary">
                                                    <input type="radio" name="vueradio" checked="" value="true">
                                                    <span class="vs-radio">
                                                        <span class="vs-radio--border"></span>
                                                        <span class="vs-radio--circle"></span>
                                                    </span>
                                                    <img src="../iPOS/app-assets/images/pages/eCommerce/bca.png" height="40">
                                                </div>
                                                <div class="card-holder-name mt-75">
                                                   <div class="detail">
                                                        <span class="text-bold-700">BCA</span><br>
                                                   		<span class="text-bold-300">Atas Nama</span>
                                                    </div> 
                                                </div>
                                                <div class="card-expiration-date mt-75">
                                                    <span>No.Rekening</span>
                                                </div>
                                            </div>
<!-----------------------------------SCRIPT-------------------------------------->                                          
                                            <div class="customer-cvv mt-1">
                                                <div class="form-inline">
                                                    <a href="upload.php" class="btn btn-primary btn-cvv ml-50 mb-50 text-white" id="type-success">Upload Bukti Pembayaran</a>
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <ul class="other-payment-options list-unstyled">
                                                <li>
                                                    <div class="vs-radio-con vs-radio-primary py-25">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span>Transfer ATM Card</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="vs-radio-con vs-radio-primary py-25">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span>Internet Banking</span>
                                                    </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="vs-radio-con vs-radio-primary py-25">
                                                        <input type="radio" name="vueradio" value="true">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span>Cash On Delivery (COD)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="amount-payable checkout-options">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pesanan</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="detail">
                                                <div class="details-title">Jumlah Produk 2</div>
                                                <div class="detail-amt"><strong>Rp.000.000,00</strong></div>
                                            </div>
                                            <div class="detail">
                                                <div class="details-title">Biaya Pengiriman</div>
                                                <div class="detail-amt discount-amt">Rp.000.000,00</div>
                                            </div>
                                            <hr>
                                            <div class="detail">
                                                <div class="details-title">Total Pembayaran</div>
                                                <div class="detail-amt total-amt">Rp.000.000,00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </fieldset>

                    <!-- Checkout Payment Starts -->
                </form>

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
    <script src="../iPOS/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../iPOS/app-assets/js/core/app-menu.js"></script>
    <script src="../iPOS/app-assets/js/core/app.js"></script>
    <script src="../iPOS/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../iPOS/app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
    <script src="../iPOS/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../iPOS/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>