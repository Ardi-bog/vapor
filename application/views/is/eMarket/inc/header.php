<title>.:IS | Informasi System :.</title>
<!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../iPOS/app-assets/css/themes/semi-dark-layout.css">

<!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo"></div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>                            
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Cari di IS..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
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
                         <i class="ficon feather icon-shopping-bag"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">1 New</h3><span class="notification-title">Cart Anda</span>
                                    </div>
                                </li>
                               
                                <li class="scrollable-container media-list">
<!------------------------------------------SCRIPT------------------------------------------->                                 
                                 <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">Pesanan baru!</h6><small class="notification-text"> Cek pesanan anda?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a>
<!------------------------------------------SCRIPT------------------------------------------->
                                  </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">Nama User</span>
                                <span class="user-status">Aktif</span></div>
                                <span><img class="round" src="<?= base_url();?>asset/emarket/app-assets/images/portrait/small/avatar-s-10.jpg" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            	<a class="dropdown-item" href="user.php">
                                	<i class="feather icon-user"></i> Edit Profile</a>                                
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
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">IS</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">                
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="active" data-menu=""><a href="index.php" data-i18n="dashboard">
                    	<i class="feather icon-home"></i>Beranda</a>
                    </li>
                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-shopping-cart"></i>Toko Anda</a>
                                <ul class="dropdown-menu">
                                    <li data-menu=""><a class="dropdown-item" href="shop.php" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Belanja</a>
                                    </li>                                   
                                    <li data-menu=""><a class="dropdown-item" href="cart.php" data-toggle="dropdown" data-i18n="Checkout"><i class="feather icon-circle"></i>Pesanan Anda</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="User"><i class="feather icon-user"></i>Pengguna</a>
                                <ul class="dropdown-menu">                                    
                                    <li data-menu=""><a class="dropdown-item" href="user.php" data-toggle="dropdown" data-i18n="Edit"><i class="feather icon-circle"></i>Edit</a>
                                    </li>
                                </ul>
                            </li>
                    
                    
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->