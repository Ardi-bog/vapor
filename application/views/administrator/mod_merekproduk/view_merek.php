            <div class="col-xs-12">  
              <div class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">Merek Produk</h3>
                  <a class="pull-right btn btn-default btn-sm" data-toggle='modal' data-target='#myModalcreate'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php echo $this->session->flashdata('pesan'); ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>ID Merek</th>
                        <th>Nama Merek</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[ID_MEREK]</td>
                              <td>$row[NAMA_MEREK]</td>
                              <td><center>
                                <a class='btn btn-warning btn-xs' title='Edit Data' data-toggle='modal' data-target='#myModaledit".$row[ID_MEREK]."'><span class='glyphicon glyphicon-edit'></span></a>
                                ";

                                if ($this->session->level == 'super-admin') {
                                    echo "
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url().$this->uri->segment(1)."/delete_merekproduk/$row[ID_MEREK]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
                                }
                                echo "
                              </center></td>
                              
                              <!-- The Modal -->
                                <div class='modal fade' id='myModaledit".$row[ID_MEREK]."'>
                                  <div class='modal-dialog'>
                                    <div class='modal-content'>
                                    
                                      <!-- Modal Header -->
                                      <div class='modal-header'>
                                        <h4 class='modal-title'>Edit data Merek</h4>
                                        <button style='margin-top:-20px;' type='button' class='close' data-dismiss='modal'><i class='btn btn-danger btn-xs'>&times;</i></button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class='modal-body'>
                                    <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/merek'). "'>
                                          <div class='form-group'>
                                              <label for='b' style='margin-left: 20px;margin-bottom: 10px;' class='control-label'>Nama Merek</label>
                                              <div>
                                                  <input type='hidden' name='a' value='".$row[ID_MEREK]."'>
                                                  <input type='text' style='margin-left: 20px;width: 90%;' class='form-control' name='b' value='".$row[NAMA_MEREK]."' required>
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <!-- Modal footer -->
                                      <div class='modal-footer'>

                                        <button type='submit' name='edit' class='btn btn-default'>
                                            Simpan
                                        </button>
                                      </div>
                                    </form>
                                      
                                    </div>
                                  </div>
                                </div>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>

<!-- The Modal -->
<div class='modal fade' id='myModalcreate'>
  <div class='modal-dialog'>
    <div class='modal-content'>
    
      <!-- Modal Header -->
      <div class='modal-header'>
        <h4 class='modal-title'>Tambah data Merek</h4>
        <button style='margin-top:-20px;' type='button' class='close' data-dismiss='modal'><i class='btn btn-danger btn-xs'>&times;</i></button>
      </div>
      
      <!-- Modal body -->
      <div class='modal-body'>
    <form class='form-horizontal' role='form' method='POST' action='<?=base_url('administrator/merek') ?>'>
          <div class='form-group'>
              <label for='b' style="margin-left: 20px;margin-bottom: 10px;" class='control-label'>Nama Merek</label>
              <div>
                  <input type='text' style="margin-left: 20px;width: 90%;" class='form-control' name='b' required>
              </div>
          </div>
      </div>
      
      <!-- Modal footer -->
      <div class='modal-footer'>

        <button type='submit' name='tambah' class='btn btn-default'>
            Simpan
        </button>
      </div>
    </form>
      
    </div>
  </div>
</div>