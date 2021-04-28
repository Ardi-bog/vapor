<?php 
    

    $date = date('Y-m-d');
    
    $maxid = $this->db->query("SELECT MAX(KODE_PENGIRIMAN) as maxid FROM pengiriman WHERE TANGGAL_PENGIRIMAN ='".$date."'")->row()->maxid;

    if ($maxid == '') {
      $maxid = 0;
    }

    $date2=date('Ymd');

    $no_urut = substr($maxid, -4);
    $new_urut = $no_urut + 1;
    $no_req = 'DELV'. $date2 . sprintf("%04s", $new_urut);

    $model_cabang = $this->model_app->view_where('cabang',array('KODE_CABANG' => $dataPermintaan['KODE_CABANG']))->row();
    $kota_cabang = $this->model_app->view_where('rb_kota',array('ID_KOTA' => $alamat_cabang->KODE_WILAYAH))->row()->NAMA_KOTA;

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah data Pengiriman : ".$dataPermintaan[KODE_PERMINTAAN]."</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/tambah_pengiriman',$attributes); 

                error_reporting(0);

                 echo $this->session->flashdata('pesan');
                echo " 
                  <div class='row'>
                      <div class='col-lg-6'>
                          <hr style='height:3px;background:green'>
                          <div class='row p-2'>
                            <div class='col-lg-3 mb-2'>
                              <p style='padding-top:10px;'>Kode Reg</p>
                            </div>
                            <div class='col-lg-9 mb-2'>
                              <input type='text' class='form-control' readonly='on' value='".$no_req."' name='kode'>
                            </div>
                            <div class='col-lg-3 mb-2'>
                              <p style='padding-top:10px;'>Tanggal</p>
                            </div>
                            <div class='col-lg-9 mb-2'>
                                <input class='form-control' readonly='on' data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='".$date."' >
                            </div>
                            <div class='col-lg-3 mb-2'>
                              <p style='padding-top:10px;'>Pilih Kurir</p>
                            </div>
                            <div class='col-lg-9 mb-2'>"; 
                            echo "<select class='form-control custom-select' name='kurir' id='cariIdprodukl' required>
                                <option value=''>--Pilih Kurir--</option>";
                                foreach ($dataKurir as $k) {
                                    echo "<option value='$k[ID_KURIR]'>$k[NAMA_KURIR]</option>";
                                }
                            echo "</select>
                            </div>
                          </div>
                      </div>
                      <div class='col-lg-6'>
                        <hr style='height:3px;background:red'>
                        <div class='row p-2'>
                          <div class='col-lg-4 mb-2'>
                            <p style='padding-top:10px;'>Penerima</p>
                          </div>
                          <div class='col-lg-6 mb-2'>

                            <input type='hidden' name='penerima' value='".$dataPermintaan[KODE_CABANG]."'> <!-- idCabang -->

                            <input type='text' class='form-control' value='".$model_cabang->NAMA_CABANG."' name='zzzxxx' readonly='on'>  <!-- nama cabang -->

                          </div>
                          <div class='col-lg-2'></div>

                          <div class='col-lg-4 mb-2'>
                            <p style='padding-top:10px;'>Lokasi</p>
                          </div>
                          <div class='col-lg-6'>
                            <input class='form-control' readonly='on' type='text' name='lokasi' value='".$model_cabang->ALAMAT_CABANG.", ".$kota_cabang."' >
                          </div>
                          <div class='col-lg-2'></div>

                          <div class='col-lg-4'>
                            <p style='padding-top:10px;'>Nomor Kendaraan</p>
                          </div>
                          <div class='col-lg-6'>
                            <input class='form-control' type='text' name='nopol' required >
                          </div>
                          <div class='col-lg-2'></div>
                        </div>
                      </div>

                      <div class='col-lg-12 p-2'> 
                        <p for='keteranganPengiriman'>Keterangan Pengiriman</p>
                        <textarea class='form-control' name='keterangan' id='keteranganPengiriman' rows='3'></textarea>
                        <hr>
                        <hr style='height:3px;background:cyan'><br>

                        <h4>Daftar Barang</h4>
                        <table class='table table-bordered table-hover mb-4'>
                          <thead>
                            <tr>
                              <td>Kode Barang</td>
                              <td>Nama Barang</td>
                              <td>Jumlah Permintaan</td>
                              <td>Jumlah Dikirim</td>
                            </tr>
                          </thead>
                          <tbody>";
                            $numor=1;
                            foreach ($dataDetail as $detail) {
                              $produk = $this->model_app->view_where('produk',array('ID_PRODUK' => $detail[ID_PRODUK]))->row_array();
                              echo "
                                  <tr>
                                    <td>$detail[ID_PRODUK]</td>
                                    <td>$produk[NAMA_PRODUK]</td>
                                    <td>$detail[JUMLAH_REQ]</td>
                                    <td>
                                      <input type='hidden' value='".$detail[ID_PERMINTAAN]."' name='addmore[".$numor."][id_permintaan]' />
                                      <input type='hidden' name='addmore[".$numor."][id_produk]' value='".$detail[ID_PRODUK]."' />
                                      <input type='hidden' name='addmore[".$numor."][jumlah]' value='".$detail[APPROVED_JUMLAH_REQ]."' />
                                      $detail[APPROVED_JUMLAH_REQ]
                                    </td>
                                  </tr>
                              ";$numor++;
                            }
                   echo " </tbody>
                        </table>
                      </div>

                  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' id='simpan' name='submit' class='btn btn-info'>Simpan</button>

                    <a href='".base_url().$this->uri->segment(1)."'/pengiriman><button type='button' class='btn btn-warning pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();
            ?>
