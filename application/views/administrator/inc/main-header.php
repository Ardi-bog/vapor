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
                                <a class="dropdown-item" href="<?php echo base_url().$this->uri->segment(1); ?>/logout">
                                <i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> 
   
    <!-- END: Header-->