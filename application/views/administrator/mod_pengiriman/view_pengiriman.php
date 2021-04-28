                              
                <!-- Data list view starts -->             

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-4">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                    <th style='width:20px'>No</th>
                                    <th>Kode Pengiriman</th>
                                    <th>Tanggal Pengiriman</th>
                                    <th>Penerima</th>
                                    <th>Kurir</th>
                                    <th>Status</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelid">
                                <?php 
                                $no = 1;
                                foreach ($record as $row){
                                  $cabang= $this->db->query("SELECT * FROM cabang where KODE_CABANG='$row[PENERIMA]'")->row()->NAMA_CABANG;

                                  $kurir= $this->db->query("SELECT * FROM kurir where ID_KURIR='$row[ID_KURIR]'")->row()->NAMA_KURIR;

                                  if ($row[STATUS]  == 0) {
                                     $status = 'Sedang di proses';
                                  }else if ($row[STATUS]  == 1) {
                                     $status = 'Selesai';
                                  }else if ($row[STATUS]  == 2) {
                                     $status = 'Proses Retur';
                                  }                              

                                echo "<tr><td>$no</td>
                                          <td>$row[KODE_PENGIRIMAN]</td>
                                          <td>$row[TANGGAL_PENGIRIMAN]</td>
                                          <td>$cabang</td>
                                          <td>$kurir</td>
                                          <td>$status</td>
                                          <td style='width:200px' class='product-action d-print-none'>";
                                          if ($this->session->level='super-admin') {
                                              if ($row[STATUS]  == 0) {
                                                echo "
                                                  <a class='btn btn-md btn-success' title='Terima Barang' data-toggle='modal' data-target='#myModalDone".$no."'>
                                                    <i class='fas fa-sign-in-alt text-white'> Terima</i></a>
                                                  ";
                                              }
                                          
                                          }
                                          
                                            echo "
                                          </td>
                                      </tr>

                                      <!-- Modal Proses BEGIN -->
                                      <div class='modal fade' id='myModalDone".$no."'>
                                          <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Proses Data</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/pengiriman'). "'>
                                                  <div class='row'>
                                                    <div class='col-lg-4'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Kode</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='kode' readonly='on' required value='".$row[KODE_PENGIRIMAN]."'>
                                                      </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                      <label for='tanggal' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Tanggal Pengiriman</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='tanggal' readonly='on' required value='".$row[TANGGAL_PENGIRIMAN]."'>
                                                      </div>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                      <label for='xxx' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Penerima</label>
                                                      <div>
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
                                                      Jumlah Dikirim
                                                    </div>
                                                    <div class='col-lg-3 p-1 border'>
                                                      Jumlah Diterima
                                                    </div>";
                                                      $model = $this->model_app->view_where('detail_pengiriman',array('KODE_PENGIRIMAN' => $row[KODE_PENGIRIMAN]))->result();
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
                                                            ".$value->JUMLAH_DIKIRIM."
                                                          </div>
                                                          <div class='col-lg-3 p-1 border'>
                                                            <input type='hidden' name='addmore[".$numor."][id]' class='form-control' value='".$value->ID_DET_PENGIRIMAN."' required />
                                                            <input type='hidden' name='addmore[".$numor."][id_produk]' class='form-control' value='".$value->ID_PRODUK."' required />
                                                            <input type='hidden' name='addmore[".$numor."][id_penerima]' class='form-control' value='".$row[PENERIMA]."' required />
                                                            <input type='hidden' class='form-control dikirim' value='".$value->JUMLAH_DIKIRIM."' required />
                                                            <input type='text' name='addmore[".$numor."][jumlah]' class='form-control diterima' required />
                                                          </div>
                                                        ";
                                                        $numor++;
                                                      }
                                         echo "
                                                  <p class='text-warning'>nb: jika jumlah barang yang di input kurang dari jumlah barang yang dikirimkan maka barang akan di masukan kedalam data barang <b>retur</b></p>
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


<script type="text/javascript">
  // $('#prosesnya').click(function(){ 
  //     event.preventDefault();
  //   var dikirim = parseInt($('.dikirim').val());
  //   var diterima = parseInt($('.diterima').val());
  //   alert(dikirim);

  //   if (diterima > dikirim) {
  //     alert('Mohon mengisi data penerimaan barang dengan benar !!');
  //   }

  // });
</script>