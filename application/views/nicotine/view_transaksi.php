<?php 
  
  $rows = $this->model_app->edit('rb_penjualan_detail', array('NO_FAKTUR_PENJUALAN' => $this->session->nofaktur))->result_array();

  $ppn = $this->model_app->edit('profil_toko', array('STATUS_TOKO' => 'nicotine'))->row()->PPN;
?>

<div class="row">
  <div class="col-lg-12">
    <div class="card overflow-hidden">                                
      <div class="card-content">
         <div class="card-body">

            <table class='table table-condensed table-bordered'>
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Nama Menu</td>
                  <td>Harga Menu</td>
                  <td>Jumlah</td>
                  <td>Sub Total</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;$total=0; foreach ($rows as $row): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $row[NAMA_PRODUK] ?></td>
                      <td><?= $row[HARGA] ?></td>
                      <td><?= $row[JUMLAH] ?></td>
                      <td><?= $row[SUB_TOTAL_HARGA] ?></td>
                      <td>
                        <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myEditpesananku<?= $row[ID_PENJUALAN_DETAIL] ?>'><i class='feather icon-edit font-medium-1'></i></a>
                        <a class='btn btn-sm btn-danger' title='Hapus Data' data-toggle='modal' data-target='#myModaldelete<?= $row[ID_PENJUALAN_DETAIL] ?>'><i class='feather icon-trash font-medium-1'></i></a>
                      </td>
                    </tr>
                          <!-- Modal Edit -->
                          <div class='modal fade' id='myEditpesananku<?= $row[ID_PENJUALAN_DETAIL] ?>'>
                            <div class='modal-dialog'>
                              <div class='modal-content'>
                              
                                <!-- Modal Header -->
                                <div class='modal-header'>
                                  <h4 class='modal-title'>Edit Pesanan</h4>
                                  
                                </div>
                                
                                <!-- Modal body -->
                                <div class='modal-body'>
                              <form class='form-horizontal' role='form' method='POST' action='<?= base_url('nicotine/keranjang') ?>'>
                                    <div class='form-group'>
                                        <label for='b' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Menu</label>
                                        <div>
                                            <input type='hidden' name='a' class='id' value='<?= $row[ID_PENJUALAN_DETAIL] ?>'>
                                            
                                            <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='b' value='<?= $row[NAMA_PRODUK] ?>' readonly='on' required>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='c' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Jumlah pesanan</label>
                                        <div>
                                            <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='c' value="<?= $row[JUMLAH] ?>" required>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='d' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Harga</label>
                                        <div>
                                            <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='d' value='<?= $row[HARGA] ?>' readonly='on' required>
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
                          <!-- Modal Delete -->
                          <div class='modal fade' id='myModaldelete<?= $row[ID_PENJUALAN_DETAIL] ?>'>
                            <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLabel'>DELETE</h5>
                                  
                                </div>
                                <div class='modal-body'> Apakah anda yakin ingin menghapus data ini ? </div>
                                <div class='modal-footer'>
                                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                  <a href='<?= base_url().$this->uri->segment(1) ?>/delete_keranjang/<?=$row[ID_PENJUALAN_DETAIL]?>' id='delete' class='btn btn-primary'>Hapus</a> </div>
                              </div>
                          </div>
                <?php 
                  $no++; 
                  $total+=(int)$row[SUB_TOTAL_HARGA]; 

                  $jumlah_ppn = ($total*$ppn)/100;
                  $jadi_plus_ppn = $total + $jumlah_ppn;
                  endforeach 
                ?>
                <tr>
                  <td colspan="4" class="text-right" style="padding-right: 80px;font-size: 20px"> <strong>Total</strong></td>
                  <td class="text-center" style="font-size: 20px;"><input type="hidden" name="sub_dari_total" class="form-control" value="<?= $ppn ?>"> <strong><?= $total ?>%</strong></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right" style="padding-right: 80px;font-size: 20px"> <strong>PPN</strong></td>
                  <td class="text-center" style="font-size: 20px;"><input type="hidden" name="ppn" class="form-control" value="<?= $ppn ?>"> <strong><?= $ppn ?>%</strong></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-right" style="padding-right: 80px;font-size: 2em"> <strong>Total + PPN</strong></td>
                  <td class="text-center" style="font-size: 2em"><strong><?= $jadi_plus_ppn ?></strong></td>
                  <td>
                    <?php if ($total !=0){ ?>
                        <?php 
                          if ($this->session->username != '') {
                        ?>
                          <button class='btn btn-primary' data-toggle='modal' data-target='#mySimpanPesanan'>
                                Simpan
                          </button>

                          <!-- The Modal -->
                          <div class='modal fade hide' id='mySimpanPesanan'>
                            <div class='modal-dialog modal-dialog-centered'>
                              <div class='modal-content'>
                              
                                <!-- Modal Header -->
                                <div class='modal-header'>
                                  <h4 class='modal-title'> Pilih Meja</h4>
                                  
                                </div>
                                
                                <!-- Modal body -->
                                <div class='modal-body'>
                              <form class='form-horizontal' role='form' method='POST' action='<?=base_url('nicotine/keranjang') ?>'>
                                    <div class='form-group'>
                                        <div>
                                            <input type='text' style="margin-left: 20px;width: 90%;" class='form-control' placeholder="Masukan Nomor Meja .." name='meja' required>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Modal footer -->
                                <div class='modal-footer'>
                                  <button type='submit' name='simpan' class='btn btn-primary'>
                                      Simpan
                                  </button>
                                </div>
                              </form>
                                
                              </div>
                            </div>
                          </div>
                        <?php 
                          }else{
                        ?>
                        <form class='form-horizontal' role='form' method='POST' action='<?= base_url('nicotine/keranjang') ?>'>
                            <input type='hidden' name='meja' value='0'>
                            <button type='submit' name='simpan' class='btn btn-primary'>
                                Simpan
                            </button>
                        </form>
                      <?php } ?>
                    <?php }else{ ?>
                        <button class='btn btn-warning'>
                              Simpan
                          </button>
                    <?php } ?>
                    
                  </td>
                </tr>
              </tbody>
            </table>

              
             </div>
           </div>
         </div>
       </div>
     </div>
  </div>