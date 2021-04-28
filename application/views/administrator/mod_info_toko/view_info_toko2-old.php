            <div class="col-xs-12">  
              <div class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">Info Toko Nicotine</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambah_info_toko_nicotine'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php echo $this->session->flashdata('pesan'); ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>ID Toko</th>
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

                    if ($row[STATUSNYA] == 0) {
                      $statusnya='<span style="padding:5px;" class="bg-red">Tidak Aktif<span>';
                    }else{
                      $statusnya='<span style="padding:5px;" class="bg-green">Aktif<span>';
                    }
                    echo "<tr><td>$no</td>
                              <td>$row[ID_TOKO]</td>
                              <td>$row[NAMA_TOKO]</td>
                              <td>$idkotam[NAMA_KOTA]</td>
                              <td>$row[STATUS_TOKO]</td>
                              <td>$statusnya</td>
                              <td><center>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url().$this->uri->segment(1)."/edit_info_toko_nicotine/$row[ID_TOKO]'><span class='glyphicon glyphicon-edit'></span></a>";

                                if ($this->session->level == 'super-admin') {
                                    echo "
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url().$this->uri->segment(1)."/delete_info_toko_nicotine/$row[ID_TOKO]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
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