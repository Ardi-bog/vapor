<?php 
    $idkota=$row[ID_KOTA];
    $idkotam = $this->db->query("SELECT * FROM rb_kota where ID_KOTA=$idkota")->row_array();

    $identitas = $this->db->query("SELECT * FROM identitas_web")->result_array();
    $idIdentitas=$row[STATUS_TOKO];
    $modelidentitas = $this->db->query("SELECT * FROM identitas_web where NAMA_WEBSITE='".$idIdentitas."'")->row_array();
    echo "<div class='col-md-12'>
              <div class='box box-default'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Info Menu</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/edit_info_toko_nicotine',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[ID_TOKO]'>
                    <tr><th scope='row'>Nama Toko</th>             <td><input type='text' class='form-control' name='nama' required value='$row[NAMA_TOKO]'></td></tr>
                    <tr><th scope='row'>Wilayah</th>              
                      <td>
                          <select id='cariKota' name='idkota' style='width: 100%;' required>
                            <option value='$idkotam[ID_KOTA]'>$idkotam[NAMA_KOTA]</option>
                          </select>
                      </td>
                    </tr>
                    <tr><th scope='row'>Status Toko</th>              
                      <td>"; 
                                        echo "<select class='form-control' name='status_toko' required>
                                            <option value='$modelidentitas[NAMA_WEBSITE]'>$modelidentitas[NAMA_WEBSITE]</option>";
                                            foreach ($identitas as $rows) {
                                                echo "<option value='$rows[NAMA_WEBSITE]'>$rows[NAMA_WEBSITE]</option>";
                                            }
              echo "</select></td></tr>
                    <tr><th scope='row'>Status</th>";
                      if ($row[STATUSNYA] == 0) {
                        echo "
                            <td>
                              <input type='radio' name='statusnya' value='0' checked> Tidak Aktif &nbsp;
                              <input type='radio' name='statusnya' value='1'> Aktif
                            </td>
                        ";
                      }else{
                        echo "
                            <td>
                              <input type='radio' name='statusnya' value='0'> Tidak Aktif &nbsp;
                              <input type='radio' name='statusnya' value='1' checked> Aktif
                            </td>
                        "; 
                      }
              echo "</tr>
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/info_toko_nicotine'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();