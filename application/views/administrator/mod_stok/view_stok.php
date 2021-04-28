                              
                <!-- Data list view starts -->             

                    <a class="btn btn-success btn-outline-primary btn-md" data-toggle='modal' data-target='#myModalcreate'><i class="feather icon-plus"></i> Tambahkan Data Manual</a><br>

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-4">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                    <th style='width:20px'>No</th>
                                    <th>ID Stok</th>
                                    <th>Cabang</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Stok Masuk</th>
                                    <th>Stok Keluar</th>
                                    <th>Jumlah Stok</th>
                                    <th>Date Time Updated</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelid">
                                <?php 
                                $no = 1;
                                foreach ($record as $row){
                                  $produk= $this->db->query("SELECT * FROM produk where ID_PRODUK='$row[ID_PRODUK]'")->row_array();
                                  $idProduk=$produk[ID_KATEGORI];
                                  $kategori= $this->db->query("SELECT * FROM kategori_produk where ID_KATEGORI='$idProduk'")->row_array();

                                  if ($row[ID_CABANG]  == 0) {
                                    $cabang='pusat';
                                  }else{
                                    $cabang= $this->db->query("SELECT * FROM cabang where KODE_CABANG='$row[ID_CABANG]'")->row()->NAMA_CABANG;
                                  }                                  

                                echo "<tr><td>$no</td>
                                          <td>$row[ID_STOK]</td>
                                          <td>$cabang</td>
                                          <td>$produk[NAMA_PRODUK]</td>
                                          <td>$kategori[NAMA_KATEGORI]</td>
                                          <td><span class='bg-primary text-white p-1'>$row[STOK_MASUK]</span></td>
                                          <td><span class='bg-danger text-white p-1'>$row[STOK_KELUAR]</span></td>
                                          <td><span class='bg-warning text-white p-1'>$row[JUMLAH_STOK]</span></td>
                                          <td>$row[DATE_TIME_UPDATED]</td>
                                          <td style='width:200px' class='product-action d-print-none'>";
                                          if ($row[ID_CABANG]  == 0) {
                                          echo "
                                              <a class='btn btn-md btn-success' title='Proses Data' data-toggle='modal' data-target='#myModalProses".$row[ID_STOK]."'>
                                                <i class='fas fa-sign-in-alt text-white'> Stok Masuk</i></a>
                                              ";
                                          }
                                            echo "
                                          </td>
                                      </tr>

                                      <!-- Modal Update BEGIN -->
                                      <div class='modal fade' id='myModalProses".$row[ID_STOK]."'>
                                          <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Proses</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/stok'). "'>
                                                  <div class='form-group'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Cabang</label>
                                                      <div>
                                                          <input type='hidden' name='id' value='$row[ID_STOK]'>
                                                          <input type='hidden' name='produk' value='$row[ID_PRODUK]'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' readonly='on' required value='".$produk[NAMA_PRODUK]."'>
                                                      </div><br>

                                                      <label for='in' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Stok Masuk</label>
                                                      <div>
                                                          <input type='number' style='margin-left: 20px;width: 90%;' class='form-control' name='in' readonly='on' required value='".$row[STOK_MASUK]."'>
                                                      </div><br>

                                                      <label for='out' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Stok Keluar</label>
                                                      <div>
                                                          <input type='number' style='margin-left: 20px;width: 90%;' class='form-control' name='out' readonly='on' required value='".$row[STOK_KELUAR]."'>
                                                      </div><br>

                                                      <label for='jumlah' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Stok Keluar</label>
                                                      <div>
                                                          <input type='number' style='margin-left: 20px;width: 90%;' class='form-control' name='jumlah' readonly='on' required value='".$row[JUMLAH_STOK]."'>
                                                      </div><br>

                                                      <label for='masuk' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Jumlah Penambahan Stok</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='masuk' required>
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
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('administrator/stok') ?>'>
          <?php 
            echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                  <tr><th scope='row'>Cabang</th>              
                      <td>"; 
                        echo "<select  class='form-control' name='cabang' required>
                            <option value='0'> Pusat </option>";
                            foreach ($dataCabang as $cabang) {
                                echo "<option value='$cabang[KODE_CABANG]'>$cabang[NAMA_CABANG]</option>";
                            }
              echo "</select></td></tr>

                  <tr><th scope='row'>Produk</th>              
                      <td>"; 
                        echo "<select  class='form-control' name='produk' required>
                            <option value=''>--Pilih Produk--</option>";
                            foreach ($dataProduk as $p) {
                                echo "<option value='$p[ID_PRODUK]'>$p[NAMA_PRODUK]</option>";
                            }
              echo "</select></td></tr>

                  <tr><th scope='row'>Stok Masuk</th>             <td><input type='number' class='form-control' name='in' required></td></tr>

                  <tr><th scope='row'>Stok Keluar</th>             <td><input type='number' class='form-control' name='out' required></td></tr>
                  
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