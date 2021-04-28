            <div class="col-xs-12">  
              <div class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">Menu bar</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/tambah_menubar'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <?php echo $this->session->flashdata('pesan'); ?>
                  
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>ID Menu</th>
                        <th>Nama Menu</th>
                        <th>Jenis Menu</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th style='width:70px'>Gambar</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['GAMBAR'] == ''){ $foto =''; }else{ $foto = $row['GAMBAR']; }
                    $jenis= $this->db->query("SELECT * FROM jenis_menu where ID_JENIS_MENU='$row[JENIS_MENU]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td>$row[ID_MENU]</td>
                              <td>$row[NAMA_MENU]</td>
                              <td>$jenis[JENIS_MENU]</td>
                              <td>$row[DESKRIPSI]</td>
                              <td>$row[HARGA]</td>
                              <td>$row[DISKON]</td>
                              <td><img style='border:1px solid #cecece' width='70px' src='".base_url()."asset/foto_produk/$foto'></td>
                              <td><center>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url().$this->uri->segment(1)."/edit_menubar/$row[ID_MENU]'><span class='glyphicon glyphicon-edit'></span></a>";

                                if ($this->session->level == 'super-admin') {
                                    echo "
                                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url().$this->uri->segment(1)."/delete_menubar/$row[ID_MENU]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
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