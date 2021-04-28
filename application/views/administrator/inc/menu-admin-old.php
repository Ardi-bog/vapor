        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php $usr = $this->model_app->view_where('users', array('USERNAME'=> $this->session->username))->row_array();
                  if (trim($usr['FOTO'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['FOTO']; } ?>
            <img src="<?php echo base_url(); ?>/asset/foto_user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php echo "<p>$usr[NAMA_USER]</p>"; ?>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='text-transform:uppercase;'>MENU <span class='uppercase'><?php echo $this->session->level; ?></span></li>
            <li><a href="<?php echo base_url().$this->uri->segment(1); ?>/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-shopping-cart"></i> <span>Toko / Anggota</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Master <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <?php 
                    
                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/konsumen'><i class='fa fa-circle-o'></i> Data Konsumen</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/anggota'><i class='fa fa-circle-o'></i> Data Anggota</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/pelapak'><i class='fa fa-circle-o'></i> Data Pelapak</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/kategori_produk'><i class='fa fa-circle-o'></i> Kategori Produk</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/kategori_produk_sub'><i class='fa fa-circle-o'></i> Sub-Kategori Produk</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/produk'><i class='fa fa-circle-o'></i> Data Produk</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/rekening'><i class='fa fa-circle-o'></i> Rekening Perusahaan</a></li>";
                    }

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/settingbonus'><i class='fa fa-circle-o'></i> Setting Bonus</a></li>";
                    }
                  ?>
                </ul>
              </li>

              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Transaksi <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <?php 

                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/penjualan'><i class='fa fa-circle-o'></i> Penjualan Pelapak</a></li>";
                    }
                  ?>
                </ul>
              </li>

              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Report <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <?php 
                    if($this->session->level=='super-admin'){
                      echo "<li><a href='".base_url().$this->uri->segment(1)."/keuangan'><i class='fa fa-circle-o'></i> Keuangan Pelapak</a></li>";
                    }
                  ?>
                </ul>
              </li>
              </ul>
            </li>

            <?php if($this->session->level=='super-admin' || $this->session->level=='admin-vaporhitz'){ ?>
              <li class="header" style='text-transform:uppercase;'>MENU Web Vaporhitz</li>
              <li class="treeview">
                <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Menu Utama Web</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/identitaswebsite'><i class='fa fa-circle-o'></i> Identitas Website</a></li>
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/menuwebsite'><i class='fa fa-circle-o'></i> Menu Website</a></li>
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/halamanbaru'><i class='fa fa-circle-o'></i> Halaman Baru</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="glyphicon glyphicon-object-align-left"></i> <span>Modul Web Vaporhitz</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsite'><i class='fa fa-circle-o'></i> Logo Website</a></li>

                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/background'><i class='fa fa-circle-o'></i> Warna Website</a></li>
                </ul>
              </li>
            <?php } ?>

            <?php if($this->session->level=='super-admin' || $this->session->level=='admin-nicotine-bar'){ ?>
              <li class="header" style='text-transform:uppercase;'>MENU Web Nicotine</li>
              <li class="treeview">
                <a href="#"><i class="fa fa-building"></i> <span>Toko / Menu bar</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/info_toko_nicotine'><i class='fa fa-circle-o'></i> Info Toko</a></li>
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/pegawai'><i class='fa fa-circle-o'></i> Data Pegawai</a></li>

                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/jenismenu'><i class='fa fa-circle-o'></i> Jenis Menu</a></li>
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/menubar'><i class='fa fa-circle-o'></i> Data Menu</a></li>
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/promo_menu'><i class='fa fa-circle-o'></i> Promo Menu</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-tasks"></i> <span> Transaksi</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Penjualan</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-file-text"></i> <span> Report</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Keuangan Harian</a></li>
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Keuangan Mingguan</a></li>
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Keuangan Bulanan</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Menu Utama Web</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/identitaswebsiteNicotine'><i class='fa fa-circle-o'></i> Identitas Website</a></li>
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/menuwebsite'><i class='fa fa-circle-o'></i> Menu Website</a></li>
                    <li><a href='<?=base_url().$this->uri->segment(1) ?>/halamanbaru'><i class='fa fa-circle-o'></i> Halaman Baru</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="glyphicon glyphicon-object-align-left"></i> <span>Modul Web Nicotine</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/logowebsiteNicotine'><i class='fa fa-circle-o'></i> Logo Website</a></li>

                  <li><a href='<?= base_url().$this->uri->segment(1) ?>/backgroundNicotine'><i class='fa fa-circle-o'></i> Warna Website</a></li>
                </ul>
              </li>
            <?php } ?>


            <li class="header" style='text-transform:uppercase;'>MENU User</li>
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> <span>Modul Users</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <?php
                if($this->session->level=='super-admin' OR $this->session->level=='admin-wilayah'){
                  echo "<li><a href='".base_url().$this->uri->segment(1)."/manajemenuser'><i class='fa fa-circle-o'></i> Manajemen Admin</a></li>";
                }
              ?>
              </ul>
            </li>
            <li><a href="<?php echo base_url().$this->uri->segment(1); ?>/edit_manajemenuser/<?php echo $this->session->username; ?>"><i class="fa fa-edit"></i> <span>Edit Akun</span></a></li>
            <li><a href="<?php echo base_url().$this->uri->segment(1); ?>/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>