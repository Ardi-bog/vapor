                              
                <!-- Data list view starts -->             

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-4">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                    <th style='width:20px'>No</th>
                                    <th>Kode</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelid">
                                <?php 
                                $no = 1;
                                foreach ($dataPermintaan as $row){
                                  if ($row[KODE_CABANG]  == 0) {
                                    $cabang='pusat';
                                  }else{
                                    $cabang= $this->db->query("SELECT * FROM cabang where KODE_CABANG='$row[KODE_CABANG]'")->row()->NAMA_CABANG;
                                  }   

                                  if ($row[STATUS]  == 0) {
                                     $status = 'Belum di proses';
                                  }else if ($row[STATUS]  == 1) {
                                     $status = 'Sedang di proses';
                                  }else if ($row[STATUS]  == 2) {
                                     $status = 'Selesai';
                                  }                               

                                echo "<tr><td>$no</td>
                                          <td>$row[KODE_PERMINTAAN]</td>
                                          <td>$row[TGL_PERMINTAAN]</td>
                                          <td>$cabang</td>
                                          <td>$status</td>
                                          <td style='width:200px' class='product-action d-print-none'>";
                                          if ($this->session->level='super-admin') {
                                              if ($row[STATUS]  == 0) {
                                                echo "
                                                  <a class='btn btn-md btn-success' title='Proses Barang' data-toggle='modal' data-target='#myModalProses".$no."'>
                                                    <i class='fas fa-sign-in-alt text-white'> Proses</i></a>
                                                  ";
                                              }else if ($row[STATUS]  == 1) {
                                                echo "
                                                  <a class='btn btn-md btn-warning' title='Pengiriman Barang' href='".base_url()."administrator/tambah_pengiriman/".$row[KODE_PERMINTAAN]."'>
                                                    <i class='fas fa-shipping-fast text-white'> Pengiriman</i></a>
                                                  ";
                                              }
                                          
                                          }
                                          
                                            echo "
                                          </td>
                                      </tr>

                                      <!-- Modal Update BEGIN -->
                                      <div class='modal fade' id='myModalProses".$no."'>
                                          <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Proses Data</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/permintaan_stok'). "'>
                                                  <div class='row'>
                                                    <div class='col-lg-4'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Kode</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='kode' readonly='on' required value='".$row[KODE_PERMINTAAN]."'>
                                                      </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Tanggal Req</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' readonly='on' required value='".$row[TGL_PERMINTAAN]."'>
                                                      </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Cabang</label>
                                                      <div>
                                                          <input type='hidden' name='cabang' value='".$row[KODE_CABANG]."'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='xxx' readonly='on' required value='".$cabang."'>
                                                      </div>
                                                    </div>
                                                  </div><br>
                                                  <hr style='height:3px;background:green'>
                                                  <h4 style='margin-left: 10px;'>Daftar Barang</h4>
                                                  <div class='row p-2'>
                                                    <div class='col-lg-3 p-1 border'>
                                                      Kode Barang
                                                    </div>
                                                    <div class='col-lg-3 p-1 border'>
                                                      Nama Barang
                                                    </div>
                                                    <div class='col-lg-3 p-1 border'>
                                                      Jumlah Request
                                                    </div>
                                                    <div class='col-lg-3 p-1 border'>
                                                      Jumlah disetujui
                                                    </div>";
                                                      $model = $this->model_app->view_where('detail_permintaan',array('ID_PERMINTAAN' => $row[KODE_PERMINTAAN]))->result();
                                                      $numor=1;
                                                      foreach ($model as $value) {
                                                        $produk = $this->model_app->view_where('produk',array('ID_PRODUK' => $value->ID_PRODUK))->row();
                                                        echo "
                                                          <div class='col-lg-3 p-1 border'>
                                                            ".$value->ID_PRODUK."
                                                          </div>
                                                          <div class='col-lg-3 p-1 border'>
                                                            ".$produk->NAMA_PRODUK."
                                                          </div>
                                                          <div class='col-lg-3 p-1 border text-center'>
                                                            ".$value->JUMLAH_REQ."
                                                          </div>
                                                          <div class='col-lg-3 p-1 border'>
                                                            <input type='hidden' name='addmore[".$numor."][id]' class='form-control' value='".$value->ID_DET_PERMINTAAN."' required />
                                                            <input type='hidden' name='addmore[".$numor."][id_produk]' class='form-control' value='".$value->ID_PRODUK."' required />
                                                            <input type='text' name='addmore[".$numor."][jumlah]' class='form-control' required />
                                                          </div>
                                                        ";
                                                        $numor++;
                                                      }
                                         echo "
                                                  </div>
                                              </div>
                                              
                                              <!-- Modal footer -->
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                <button type='submit' id='prosesnya' name='proses' class='btn btn-primary'>
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