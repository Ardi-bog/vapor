
                <!-- Data list view starts -->

                    <?php echo $this->session->flashdata('pesan'); ?>

                    <!-- DataTable starts -->

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover data-thumb-view">
                            <thead>
                                <tr>
                                    <th style='width:20px'>No</th>
                                    <th>KODE Toko</th>
                                    <th>Nama Toko</th>
                                    <th>Kota</th>
                                    <th>Status Toko</th>
                                    <th>Statusnya</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach ($record as $row){
                                $idkota=$row[ID_KOTA];
                                $idkotam = $this->db->query("SELECT * FROM rb_kota where ID_KOTA=$idkota")->row_array();

                                $identitas = $this->db->query("SELECT * FROM identitas_web")->result_array();
                                $idIdentitas=$row[STATUS_TOKO];
                                $modelidentitas = $this->db->query("SELECT * FROM identitas_web where NAMA_WEBSITE='".$idIdentitas."'")->row_array();

                                if ($row[STATUSNYA] == 0) {
                                  $statusnya='<a style="padding:5px;" class="btn btn-md btn-danger">Tidak Aktif<a>';
                                }else{
                                  $statusnya='<a style="padding:5px;" class="btn btn-md btn-primary">Aktif<a>';
                                }
                                echo "<tr><td>$no</td>
                                          <td>$row[KODE_TOKO]</td>
                                          <td>$row[NAMA_TOKO]</td>
                                          <td>$idkotam[NAMA_KOTA]</td>
                                          <td>$row[STATUS_TOKO]</td>
                                          <td>$statusnya</td>
                                          <td class='product-action d-print-none'>
                                              <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[KODE_TOKO]."'>
                                                <i class='feather icon-edit font-medium-1'></i></a>
                                          </center></td>
                                      </tr>

                                      <!-- Modal Update BEGIN -->
                                      <div class='modal fade' id='myModaledit".$row[KODE_TOKO]."'>
                                          <div class='modal-dialog modal-dialog-scrollable'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Edit data Promo</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/info_toko_vapor'). "'>

                                                  <div class='form-group'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Toko</label>
                                                      <div>
                                                          <input type='hidden' name='id' value='$row[KODE_TOKO]'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' required value='".$row[NAMA_TOKO]."'>
                                                      </div><br>

                                                     <label for='idkota' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Wilayah</label>
                                                      <div style='margin-left: 20px;margin-bottom: 10px;' >
                                                          <select id='cariKota' name='idkota' style='width: 100%;' required>
                                                            <option value='$idkotam[ID_KOTA]'>$idkotam[NAMA_KOTA]</option>
                                                          </select>
                                                      </div><br>

                                                      <label for='status_toko' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Status Toko</label>
                                                      <div style='margin-left: 20px;margin-bottom: 10px;' >";
                                                          echo "<select class='form-control' name='status_toko' required>
                                                          <option value='$modelidentitas[NAMA_WEBSITE]'>$modelidentitas[NAMA_WEBSITE]</option>";
                                                          foreach ($identitas as $rows) {
                                                              echo "<option value='$rows[NAMA_WEBSITE]'>$rows[NAMA_WEBSITE]</option>";
                                                          }
                                              echo "</select>
                                                      </div><br>


                                                      <label for='statusnya' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Status</label>
                                                      <div style='margin-left: 20px;margin-bottom: 10px;' >";
                                                      if ($row[STATUSNYA] == 0) {
                                                        echo "
                                                              <input type='radio' name='statusnya' value='0' checked> Tidak Aktif &nbsp;
                                                              <input type='radio' name='statusnya' value='1'> Aktif
                                                        ";
                                                      }else{
                                                        echo "
                                                              <input type='radio' name='statusnya' value='0'> Tidak Aktif &nbsp;
                                                              <input type='radio' name='statusnya' value='1' checked> Aktif
                                                        "; 
                                                      }
                                                     echo " </div><br>

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