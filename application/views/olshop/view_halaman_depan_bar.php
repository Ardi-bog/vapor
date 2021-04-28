<?php 

    // banner
    $where=array('NAMA_WEB'=>'nicotine');
    $banners = $this->model_app->edit('banner',$where)->result_array();
    $num_banner = $this->model_app->edit('banner',$where)->num_rows();
    // end banner

    // promo
    $where=array('TGL_POSTING >='=> date('Y-m-d'));
    $promos = $this->model_app->edit('promo',$where)->result_array();
    $num_promo = $this->model_app->edit('promo',$where)->num_rows();
    // end promo

    // Menu
    $jeniss = $this->model_app->view('jenis_menu','ID_JENIS_MENU')->result_array();
    $num_jenis = $this->model_app->view('jenis_menu','ID_JENIS_MENU')->num_rows();
    // end menu

    $dataMenu = $this->model_app->view('menu','ID_MENU')->result_array();

    $jumlahMenu = array();
    foreach ($dataMenu as $menu) {
        $jumlah=0;
        $cek = $this->model_app->edit('rb_penjualan_detail',array('ID_PRODUK' => $menu[ID_MENU]))->num_rows();
        if ($cek != 0) {
            $data = $this->model_app->edit('rb_penjualan_detail',array('ID_PRODUK' => $menu[ID_MENU]))->result_array();
            foreach ($data as $value) {
                $jumlah+=$value[JUMLAH];
            }
            $jumlahMenu[$menu[ID_MENU]]=$jumlah;
        }
    }
    arsort($jumlahMenu);

?>

<h3 class="display-4 text-center">Selamat Datang <?= $this->session->nama =='' ? "": "Kak ".$this->session->nama; ?></h3>
                <!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
                    <div class="row">                       
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card">                                
                               
                               <div class="card-content">
                                    <div class="card-body p-0">
                                        <div id="banner" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                            <?php 
                                                for ($i=0; $i < $num_banner; $i++) { 
                                                    if ($i == 0) {
                                                        echo "
                                                                <li data-target='#banner' data-slide-to='0' class='active'></li>
                                                            ";
                                                    }else{
                                                        echo "
                                                                <li data-target='#banner' data-slide-to='".$i."'></li>
                                                            ";
                                                    }
                                                }
                                             ?>
                                                
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <?php 
                                                    $no=0;
                                                    foreach ($banners as $banner) {
                                                        if ($no==0) {
                                                            echo "
                                                                <div class='carousel-item active'>
                                                                    <img src='".base_url()."asset/banner/".$banner['GAMBAR']."' width='1980' height='660' class='img-fluid'>
                                                                    <div class='carousel-caption'>
                                                                        <h3>".$banner['JUDUL_BANNER']."</h3>
                                                                        <p>".$banner['DESKRIPSI']."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }else{
                                                            echo "
                                                                <div class='carousel-item'>
                                                                    <img src='".base_url()."asset/banner/".$banner['GAMBAR']."' width='1980' height='660' class='img-fluid'>
                                                                    <div class='carousel-caption'>
                                                                        <h3>".$banner['JUDUL_BANNER']."</h3>
                                                                        <p>".$banner['DESKRIPSI']."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                        $no++;
                                                    }
                                                ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                        
                     </div>   
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <div class="card p-0">
                             <div class="divider">
                                  <div class="divider-text display-4"><h5>BEST SELLER</h5></div>
                               </div>
                              <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                               <div class="row">
                                    <?php  
                                        $no=0;
                                        foreach ($jumlahMenu as $key => $value) {
                                    ?>
                                        <?php
                                            if ($no<3) {
                                                $menus = $this->model_app->edit('menu',array('ID_MENU' => $key))->row_array();
                                            echo "
                                                <div class='swiper-wrapper col-lg-4 col-sm-12 mb-4'>
                                                    <div class='swiper-slide rounded swiper-shadow border border-success'>
                                                        <div class='item-heading'>
                                                            <div class='item-heading'>
                                                                <p class='text-truncate mb-0'>
                                                                    ".$menus[NAMA_MENU]."
                                                                </p>
                                                                <p>
                                                                    <small>".$menus[DESKRIPSI]."</small>
                                                                </p>
                                                            </div>
                                                            <div class='img-container mx-auto my-2 py-75 iamge'>
                                                                <img style='height:150px' src='".base_url()."asset/foto_produk/".$menus[GAMBAR]."' class='img-fluid' alt='image'>
                                                            </div>
                                                            <div class='item-meta'>";
                                                            if ($menus[DISKON]!= 0) {
                                                                $harga = $menus[HARGA];
                                                                $diskon = $menus[DISKON];

                                                                $nilai=($diskon/100)*$harga;
                                                                $jadi= $harga-$nilai;
                                                                echo "
                                                                    <p style='color:gray;' class='mb-0'><del>Rp.".$menus[HARGA]."</del></p>
                                                                    <p class='text-warning mb-0'>Rp.".$jadi."</p>
                                                                    <p class='text-primary mb-0'>Diskon ".$menus[DISKON]." %</p>
                                                                ";
                                                            }else{
                                                                echo "
                                                                    <p class='text-warning mb-0'>Rp.".$menus[HARGA]."</p>
                                                                    <p class='text-primary mb-0'> Diskon ".$menus[DISKON]." %</p>
                                                                ";
                                                            }
                                                            echo "
                                                                <a data-toggle='modal' data-target='#myModalpesanan".$menus[ID_MENU]."' class='btn btn-md btn-primary' >
                                                                <i class='fas fa-cart-plus'></i> Pesan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ";
                                            }
                                        ?>
                                    <?php $no++;
                                        }
                                    ?>                         
                               </div>
                             </div>                                
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card">                               
                               <div class="divider">
                                  <div class="divider-text display-4"><h5>Promo Hari Ini</h5></div>
                               </div>
                                <div class="card-content">
                                    <div class="card-body p-0">
                                        <?php 
                                            if ($num_promo == 0) {
                                                echo "
                                                    <div class='card'>                               
                                                       <div class='divider'>
                                                          <div class='divider-text display-4'><h5>Tidak Tersedia Promo Hari ini</h5></div>
                                                       </div>
                                                        <div class='card-content'>
                                                            <div class='card-body p-0'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";
                                            }else{
                                         ?>
                                        <div id="promo" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                            <?php 
                                                for ($i=0; $i < $num_promo; $i++) { 
                                                    if ($i == 0) {
                                                        echo "
                                                                <li data-target='#promo' data-slide-to='0' class='active'></li>
                                                            ";
                                                    }else{
                                                        echo "
                                                                <li data-target='#promo' data-slide-to='".$i."'></li>
                                                            ";
                                                    }
                                                }
                                             ?>
                                                
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <?php 
                                                    $no=0;
                                                    foreach ($promos as $promo) {
                                                        if ($no==0) {
                                                            echo "
                                                                <div class='carousel-item active'>
                                                                    <img src='".base_url()."asset/foto_promo/".$promo['GAMBAR']."' width='1980' height='660' class='img-fluid'>
                                                                    <div class='carousel-caption'>
                                                                        <h3>".$promo['JUDUL_PROMO']."</h3>
                                                                        <p>".$promo['DESKRIPSI']."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }else{
                                                            echo "
                                                                <div class='carousel-item'>
                                                                    <img src='".base_url()."asset/foto_promo/".$promo['GAMBAR']."' width='1980' height='660' class='img-fluid'>
                                                                    <div class='carousel-caption'>
                                                                        <h3>".$promo['JUDUL_PROMO']."</h3>
                                                                        <p>".$promo['DESKRIPSI']."</p>
                                                                    </div>
                                                                </div>
                                                            ";
                                                        }
                                                        $no++;
                                                    }
                                                ?>
                                                
                                            </div>
                                            <a class="carousel-control-prev" href="#promo" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#promo" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card p-0">
                             <div class="divider">
                                  <div class="divider-text display-4"><H3>DAFTAR MENU</H3></div>
                               </div>
                              <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                    <div class="row">
                                        <?php 
                                foreach ($jeniss as $jenis) {
                                    echo "
                                        <div class='col-md-6 col-sm-12'>
                                            <div class='card p-0'>
                                                <div class='divider'>
                                                  <div class='divider-text display-4'><h5>".$jenis['JENIS_MENU']."</h5></div>
                                               </div>
                                                <div class='swiper-responsive-breakpoints swiper-container px-4 py-2'>
                                                    <div class='row'>"; 
                                                            $where=array('JENIS_MENU'=>$jenis['ID_JENIS_MENU']);
                                                            $menus = $this->model_app->edit('menu',$where)->result_array();         
                                                            foreach ($menus as $menu) {
                                                                echo "
                                                                    <div class='swiper-wrapper col-lg-6 col-sm-12 mb-4'>
                                                                        <div class='swiper-slide rounded swiper-shadow border border-success'>
                                                                            <div class='item-heading'>
                                                                                <div class='item-heading'>
                                                                                <p class='text-truncate mb-0'>
                                                                                    ".$menu['NAMA_MENU']."
                                                                                </p>
                                                                                <p>
                                                                                    <small>".$menu['DESKRIPSI']."</small>
                                                                                </p>
                                                                            </div>
                                                                            <div class='img-container mx-auto my-2 py-75 iamge'>
                                                                                <img style='height:150px' src='".base_url()."asset/foto_produk/".$menu['GAMBAR']."' class='img-fluid' alt='image'>
                                                                            </div>
                                                                            <div class='item-meta'>";
                                                                            if ($menu[DISKON]!= 0) {
                                                                                $harga = $menu[HARGA];
                                                                                $diskon = $menu[DISKON];

                                                                                $nilai=($diskon/100)*$harga;
                                                                                $jadi= $harga-$nilai;
                                                                                echo "
                                                                                    <p style='color:gray' class='mb-0'><del>Rp.".$menu['HARGA']."</del></p>
                                                                                    <p class='text-warning mb-0'>Rp.".$jadi."</p>
                                                                                    <p class='text-primary mb-0'>Diskon ".$menu['DISKON']." %</p>
                                                                                ";
                                                                            }else{
                                                                                echo "
                                                                                    <p class='text-warning mb-0'>Rp.".$menu['HARGA']."</p>
                                                                                    <p class='text-primary mb-0'> Diskon ".$menu['DISKON']." %</p>
                                                                                ";
                                                                            }
                                                                            echo "
                                                                                <a data-toggle='modal' data-target='#myModalpesanan".$menu[ID_MENU]."' class='btn btn-md btn-primary' >
                                                                                <i class='fas fa-cart-plus'></i> Pesan</a>          
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                        <!-- Modal Pesanan -->
                                        <div class='modal fade' id='myModalpesanan".$menu[ID_MENU]."'>
                                          <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Input Pesanan</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('nicotine/transaksi_detail'). "'>
                                                  <div class='form-group'>
                                                      <label for='b' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Menu</label>
                                                      <div>
                                                          <input type='hidden' name='a' class='id' value='".$menu[ID_MENU]."'>";

                                                         if ($menu[DISKON]!= 0) {
                                                            $harga = $menu[HARGA];
                                                            $diskon = $menu[DISKON];

                                                            $nilai=($diskon/100)*$harga;
                                                            $jadi= $harga-$nilai; 

                                                        }else{
                                                            $jadi=$menu[HARGA];
                                                        }
                                                  echo "  <input type='hidden' name='harga' value='".$jadi."'>
                                                        <input type='hidden' name='diskon' value='".$menu[DISKON]."'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='b' value='".$menu[NAMA_MENU]."' readonly='on' required>
                                                      </div>
                                                  </div>
                                                  <div class='form-group text-center'>
                                                      <img style='height:250px;padding-left:20px;' src='".base_url()."asset/foto_produk/".$menu['GAMBAR']."' class='img-fluid' alt='image'>
                                                  </div>
                                                  <div class='form-group'>
                                                      <label for='c' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Jumlah pesanan</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='c' required>
                                                      </div>
                                                  </div>
                                                  <div class='form-group'>
                                                      <label for='d' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Harga</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='d' value='".$jadi."' readonly='on' required>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                              <!-- Modal footer -->
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                <button type='submit' name='edit' class='btn btn-primary'>
                                                    Simpan
                                                </button>
                                              </div>
                                            </form>
                                              
                                            </div>
                                          </div>
                                        </div>
                                                                ";
                                                            }                            
                                               echo " </div>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                                        ?>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>                    
                    
             </div>
          </div>
        </div>
      </div>
   </section>

   <!-- The Modal -->
<!-- <div class='modal fade hide' id='myModalnamaUser'>
  <div class='modal-dialog modal-dialog-centered'>
    <div class='modal-content'> -->
    
      <!-- Modal Header -->
      <!-- <div class='modal-header'>
        <h4 class='modal-title'> Pesanan atas nama ..</h4>
        
      </div> -->
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('nicotine/welcome') ?>'>
          <div class='form-group'>
              <div>
                  <input type='text' style="margin-left: 20px;width: 90%;" class='form-control' placeholder="Masukan nama anda .." name='b' required>
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