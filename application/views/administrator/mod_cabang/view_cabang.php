
                <!-- Data list view starts -->             

                    <a class="btn btn-success btn-outline-primary btn-md" data-toggle='modal' data-target='#myModalcreate'><i class="feather icon-plus"></i> Tambahkan Data</a><br>

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-4">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                    <th style='width:20px'>No</th>
                                    <th>Kode Cabang</th>
                                    <th>Nama Cabang</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Telp Cabang</th>
                                    <th>Wilayah</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelid">
                                <?php 
                                $no = 1;
                                foreach ($record as $row){
                                  $idKota= $this->db->query("SELECT * FROM rb_kota where ID_KOTA='$row[KODE_WILAYAH]'")->row();
                                  if ($idKota->ID_KOTA == 0) {
                                    $kota='pusat';
                                  }else{
                                    $kota = $idKota->NAMA_KOTA;
                                  }
                                echo "<tr><td>$no</td>
                                          <td>$row[KODE_CABANG]</td>
                                          <td>$row[NAMA_CABANG]</td>
                                          <td>$row[TANGGAL_DAFTAR]</td>
                                          <td>$row[TELP_CABANG]</td>
                                          <td>$kota</td>
                                          <td class='product-action d-print-none'>
                                              <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[KODE_CABANG]."'>
                                                <i class='feather icon-edit font-medium-1'></i></a>
                                              ";

                                            if ($this->session->level == 'super-admin') {
                                                echo "
                                                <a class='btn btn-sm btn-danger' title='Hapus Data' data-toggle='modal' data-target='#myModaldelete".$row[KODE_CABANG]."'>
                                                <i class='feather icon-trash font-medium-1'></i></a>";
                                            }
                                            echo "
                                          </center></td>
                                      </tr>

                                      <!-- Modal Update BEGIN -->
                                      <div class='modal fade' id='myModaledit".$row[KODE_CABANG]."'>
                                          <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Edit data Menu</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/cabang'). "'>
                                                  <div class='form-group'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Cabang</label>
                                                      <div>
                                                          <input type='hidden' name='id' value='$row[KODE_CABANG]'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' required value='".$row[NAMA_CABANG]."'>
                                                      </div><br>

                                                      <label for='tanggal' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Tanggal Daftar</label>
                                                      <div>
                                                          <input style='margin-left: 20px;width: 90%;' class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='$row[TANGGAL_DAFTAR]' >
                                                      </div><br>

                                                      <label for='telp' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Telp Cabang</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='telp' required value='".$row[TELP_CABANG]."'>
                                                      </div><br>

                                                      <label for='idkota' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Wilayah</label>
                                                      <div style='margin-left: 20px;margin-bottom: 10px;' >
                                                          <select class='cariKota form-control' name='idkota' style='width: 92%;' required>
                                                            <option value='$idKota->ID_KOTA'>$idKota->NAMA_KOTA</option>
                                                          </select>
                                                      </div><br>

                                                      <label for='alamat' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Alamat Cabang</label>
                                                      <div style='margin-left: 20px;width: 90%;'>
                                                          <textarea rows='4' class='form-control' cols='50' name='alamat' required>$row[ALAMAT_CABANG]</textarea>
                                                      </div><br>
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
                                      <div class='modal fade' id='myModaldelete".$row[KODE_CABANG]."'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <div class='modal-header'>
                                              <h5 class='modal-title' id='exampleModalLabel'>DELETE</h5>
                                              
                                            </div>
                                            <div class='modal-body'> Apakah anda yakin ingin menghapus data ini ? </div>
                                            <div class='modal-footer'>
                                              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                              <a href='".base_url().$this->uri->segment(1)."/delete_cabang/$row[KODE_CABANG]' id='delete' class='btn btn-primary'>Hapus</a> </div>
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
        <h4 class='modal-title'>Tambah Data Cabang</h4>
        
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('administrator/cabang') ?>'>
          <?php 
            echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <tr><th scope='row'>Nama Cabang</th>             <td><input type='text' class='form-control' name='nama' required></td></tr>

                  <tr><th scope='row'>Tanggal Daftar</th>             <td><input class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='";echo date('Y-m-d')."' ></td></tr>

                  <tr><th scope='row'>Telp Cabang</th>             <td><input type='number' class='form-control' name='telp' required></td></tr>

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

                  <tr><th scope='row'>Alamat Cabang</th>               <td><textarea rows='4' cols='50' name='alamat' class='form-control' placeholder='Alamat Desa, Jalan, dan No alamat Cabang anda..' required></textarea></td></tr>
                  
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