
<!-- Data list view starts -->
  <a id="modalCreate" class="btn btn-success btn-outline-primary btn-md" data-toggle='modal' data-target='#myModalcreate'><i class="feather icon-plus"></i> Tambahkan Data</a><br>

  
  <!-- DataTable starts -->
  <div class="table-responsive mt-1">
      <?php echo $this->session->flashdata('pesan');?>
      <table class="table table-bordered table-hover text-center data-thumb-view">
          <thead class="thead-light">
              <tr>
                  <th></th>
                  <th style='width:20px'>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Foto</th>
                  <th>Wilayah</th>
                  <th>Level</th>
                  <th class='text-center'>Status Akun</th>
                  <th style='width:70px'>Action</th>
              </tr>
          </thead>
          <tbody id="tabelid">
              <?php 
              $no = 1;
              foreach ($record as $row){
              if ($row['FOTO'] == ''){ $foto ='blank.png'; }else{ $foto = $row['FOTO']; }
              $ko = $this->db->query("SELECT * FROM rb_kota where ID_KOTA='$row[ID_KOTA]'")->row_array();
              if ($ko == null || $ko == '') {
                $kota='PUSAT';
              }else{
                $kota= $ko[NAMA_KOTA];
              }
              $idkota=$row[ID_KOTA];
              $idkotam = $this->db->query("SELECT * FROM rb_kota where ID_KOTA=$idkota")->row_array();
              echo "<tr><td></td>
                        <td>$no</td>
                        <td>$row[USERNAME]</td>
                        <td style='word-wrap: break-word;min-width: 120px;max-width: 120px;'>
                          $row[NAMA_USER]</td>
                        <td style='word-wrap: break-word;min-width: 120px;max-width: 120px;'>
                          $row[EMAIL]</td>
                        <td>$row[NO_HP]</td>
                        <td><img style='border:1px solid #cecece' width='40px' src='".base_url()."asset/foto_user/$foto'></td>
                        <td>$kota</td>
                        <td>$row[LEVEL_USERS]</td>";
                        if ($this->session->level == 'super-admin') {
                        echo "
                          <!-- Button to Open the Modal -->
                          <td class='text-center'>";

                            if ($row[STATUS_AKUN] == 0) {
                              echo "
                                <span style='padding:5px;' class='btn btn-warning btn-md'>Tidak Aktif<span> &nbsp;&nbsp;&nbsp;
                                <a class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal".$no."'> 
                                  <i class='fa fa-pencil'></i>
                                </a>
                              ";
                            }else{
                              echo "
                                <span style='padding:5px;' class='btn btn-primary btn-md'>Aktif<span> &nbsp;&nbsp;&nbsp;
                                <a class='btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal".$no."'> 
                                  <i class='fa fa-pencil'></i>
                                </a>
                              ";
                            }
                       echo "</td>

                          <!-- The Modal -->
                          <div class='modal fade' id='myModal".$no."'>
                            <div class='modal-dialog'>
                              <div class='modal-content'>
                              
                                <!-- Modal Header -->
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Ganti Status Akun</h4>
                                  
                                </div>
                                
                                <!-- Modal body -->
                                <div class='modal-body'>
                              <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/ganti_status_pegawai'); echo "'>
                                    <div class='form-group'>
                                        <label for='status_member' class='control-label'>Status Akun</label>
                                        <div>
                                            <input type='hidden' name='a' value='".$row[USERNAME]."'>";
                                            if ($row[STATUS_AKUN] == 1 ) {
                                              echo "<input type='radio' name='status-akun' value='0'> Tidak Aktif &nbsp;
                                              <input type='radio' name='status-akun' value='1' checked> Aktif";
                                            }else{
                                              echo "
                                              <input type='radio' name='status-akun' value='0' checked> Tidak Aktif &nbsp;
                                              <input type='radio' name='status-akun' value='1'> Aktif";
                                            }
                              echo "
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
                        ";
                    }else{
                      echo "<td>$statusnya</td>";
                    }
               echo "   <td class='product-action d-print-none'>
                            <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[ID_USERNYA]."'>
                              <i class='feather icon-edit font-medium-1'></i></a>
                            ";

                          if ($this->session->level == 'super-admin') {
                              echo "
                              <a class='btn btn-sm btn-danger' title='Hapus Data' data-toggle='modal' data-target='#myModaldelete".$row[ID_USERNYA]."'>
                              <i class='feather icon-trash font-medium-1'></i></a>";
                          }
                          echo "
                        </center></td>
                    </tr>

                    <!-- Modal Update BEGIN -->
                    <div class='modal fade' id='myModaledit".$row[ID_USERNYA]."'>
                        <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                          <div class='modal-content'>
                          
                            <!-- Modal Header -->
                            <div class='modal-header'>
                              <h4 class='modal-title'>Edit data Promo</h4>
                              
                            </div>
                            
                            <!-- Modal body -->
                            <div class='modal-body'>
                          <form class='form-horizontal' enctype='multipart/form-data' role='form' method='POST' action='".base_url('administrator/pegawai'). "'>

                                <div class='form-group'>
                                    <label for='a' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Username</label>
                                    <div>
                                        <input type='hidden' name='id1' value='$row[USERNAME]'>
                                        <input type='hidden' name='id2' value='$row[ID_USERNYA]'>
                                        <input type='text' readonly='on' style='margin-left: 20px;width: 90%;' class='form-control' name='a' required value='".$row[USERNAME]."'>
                                    </div><br>

                                   <label for='b' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Password</label>
                                    <div>
                                        <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='b' placeholder='isi data ini untuk mengganti password'>
                                    </div><br>

                                    <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Pegawai</label>
                                    <div>
                                        <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' required value='".$row[NAMA_USER]."'>
                                    </div><br>

                                    <label for='email' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Alamat Email</label>
                                    <div>
                                        <input type='email' style='margin-left: 20px;width: 90%;' class='form-control' name='email' required value='".$row[EMAIL]."'>
                                    </div><br>

                                    <label for='no_hp' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nomor Hp</label>
                                    <div>
                                        <input type='number' style='margin-left: 20px;width: 90%;' class='form-control' name='no_hp' required value='".$row[NO_HP]."'>
                                    </div><br>

                                    <label for='jk' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Jenis Kelamin</label>
                                    <div style='margin-left: 20px;width: 90%;'>";
                                        if ($row[JENIS_KELAMIN] == 'Perempuan') {
                                          echo "
                                                <input type='radio' name='jk' value='Laki-laki'> Laki-laki &nbsp;
                                                <input type='radio' name='jk' value='Perempuan' checked> Perempuan";
                                        }else{
                                          echo "
                                                <input type='radio' name='jk' value='Laki-laki' checked> Laki-laki &nbsp;
                                                <input type='radio' name='jk' value='Perempuan'> Perempuan";
                                        }
                              echo " </div><br>

                                    <label for='alamat' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Alamat Lengkap</label>
                                    <div style='margin-left: 20px;width: 90%;'>
                                        <textarea rows='4' cols='50' name='alamat' required>$row[ALAMAT_LENGKAP]</textarea>
                                    </div><br>

                                    <label for='kecamatan' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Kecamatan</label>
                                    <div>
                                        <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='kecamatan' required value='".$row[KECAMATAN]."'>
                                    </div><br>

                                    <label for='f' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Foto Pegawai</label>
                                    <div style='margin-left: 20px;width: 90%;'>
                                        <p style='font-style: italic;font-size:12px;'>max size file upload : 300 kb</p> 
                                        <input type='file' class='form-control' name='f'>";
                                        if ($row['FOTO'] != ''){ 
                                          echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_user/$row[FOTO]'>$row[FOTO]</a>"; 
                                        }
                                        else{
                                          echo "<i style='color:red'>Foto Saat ini : -</i>";
                                        } 
                                  echo "
                                    </div><br>";

                                    if ($this->session->level == 'super-admin'){

                                      //level user
                                  echo "<label for='level' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Level user</label>
                                    <div style='margin-left: 20px;width: 90%;'>";
                                        if ($row[LEVEL_USERS] == 'pegawai' ) {
                                          echo "
                                                <input type='radio' name='level' value='pegawai' checked> Pegawai &nbsp;
                                                <input type='radio' name='level' value='Kasir'> Kasir";
                                        }else if ($row[LEVEL_USERS] == 'kasir' ) {
                                          echo "
                                                <input type='radio' name='level' value='pegawai'> Pegawai &nbsp;
                                                <input type='radio' name='level' value='kasir' checked> Kasir";
                                        }
                                  echo " </div><br>"; 

                                      //status akun
                                  echo "<label for='status-akun' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Status Akun</label>
                                    <div style='margin-left: 20px;width: 90%;'>";
                                        if ($row[STATUS_AKUN] == 1 ) {
                                          echo "
                                                <input type='radio' name='status-akun' value='0'> Tidak Aktif &nbsp;
                                                <input type='radio' name='status-akun' value='1' checked> Aktif";
                                        }else{
                                          echo "
                                                <input type='radio' name='status-akun' value='0' checked> Tidak Aktif &nbsp;
                                                <input type='radio' name='status-akun' value='1'> Aktif";
                                        }
                                  echo " </div><br>";

                                      //kota dan tanggal masuk
                                      echo "
                                      <label for='idkota' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Wilayah</label>
                                        <div style='margin-left: 20px;margin-bottom: 10px;' >
                                            <select class='cariKota' name='idkota' style='width: 100%;' required>
                                              <option value='$idkotam[ID_KOTA]'>$idkotam[NAMA_KOTA]</option>
                                            </select>
                                        </div><br>

                                      <label for='tanggal' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Tanggal Masuk</label>
                                        <div>
                                            <input style='margin-left: 20px;width: 90%;' class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='$row[TANGGAL_MASUK]' >
                                        </div><br>
                                      ";          
                                                    
                                }else{
                                  echo "
                                        <tr><th width='120px' scope='row'>Level</th>   <td><input type='text' class='form-control' name='level' value='$row[level]' readonly='on'></td></tr>
                                        <tr><th width='120px' scope='row'>Wilayah</th>   <td><input type='text' class='form-control' name='x' value='$idkotam[NAMA_KOTA]' readonly='on'></td></tr>
                                        <input type='hidden' name='idkota' value='$row[ID_KOTA]'>
                                        <input type='hidden' name='status-akun' value='$row[STATUS_AKUN]'>
                                      ";
                                } 

                              echo "

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

                    <!-- Modal DELETE BEGIN -->
                    <div class='modal fade' id='myModaldelete".$row[ID_USERNYA]."'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>DELETE</h5>
                            
                          </div>
                          <div class='modal-body'> Apakah anda yakin ingin menghapus data ini ? </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                            <a href='".base_url().$this->uri->segment(1)."/delete_pegawai/$row[USERNAME]' id='delete' class='btn btn-primary'>Hapus</a> </div>
                        </div>
                    </div>
                    ";
                $no++;
              }
            ?>    
          </tbody>
      </table>
  </div>
  <!-- DataTable ends -->

    <!-- The Modal -->
<div class='modal fade' id='myModalcreate'>
  <div class='modal-dialog modal-dialog-scrollable modal-lg'>
    <div class='modal-content'>
    
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'>Tambah Data Pegawai</h4>
        
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' enctype='multipart/form-data' role='form' method='POST' action='<?=base_url('administrator/pegawai') ?>'>
          <?php 
            echo "<div class='col-md-12'>
                  <table class='table table-condensed table-borderless'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='username' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='password' placeholder='isi dengan password baru untuk mengganti password user' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Nama Pegawai</th>             <td><input type='text' class='form-control' name='nama' required></td></tr>
                    <tr><th scope='row'>Alamat Email</th>             <td><input type='email' class='form-control' name='email' required></td></tr>
                    <tr><th scope='row'>No HP</th>               <td><input type='number' class='form-control' name='no_hp' required></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>                   
                            <td><input type='radio' name='jk' value='Laki-laki'> Laki-laki &nbsp;
                            <input type='radio' name='jk' value='Perempuan' checked> Perempuan</td></tr>
                    <tr><th scope='row'>Alamat Lengkap</th>               <td><textarea rows='4' cols='50' name='alamat' placeholder='Alamat Desa, Jalan, dan No Rumah/Kantor anda..' required></textarea></td></tr>
                    <tr><th scope='row'>Kecamatan</th>             <td><input type='text' class='form-control' name='kecamatan' required></td></tr>
                    <tr><th scope='row'>Provinsi</th>              
                      <td>"; 
                                        echo "<select id='provinsi'  class='form-control' name='zzz'>
                                            <option value=''>--Pilih Provinsi--</option>";
                                            foreach ($provinsi as $rows) {
                                                echo "<option value='$rows[ID_PROVINSI]'>$rows[NAMA_PROVINSI]</option>";
                                            }
              echo "</select></td></tr>
                  <tr><th scope='row'>Kota</th>               
                    <td>
                      <select class='form-control' name='kota' id='kota' required>
                          <option value=''>--Pilih Provinsi Terlebih Dahulu--</option>
                      </select>
                    </td>
                  </tr>
                  <tr><th scope='row'>Upload Foto</th>              <td><p style='font-style: italic;'>max size file upload : 300 kb</p> <input type='file' class='form-control' name='f'></td></tr>
                    <tr><th scope='row'>Level</th>                   
                      <td><input type='radio' name='level' value='pegawai' checked> Pegawai &nbsp;
                      <input type='radio' name='level' value='kasir'> Kasir</td></tr>
                    <tr><th scope='row'>Tanggal Masuk</th>             <td><input class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='";echo date('Y-m-d')."' ></td></tr>
                  </tbody>
                  </table></div>";
          ?>
      </div>
      
      <!-- Modal footer -->
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
        <button type='submit' name='tambah' class='btn btn-primary'>
            Simpan
        </button>
      </div>
    </form>
      
    </div>
  </div>
</div>