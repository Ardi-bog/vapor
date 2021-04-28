
                <!-- Data list view starts -->
                    <button class="btn btn-success btn-outline-primary btn-md" data-toggle='modal' data-target='#myModalcreate'><i class="feather icon-plus"></i> Tambahkan Data</button><br>

                    <!-- DataTable starts -->
                    <div class="table-responsive mt-1">
                      <?php echo $this->session->flashdata('pesan'); ?>
                        <table class="table table-bordered table-hover text-center data-thumb-view">
                            <thead class="thead-light">
                                <tr>
                                  <th></th>
                                  <th style='width:20px'>No</th>
                                  <th>ID</th>
                                  <th>Nama Jenis menu</th>
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
                                          <td>$row[ID_JENIS_MENU]</td>
                                          <td>$row[JENIS_MENU]</td>
                                          <td class='product-action d-print-none'>
                                              <a class='btn btn-sm btn-warning' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[ID_JENIS_MENU]."'>
                                                <i class='feather icon-edit font-medium-1'></i></a>
                                              ";

                                            if ($this->session->level == 'super-admin') {
                                                echo "
                                                <a class='btn btn-sm btn-danger' title='Hapus Data' data-toggle='modal' data-target='#myModaldelete".$row[ID_JENIS_MENU]."'>
                                                <i class='feather icon-trash font-medium-1'></i></a>";
                                            }
                                            echo "
                                          </center></td>
                                      </tr>

                                        <!-- Modal Edit -->
                                        <div class='modal fade' id='myModaledit".$row[ID_JENIS_MENU]."'>
                                          <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            
                                              <!-- Modal Header -->
                                              <div class='modal-header'>
                                                <h4 class='modal-title'>Edit data Jenis Menu</h4>
                                                
                                              </div>
                                              
                                              <!-- Modal body -->
                                              <div class='modal-body'>
                                            <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/jenismenu'). "'>
                                                  <div class='form-group'>
                                                      <label for='b' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Jenis Menu</label>
                                                      <div>
                                                          <input type='hidden' name='a' value='".$row[ID_JENIS_MENU]."'>
                                                          <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='b' value='".$row[JENIS_MENU]."' required>
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
                                        <div class='modal fade' id='myModaldelete".$row[ID_JENIS_MENU]."'>
                                          <div class='modal-dialog'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>DELETE</h5>
                                                
                                              </div>
                                              <div class='modal-body'> Apakah anda yakin ingin menghapus data ini ? </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                                                <a href='".base_url().$this->uri->segment(1)."/delete_jenismenu/$row[ID_JENIS_MENU]' id='delete' class='btn btn-primary'>Hapus</a> </div>
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
  <div class='modal-dialog'>
    <div class='modal-content'>
    
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'>Tambah data Jenis Menu</h4>
        
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('administrator/jenismenu') ?>'>
          <div class='form-group'>
              <label for='b' style="margin-left: 20px;margin-bottom: 10px;" class='control-label'>Jenis Menu</label>
              <div>
                  <input type='text' style="margin-left: 20px;width: 90%;" class='form-control' placeholder="Masukkan Nama dari jenis menu" name='b' required>
              </div>
          </div>
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