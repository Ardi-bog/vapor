
                <!-- Data list view starts -->
                    <a id="modalCreate" class="btn btn-success btn-outline-primary btn-md" data-toggle='modal' data-target='#myModalcreate'><i class="feather icon-plus"></i> Tambahkan Data</a><br>

                    <?php echo $this->db->query("SELECT * FROM promo where JUDUL_PROMO LIKE'%coba 3%'")->row()->ID_PROMO; ?>

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-4">
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th style='width:20px'>No</th>
                                    <th>Judul Promo</th>
                                    <th>Deskripsi Promo</th>
                                    <th>Url</th>
                                    <th>Tgl Posting</th>
                                    <th style='width:70px'>Gambar</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelid">
                                <?php 
                                $no = 1;
                                foreach ($record as $row){
                                if ($row['GAMBAR'] == ''){ $foto =''; }else{ $foto = $row['GAMBAR']; }
                                $jenis= $this->db->query("SELECT * FROM jenis_menu where ID_JENIS_MENU='$row[JENIS_MENU]'")->row_array();
                                echo "<tr><td></td>
                                          <td>$no</td>
                                          <td>$row[JUDUL_PROMO]</td>
                                          <td>$row[DESKRIPSI]</td>
                                          <td>$row[URL]</td>
                                          <td>$row[TGL_POSTING]</td>
                                          <td><img style='border:1px solid #cecece' width='70px' src='".base_url()."asset/foto_promo/$foto'></td>
                                          <td class='product-action d-print-none'>
                                              <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[ID_PROMO]."'>
                                                <i class='feather icon-edit font-medium-1'></i></a>
                                              ";

                                            if ($this->session->level == 'super-admin') {
                                                echo "
                                                <a class='btn btn-sm btn-danger' title='Hapus Data' data-toggle='modal' data-target='#myModaldelete".$row[ID_PROMO]."'>
                                                <i class='feather icon-trash font-medium-1'></i></a>";
                                            }
                                            echo "
                                          </center></td>
                                      </tr>

                                      <!-- Modal Update BEGIN -->
                                      <div class='modal fade' id='myModaledit".$row[ID_PROMO]."'>
                                          <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Edit data Promo</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' enctype='multipart/form-data' role='form' method='POST' action='".base_url('administrator/promo_menu'). "'>

                                                  <div class='form-group'>
                                                      <label for='nama' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Judul Promo</label>
                                                      <div>
                                                          <input type='hidden' name='id' value='$row[ID_PROMO]'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='nama' required value='".$row[JUDUL_PROMO]."'>
                                                      </div><br>

                                                     <label for='deskripsi' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Deskripsi dari Promo</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='deskripsi' required value='".$row[DESKRIPSI]."'>
                                                      </div><br>

                                                      <label for='url' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>url</label>
                                                      <div>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='url' required value='".$row[URL]."'>
                                                      </div><br>


                                                      <label for='url' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>tanggal posting</label>
                                                      <div>
                                                          <input style='margin-left: 20px;width: 90%;' class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='$row[TGL_POSTING]' >
                                                      </div><br>

                                                      <label for='f' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Upload Gambar Produk</label>
                                                      <div style='margin-left: 20px;width: 90%;'>
                                                          <p style='font-style: italic;font-size:12px;'>max size file upload : 300 kb</p> 
                                                          <input type='file' class='form-control' name='f'>";
                                                          if ($row['GAMBAR'] != ''){ 
                                                            echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_produk/$row[GAMBAR]'>$row[GAMBAR]</a>"; 
                                                          }
                                                          else{
                                                            echo "<i style='color:red'>Foto Saat ini : -</i>";
                                                          } 
                                                    echo "
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
                                      <div class='modal fade' id='myModaldelete".$row[ID_PROMO]."'>
                                        <div class='modal-dialog'>
                                          <div class='modal-content'>
                                            <div class='modal-header'>
                                              <h5 class='modal-title' id='exampleModalLabel'>DELETE</h5>
                                              
                                            </div>
                                            <div class='modal-body'> Apakah anda yakin ingin menghapus data ini ? </div>
                                            <div class='modal-footer'>
                                              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                              <a href='".base_url().$this->uri->segment(1)."/delete_promo/$row[ID_PROMO]' id='delete' class='btn btn-primary'>Hapus</a> </div>
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
        <h4 class='modal-title'>Tambah data Menu</h4>
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' enctype='multipart/form-data' role='form' method='POST' action='<?=base_url('administrator/promo_menu') ?>'>
          <?php 
            echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th scope='row'>Judul Promo</th>             <td><input type='text' class='form-control' name='nama' required></td></tr>
                  <tr><th scope='row'>Deskripsi dari Promo</th>             <td><input type='text' class='form-control' name='deskripsi' required></td></tr>
                  <tr><th scope='row'>Url</th>             <td><input type='text' class='form-control' name='url'></td></tr>
                  <tr><th scope='row'>Tanggal Posting</th>             <td><input class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='";echo date('Y-m-d')."' ></td></tr>
                  <tr><th scope='row'>Upload Gambar</th>              <td><p style='font-style: italic;'>max size file upload : 300 kb</p> <input type='file' class='form-control' name='f'></td></tr>
                  </tbody>
                  </table></div>
                  ";
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