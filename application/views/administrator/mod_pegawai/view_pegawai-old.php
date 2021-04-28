
            <div class="col-xs-12">  
              <div class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">Data Pegawai</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambah_pegawai'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php echo $this->session->flashdata('pesan'); ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Foto</th>
                        <th>Wilayah</th>
                        <th>Level</th>
                        <th class='text-center'>Status Akun</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['FOTO'] == ''){ $foto ='blank.png'; }else{ $foto = $row['FOTO']; }
                    $ko = $this->db->query("SELECT * FROM rb_kota where ID_KOTA='$row[ID_KOTA]'")->row_array();
                    if ($ko == null || $ko == '') {
                      $kota='PUSAT';
                    }else{
                      $kota= $ko[NAMA_KOTA];
                    }
                    if ($row[STATUS_AKUN] == 0) {
                      $statusnya='<span style="padding:5px;" class="bg-red">Tidak Aktif<span>';
                    }else{
                      $statusnya='<span style="padding:5px;" class="bg-green">Aktif<span>';
                    }
                    echo "<tr><td>$no</td>
                              <td>$row[USERNAME]</td>
                              <td>$row[NAMA_USER]</td>
                              <td>$row[EMAIL]</td>
                              <td>$row[NO_HP]</td>
                              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='".base_url()."asset/foto_user/$foto'></td>
                              <td>$kota</td>
                              <td>$row[LEVEL_USERS]</td>";

                            if ($this->session->level == 'super-admin') {
                                echo "
                                  <!-- Button to Open the Modal -->
                                  <td class='text-center'>".$statusnya." &nbsp;&nbsp;&nbsp;
                                  <a style='border-radius:50%;' class='btn btn-default btn-xs' data-toggle='modal' data-target='#myModal".$no."'> 
                                    <i class='fa fa-pencil'></i>
                                  </a></td>

                                  <!-- The Modal -->
                                  <div class='modal fade' id='myModal".$no."'>
                                    <div class='modal-dialog'>
                                      <div class='modal-content'>
                                      
                                        <!-- Modal Header -->
                                        <div class='modal-header'>
                                          <h4 class='modal-title'>Ganti Status Akun</h4>
                                          <button style='margin-top:-20px;' type='button' class='close' data-dismiss='modal'><i class='btn btn-danger btn-xs'>&times;</i></button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class='modal-body'>
                                      <form class='form-horizontal' role='form' method='POST' action='".base_url('administrator/ganti_status_pegawai'); echo "'>
                                            <div class='form-group'>
                                                <label for='status_member' class='control-label'>Status Akun</label>
                                                <div>
                                                    <input type='hidden' name='a' value='".$row[USERNAME]."'>";
                                                    if ($row[STATUS_AKUN] == 1 ) {
                                                      echo "<input type='radio' name='status-akun' value='0'> Tidak Aktif &nbsp;
                                                      <input type='radio' name='status-akun' value='1' checked> Aktif";
                                                    }else{
                                                      echo "
                                                      <input type='radio' name='status-akun' value='0' checked> Tidak Aktif &nbsp;
                                                      <input type='radio' name='status-akun' value='1'> Aktif";
                                                    }
                                      echo "
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class='modal-footer'>

                                          <button type='submit' name='submit' class='btn btn-default'>
                                              Simpan
                                          </button>
                                        </div>
                                      </form>
                                        
                                      </div>
                                    </div>
                                  </div>
                                ";
                            }else{
                              echo "<td>$statusnya</td>";
                            }
                        echo "
                              <td><center>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url().$this->uri->segment(1)."/edit_pegawai/$row[USERNAME]'><span class='glyphicon glyphicon-edit'></span></a>";

                                if ($this->session->level == 'super-admin') {
                                  if ($row[STATUS_AKUN] == 0) {
                                    echo "
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url().$this->uri->segment(1)."/delete_pegawai/$row[USERNAME]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
                                  }
                                }
                                echo "
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>