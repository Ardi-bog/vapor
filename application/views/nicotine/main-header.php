<?php 
  $where=array('NAMA_WEB'=>'nicotine');
  $logo = $this->model_app->edit('logo',$where)->row_array();

  $rows = $this->model_app->edit('rb_penjualan_detail', array('NO_FAKTUR_PENJUALAN' => $this->session->nofaktur))->num_rows();

  
 ?>
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
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="fas fa-expand fa-2x"></i></a></li>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="dropdown dropdown-notification nav-item">
                          <a class="nav-link nav-link-label" href="<?=base_url('nicotine/keranjang') ?>" >
                         <i class="ficon feather icon-shopping-bag"></i><span class="badge badge-pill badge-primary badge-up"><?php echo $rows ?></span></a>
                            
                        </li>

                        <li class="dropdown dropdown-user nav-item">
                          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600"><?= $this->session->costumer ?></span>
                                <span class="user-status">Online</span></div>
                                <span><img class="round" src="<?php echo base_url() ?>asset/nicotine/blank_avatar.jpg" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" data-toggle='modal' data-target='#myModaledi2'>
                                  <i class="feather icon-user"></i> Edit Profile</a>                                
                                <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="<?=base_url('nicotine/logout') ?>">
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
                    <li class="active" data-menu=""><a href="<?=base_url('nicotine/home') ?>" data-i18n="dashboard">
                      <i class="feather icon-home"></i>Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

       <!-- The Modal -->
<div class='modal fade hide' id='myModaledi2'>
  <div class='modal-dialog modal-dialog-centered'>
    <div class='modal-content'>
    
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'> Pesanan atas nama ..</h4>
        
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('nicotine/welcome') ?>'>
          <div class='form-group'>
              <div>
                  <input type='text' style="margin-left: 20px;width: 90%;" class='form-control' placeholder="Masukan nama anda .." name='b' value="<?= $this->session->costumer ?>" required>
              </div>
          </div>
      </div>
      
      <!-- Modal footer -->
      <div class='modal-footer'>
        <button type='submit' name='submit' class='btn btn-primary'>
            Simpan
        </button>
      </div>
    </form>
      
    </div>
  </div>
</div>