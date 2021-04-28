<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-shadow navbar-brand-center navbar-fixed" style="background:none; position:absolute">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                            	<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            	<i class="ficon feather icon-more-vertical"></i></a></li>
                            <li class="dropdown dropdown-user nav-item d-xl-block d-none">
                            	<a class="dropdown-toggle nav-link dropdown-user-link" href="#">
                                <div class="user-nav">
                                  <span>
                                  <img class="round" src="../iPOS/app-assets/images/logo/logo-circle.png" height="40" width="40">
                                  </span>
                                </div>  
                            </a>
                           
                        </li>    
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top"><i class="ficon feather icon-check-square"></i></a></li>                          
                        </ul>
                        
                    </div>
                 <ul class="nav navbar-nav float-right nav-pills">
                  <li class="nav-item d-none d-lg-block"><a href="#price" class="nav-link btn btn-lg font-medium-2">Harga</a></li>
                  <li class="nav-item d-none d-lg-block"><a href="#login" class="nav-link btn btn-lg font-medium-2">Login</a></li>
                  <li class="nav-item d-none d-lg-block"><a href="#kontak" class="nav-link btn btn-lg font-medium-2">Testimoni</a></li>
                       <li class="nav-item d-none d-lg-block">
                        	<a class="btn shadow-sm bg-gradient-danger round mt-1 text-white" href="#" data-toggle="modal" data-target="#pesan">PESAN!</a>
                       </li>
                        <li class="dropdown dropdown-user nav-item d-xl-none"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"></div>
                                <span><img class="round" src="../iPOS/app-assets/images/logo/logo-circle.png" height="40" width="40"></span>
                            </a>                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper d-xl-none">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header border-bottom border-bottom-success">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">IS</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    	<i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a>
                   </li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                   <li class="nav-item"><a href="#price" class="nav-link btn btn-lg font-medium-2">Harga</a></li>
                   <li class="nav-item"><a href="#login" class="nav-link btn btn-lg font-medium-2">Login</a></li>
                   <li class="nav-item"><a href="#kontak" class="nav-link btn btn-lg font-medium-2">Testimoni</a></li>
                   <li class="dropdown nav-item" data-menu="dropdown">
                   		<a class="dropdown-toggle nav-link btn shadow-sm bg-gradient-danger round mt-1 text-white" href="#" data-toggle="dropdown">PESAN!</a>
                        <ul class="dropdown-menu">
                            <li>Daftar Disini</li>
                            <li>
                            <form method="post" action="aksi/aksi_daftar.php">   
                             <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                <input type="text" class="form-control" id="iconLeft3" placeholder="Nama Pemesan">
                                   <div class="form-control-position">
                                       <i class="fa fa-user-o"></i>
                                   </div>
                             </fieldset>
                             <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                <input type="text" class="form-control" id="iconLeft3" placeholder="No.Telepon/Whatsapp">
                                   <div class="form-control-position">
                                       <i class="fa fa-whatsapp"></i>
                                   </div>
                             </fieldset>
                             <fieldset class="form-label-group">
                              <textarea class="form-control" id="label-textarea" rows="3" placeholder="Tulis Alamat Lengkap">
                              </textarea>
                                  <label for="label-textarea">Tulis Alamat Lengkap</label>
                             </fieldset>
                             <fieldset class="form-group position-relative has-icon-left input-divider-left">
                               <select data-placeholder="Pilih usaha anda..." class="select2-icons form-control" id="select2-icons">
                                  <optgroup label="Services">
                                       <option value="cafe/resto" data-icon="fa fa-coffee" selected> Cafe/Resto</option>
                                       <option value="minimarket" data-icon="fa fa-home"> Minimarket</option>
                                       <option value="supermarket" data-icon="fa fa-building-o"> Supermarket</option>
                                       <option value="laundry/carwash" data-icon="fa fa-shower"> Laundry/Carwash</option>
                                  </optgroup>
                                </select>
                             </fieldset>
                            <button type="submit" class="btn btn-danger">Pesan</button>
                            </form>
                            </li>
                        </ul>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->
    

<!-- Modal -->
<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title display-4" id="exampleModalScrollableTitle">Pesan Aplikasi Sekarang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div class="modal-body scrollable-container">
                  <form method="post" action="aksi/aksi_daftar.php"> 
                     <fieldset class="form-group position-relative has-icon-left input-divider-left">
                        <input type="text" class="form-control" id="iconLeft3" placeholder="Nama Pemesan">
                           <div class="form-control-position">
                               <i class="fa fa-user-o"></i>
                           </div>
                     </fieldset>
                     
                     <fieldset class="form-group position-relative has-icon-left input-divider-left">
                        <input type="text" class="form-control" id="iconLeft3" placeholder="No.Telepon/Whatsapp">
                           <div class="form-control-position">
                               <i class="fa fa-whatsapp"></i>
                           </div>
                     </fieldset>
                     
                     <fieldset class="form-label-group">
                        <textarea class="form-control" id="label-textarea" rows="3" placeholder="Tulis Alamat Lengkap"></textarea>
                          <label for="label-textarea">Tulis Alamat Lengkap</label>
                     </fieldset>
                     
                     <fieldset class="form-group position-relative has-icon-left input-divider-left">
                       <select data-placeholder="Pilih usaha anda..." class="select2-icons form-control" id="select2-icons">
                          <optgroup label="Services">
                               <option value="cafe/resto" data-icon="fa fa-coffee" selected> Cafe/Resto</option>
                               <option value="minimarket" data-icon="fa fa-home"> Minimarket</option>
                               <option value="supermarket" data-icon="fa fa-building-o"> Supermarket</option>
                               <option value="laundry/carwash" data-icon="fa fa-shower"> Laundry/Carwash</option>
                          </optgroup>
                        </select>
                        <div class="form-control-position">
                           <i class="fa fa-whatsapp"></i>
                        </div>
                     </fieldset>
                     
                </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="type-success">Pesan</button>
                </form>
             </div>
          </div>
        </div>
     </div>
</div>

