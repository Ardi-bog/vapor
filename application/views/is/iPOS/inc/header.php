<title>.:Information System : iPOS :.</title>
<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/card-analytics.css" />
<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-analytics.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/card-analytics.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    
<!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center"></div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Cari di IS..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        
                        <li class="dropdown dropdown-notification nav-item">
                        	<a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon feather icon-bell"></i>
                            <span class="badge badge-pill badge-primary badge-up cart-item-count">6</span></a>
                            
                            <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><span class="cart-item-count">6</span>
                                        <span class="mx-50">Transaksi</span></h3><span class="notification-title">Baru</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
<!---------------------------------------SCRIPT--------------------------------------------->                                	
                                    <a class="cart-item" href="#">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center">
                                            <img src="app-assets/images/pages/eCommerce/4.png" width="75" alt="Cart Item"></div>
                                            <div class="media-body">
                                              <span class="item-title text-truncate text-bold-500 d-block mb-50">Diskusi</span>
                                              <div class="d-flex justify-content-between align-items-center mt-1">
                                              <span class="align-middle d-block">1 x $299</span>
                                              <i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a>
<!---------------------------------------SCRIPT--------------------------------------------->                                    
                                 </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center text-primary" href="#"><i class="feather icon-shopping-cart align-middle"></i><span class="align-middle text-bold-600">Cek cart</span></a></li>
                                <li class="empty-cart d-none p-2">Kosongkan cart.</li>
                            </ul>
                        </li>
                        
                        
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">Nama Toko</span>
                                <span class="user-status">Kode Toko</span></div><span>
                                <img class="round" src="app-assets/images/portrait/small/avatar-s-27.jpg" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            	<a class="dropdown-item" href="tokoku.php"><i class="feather icon-home"></i> Edit Toko</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="akses/login.php">
                                <i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> 
   
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                	<a class="navbar-brand" href="index.php">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">IS</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                	<a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                	<i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                	<i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a>
               </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                
               <li><a href="index.php"><i class="feather icon-home"></i>
                	<span class="menu-item" data-i18n="Dashboard">Beranda</span></a>
               </li>
               <li class="active"><a href="Kasir.php"><i class="feather icon-monitor"></i>
                	<span class="menu-item" data-i18n="Dashboard">iPOS</span></a>
               </li>               
               <li class="navigation-header"><span>eMarket</span><span class="badge badge badge-primary badge-pill float-right mr-2">New</span></li>
                <li class="nav-item"><a href="#"><i class="feather icon-clipboard"></i>
                <span class="menu-title" data-i18n="Ecommerce">Produk</span></a>
                    <ul class="menu-content">
                        <li><a href="produk.php"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Produk</span></a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a href="#"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="Details">Kategori</span>
                            </a>
                            <ul class="menu-content">
                            	<li><a href="kategori.php"><i class="feather icon-chevron-right"></i>
                        			<span class="menu-item" data-i18n="Details">iPOS</span></a>
                                </li>
                                <li><a href="kategori.php"><i class="feather icon-chevron-right"></i>
                        			<span class="menu-item" data-i18n="Details">PPOB</span></a>
                                </li>
                                <li><a href="kategori.php"><i class="feather icon-chevron-right"></i>
                        			<span class="menu-item" data-i18n="Details">iShipping</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="user.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="Wish List">Buat Data Supplier</span></a>
                        </li>
                        <div class="dropdown-divider"></div>                        
                        <li><a href="transaksi.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="Checkout">Belanja Barang Baru</span></a>
                        </li>
                         <li><a href="transaksi.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="Checkout">Retur Barang</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                	<a href="#"><i class="feather icon-user"></i>
                    <span class="menu-title" data-i18n="User">Anggota</span></a>
                    <ul class="menu-content">
                        <li><a href="user.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List">Daftar Anggota</span></a>
                        </li>                        
                    </ul>
                </li>
                <li class="navigation-header"><span>Laporan</span></li>
                <li class="nav-item"><a href="#"><i class="feather icon-printer"></i>
                	<span class="menu-title" data-i18n="Data List">Data Laporan</span></a>
                    <ul class="menu-content">
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Penjualan</span></a>
                        </li>
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Sirkulasi Produk</span></a>
                        </li>
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Laba</span></a>
                        </li>
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Pembelian</span></a>
                        </li>
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Retur</span></a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-header"><span>Pengelolaan</span></li> 
                 <li class="nav-item"><a href="#"><i class="feather icon-settings"></i>
                	<span class="menu-title" data-i18n="Data List">Kelola Apps</span></a>
                    <ul class="menu-content">
                        <li><a href="user.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Promosi</span></a>
                        </li>                        
                        <li><a href="tokoku.php"><i class="feather icon-circle"></i>
                        	<span class="menu-item" data-i18n="List View">Toko</span></a>
                        </li>                         
                    </ul>
                </li>                  
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    
    
    <!-- BEGIN: Content-->
     <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                   <div class="row">
                          
                          <div class="col-sm-4 col-4" id="dashboard-analytics">
                               <a href="kasir.php">
                                <div class="card text-center bg-analytics">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="avatar bg-white p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-monitor text-success font-large-1"></i>
                                                </div>
                                            </div>
                                            <hr />
                                            <span class="text-bold-100 text-white">iPOS</span>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                            
                            <div class="col-sm-4 col-4" id="dashboard-analytics">
                              <a href="produk.php">
                                <div class="card text-center bg-analytics">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="avatar bg-white p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-clipboard text-success font-large-1"></i>
                                                </div>
                                            </div>
                                            <hr />
                                            <span class="text-bold-100 text-white">Produk</span>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                            
                            <div class="col-sm-4 col-4" id="dashboard-analytics">
                              <a href="user.php">
                                <div class="card text-center bg-analytics">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="avatar bg-white p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="feather icon-user text-success  font-large-1"></i>
                                                </div>
                                            </div>
                                            <hr />
                                            <span class="text-bold-100 text-white">Anggota</span>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        
                   </div>                    
                </div>                
            </div>