<!-- BEGIN: Content-->
    
     <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                   <div class="row">
                          
                          <div class="col-sm-4 col-4" id="dashboard-analytics">
                               <a href="<?php echo base_url().$this->uri->segment(1); ?>/kasir">
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
      <!-- BEGIN: Content 2 -->
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="<?php echo base_url() ?>asset/admin/app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                                        <img src="<?php echo base_url() ?>asset/admin/app-assets/images/elements/decore-right.png" class="img-right" alt="
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
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="30" width="30">
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
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-warning mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-danger mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
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
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
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
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>
<!--------------------------------------------SCRIPT-------------------------->
                                                            <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" height="30" width="30">
                                                                Nama User
                                                            </li>                                                            
<!--------------------------------------------SCRIPT-------------------------->
                              <li class="list-group-item">
                                                                <i class="fa fa-circle font-small-3 text-info mr-25"></i>
                                                                <img class="media-object rounded-circle" src="<?php echo base_url() ?>asset/admin/app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
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