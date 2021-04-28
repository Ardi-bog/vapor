<?php 
    $idkotam = $this->db->query("SELECT * FROM rb_kota")->row_array();
    $identitas = $this->db->query("SELECT * FROM identitas_web")->result_array();
    echo "<div class='col-md-12'>
              <div class='box box-default'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Info Menu</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/tambah_info_toko_nicotine',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th scope='row'>Nama Toko</th>             <td><input type='text' class='form-control' name='nama' required></td></tr>
                    <tr><th scope='row'>Wilayah</th>              
                      <td>
                          <select id='cariKota' name='idkota' style='width: 100%;' required>
                            <option value=''>-- Pilih Kota --</option>
                          </select>
                      </td>
                    </tr>
                    <tr><th scope='row'>Status Toko</th>              
                      <td>"; 
                                        echo "<select class='form-control' name='status_toko' required>
                                            <option value=''>--Pilih Status Toko--</option>";
                                            foreach ($identitas as $rows) {
                                                echo "<option value='$rows[NAMA_WEBSITE]'>$rows[NAMA_WEBSITE]</option>";
                                            }
              echo "</select></td></tr>
                  <tr><th scope='row'>Status</th>
                      <td>
                        <input type='radio' name='statusnya' value='0'> Tidak Aktif &nbsp;
                        <input type='radio' name='statusnya' value='1' checked> Aktif
                      </td>
                  </tr>
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url().$this->uri->segment(1)."/info_toko_nicotine'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();