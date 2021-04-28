 <!-- BEGIN: Main Menu -->
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

               <li class="<?php echo $this->uri->segment(2) == 'home' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/home"><i class="fas fa-border-all"></i>
                  <span class="menu-item" data-i18n="Dashboard">Beranda</span></a>
               </li>
               <li class="<?php echo $this->uri->segment(2) == 'kasir_bar' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/kasir_bar"><i class="fas fa-cash-register">  </i>
                  <span class="menu-item" data-i18n="Dashboard">Kasir BAR</span></a>
               </li> 
               <li class="<?php echo $this->uri->segment(2) == 'kasir_vapor' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/kasir_vapor"><i class="fas fa-cash-register">  </i>
                  <span class="menu-item" data-i18n="Dashboard">Kasir Vapor</span></a>
               </li>   
               <hr>
               <li class="navigation-header navbar-shadow"><span>e-Market</span></li>
                <li class="nav-item"><a href="#"><i class="feather icon-clipboard"></i>
                <span class="menu-title" data-i18n="Ecommerce">Produk</span></a>
                    <ul class="menu-content">
                        <li><a href="produk.php"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Produk</span></a>
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
                <li class=" nav-item">
                  <a href="#"><i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="User">Toko</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'info_toko_vapor' ? 'active':'' ?>"><a href="<?= base_url().$this->uri->segment(1) ?>/info_toko_vapor"><i class="feather icon-circle"></i>
                          <span class="menu-item" data-i18n="List View">Info Toko Vapor</span></a>
                        </li>   
                        <li class="<?php echo $this->uri->segment(2) == 'identitaswebsite' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/identitaswebsite'><i class='fa fa-circle-o'></i> Identitas Website</a></li>                  
                    </ul>
                </li>
                <hr>

                <li class="navigation-header"><span>e-Bar <span class="badge badge badge-primary badge-pill float-right mr-2">New</span></span></li>
                <li><a target="_blank" href="<?php echo base_url().$this->uri->segment(1); ?>/halaman_depan_bar"><i class="feather icon-home"></i>
                          <span class="menu-item" data-i18n="halamandepan">Halaman Depan</span></a>
                       </li>
                <li class="nav-item"><a href="#"><i class="feather icon-clipboard"></i>
                <span class="menu-title" data-i18n="Ecommerce">Menu Bar</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'jenismenu' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/jenismenu"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Jenis Menu</span></a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'menubar' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/menubar"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Menu Bar</span></a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'promo_menu' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/promo_menu"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Promo</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                  <a href="#"><i class="feather icon-user"></i>
                    <span class="menu-title" data-i18n="User">Anggota</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'pegawai' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/pegawai'><i class='fa fa-circle-o'></i> Daftar Pegawai</a></li>                       
                    </ul>
                </li>
                <li class=" nav-item">
                  <a href="#"><i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="User">Toko</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'info_toko_nicotine' ? 'active':'' ?>"><a href="<?= base_url().$this->uri->segment(1) ?>/info_toko_nicotine"><i class="feather icon-circle"></i>
                          <span class="menu-item" data-i18n="List View">Info Toko Nicotine</span></a>
                        </li>   
                        <li class="<?php echo $this->uri->segment(2) == 'identitaswebsiteNicotine' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/identitaswebsiteNicotine'><i class='fa fa-circle-o'></i> Identitas Website</a></li>                  
                    </ul>
                </li><hr>

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
                        <li class="<?php echo $this->uri->segment(2) == 'manajemenuser' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/manajemenuser'><i class='fa fa-circle-o'></i> Manajemen Admin</a></li>  

                    </ul>
                    <li class="nav-item"><a href="#"><i class="fas fa-palette"></i>
                      <span class="menu-title" data-i18n="Data List">Desain</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo $this->uri->segment(2) == 'warnaNicotine' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/warnaNicotine'><i class='fa fa-circle-o'></i> Warna Web Bar</a></li>                          
                            <li class="<?php echo $this->uri->segment(2) == 'logowebsiteNicotine' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Logo Web Bar</a></li>        
                            <li class="<?php echo $this->uri->segment(2) == 'bannerNicotine' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/bannerNicotine'><i class='fa fa-circle-o'></i> Banner Web Bar</a></li>  
                                                 
                        </ul>  
                    </li>
                    <li class="nav-item"><a href="#"><i class="fas fa-memory"></i>
                      <span class="menu-title" data-i18n="Data List">Stok</span></a>
                        <ul class="menu-content">
                            <li class="<?php echo $this->uri->segment(2) == 'stok' ? 'active':'' ?>"><a href='<?=base_url().$this->uri->segment(1) ?>/stok'><i class='fa fa-circle-o'></i> Data Stok Produk</a></li>       
                            <li><a href='#'><i class='fa fa-circle-o'></i> Mutasi Stok</a></li>  
                                                 
                        </ul>  
                    </li>  
                </li> 
                <hr>

                <li class="navigation-header"><span>Venom <span class="badge badge badge-primary badge-pill float-right mr-2">New</span></span></li>
                <li class="nav-item"><a href="#"><i class="fas fa-warehouse"></i>
                <span class="menu-title" data-i18n="Ecommerce">Cabang</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'cabang' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/cabang"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Detail Data Cabang</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="fas fa-share-square"></i>
                <span class="menu-title" data-i18n="Ecommerce">Permintaan</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'tambah_permintaan_stok' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/tambah_permintaan_stok"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Tambah Permintaan</span></a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'permintaan_stok' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/permintaan_stok"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Permintaan</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="fas fa-truck-moving"></i>
                <span class="menu-title" data-i18n="Ecommerce">Pengiriman</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo $this->uri->segment(2) == 'kurir' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/kurir"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Kurir</span></a>
                        </li>
                        <li class="<?php echo $this->uri->segment(2) == 'pengiriman' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/pengiriman"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data Pengiriman</span></a>
                        </li>

                          <!-- proses pergantian status dan proses barang nanti di menu data pengiriman -->

                        <li class="<?php echo $this->uri->segment(2) == 'detail_retur' ? 'active':'' ?>"><a href="<?php echo base_url().$this->uri->segment(1); ?>/detail_retur"><i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Shop">Data retur</span></a>
                        </li>
                    </ul>
                </li>
                </li><hr>  
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
                        <li><a href="laporan.php"><i class="feather icon-circle"></i>
                          <span class="menu-item" data-i18n="List View">Pengiriman</span></a>
                        </li>
                    </ul>
                </li><hr>                
            </ul>
        </div>
    </div>
   <!-- END: Main Menu -->