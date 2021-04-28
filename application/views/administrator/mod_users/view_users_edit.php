<?php 

    $idkota=$data1[ID_KOTA];
    $idkotam = $this->db->query("SELECT * FROM rb_kota where ID_KOTA=$idkota")->row_array();
    echo "<div class='col-md-12'>
              <div class='box box-default'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data $data1[LEVEL_USERS]</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/edit_manajemenuser',$attributes); 
              if ($data1['FOTO']==''){ $foto = 'blank.png'; }else{ $foto = $data1['FOTO']; }
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id1' value='$data1[USERNAME]'>
                    <input type='hidden' name='id2' value='$data1[ID_USERNYA]'>
                    <tr bgcolor='#e3e3e3'>
                      <th rowspan='16' width='110px'><center><img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto' class='img-circle img-thumbnail'></center>
                      </th>
                    </tr>
                    <tr>
                      <th width='120px' scope='row'>Username</th>   
                      <td>
                        <input type='text' class='form-control' name='a' value='$data1[USERNAME]' readonly='on'>
                        </td>
                    </tr>
                    <tr>
                      <th scope='row'>Password</th>                 
                      <td>
                        <input placeholder='isi data ini untuk mengganti password' class='form-control' type='password' name='b'>
                        </td>
                    </tr>
                    <tr>
                      <th width='120px' scope='row'>Nama User</th>   
                      <td>
                        <input type='text' class='form-control' name='nama' required value='$data1[NAMA_USER]'>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'>Alamat Email</th>             
                      <td>
                        <input type='email' class='form-control' name='email' required value='$data2[EMAIL]'>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'>No HP</th>               
                      <td>
                        <input type='number' class='form-control' name='no_hp' required value='$data2[NO_HP]'>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'>Jenis Kelamin</th>";
                      if ($data2[JENIS_KELAMIN] == 'Perempuan') {
                        echo "<td>
                                <input type='radio' name='jk' value='Laki-laki'> Laki-laki &nbsp;
                                <input type='radio' name='jk' value='Perempuan' checked> Perempuan
                              </td>";
                      }else{
                        echo "<td>
                                <input type='radio' name='jk' value='Laki-laki'checked> Laki-laki &nbsp;
                                <input type='radio' name='jk' value='Perempuan' > Perempuan
                              </td>";
                      }        
                    echo "
                    </tr>
                    <tr>
                      <th scope='row'>Alamat Lengkap</th>               
                      <td>
                        <textarea rows='4' cols='50' name='alamat' required>$data2[ALAMAT_LENGKAP]</textarea>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'>Kecamatan</th>             
                      <td>
                        <input type='text' class='form-control' name='kecamatan' required value='$data2[KECAMATAN]'>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'>Ganti Foto</th>                     
                      <td>
                        <p style='font-style: italic;'>max size file upload : 1 mb</p>
                        <input type='file' class='form-control' name='f'><hr style='margin:5px'>";

                          if ($data1['FOTO'] != ''){ 
                            echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_user/$data1[FOTO]'>$data1[FOTO]</a>"; 
                          }
                          else{
                            echo "<i style='color:red'>Foto Saat ini : -</i>";
                          } 
                    echo "</td></tr></td></tr>";

                    if ($this->session->level == 'super-admin'){
                        if ($data1[LEVEL_USERS] != 'super-admin') {
                          echo "
                          <tr><th width='120px' scope='row'>Level</th>   <td><input type='text' class='form-control' name='level' value='$data1[LEVEL_USERS]'></td></tr>";
                          if ($data1[STATUS_AKUN] == 1 ) {
                            echo "<tr><th scope='row'>Status Akun</th>                   
                            <td><input type='radio' name='status-akun' value='0'> Tidak Aktif &nbsp;
                            <input type='radio' name='status-akun' value='1' checked> Aktif</td></tr>";
                          }else{
                            echo "<tr><th scope='row'>Status Akun</th>                   
                            <td><input type='radio' name='status-akun' value='0' checked> Tidak Aktif &nbsp;
                            <input type='radio' name='status-akun' value='1'> Aktif</td></tr>";
                          }
                          echo "
                          <tr><th scope='row'>Wilayah</th>              
                            <td>
                                <select id='cariKota' name='idkota' style='width: 100%;'>
                                  <option value='$idkotam[ID_KOTA]'>$idkotam[NAMA_KOTA]</option>
                                </select>
                            </td>
                          </tr>
                          <tr><th scope='row'>Tanggal Masuk</th>             
                            <td><input class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='$data2[TANGGAL_MASUK]' >
                            </td></tr>
                          ";
                        }else{
                          echo "
                            <input type='hidden' name='level' value='$data1[LEVEL_USERS]'>
                            <input type='hidden' name='idkota' value=999>
                            <input type='hidden' name='status-akun' value='$data1[STATUS_AKUN]'>
                          ";
                        }                 
                                        
                    }else{
                      echo "
                            <tr><th width='120px' scope='row'>Level</th>   <td><input type='text' class='form-control' name='level' value='$data1[level]' readonly='on'></td></tr>
                            <tr><th width='120px' scope='row'>Wilayah</th>   <td><input type='text' class='form-control' name='x' value='$idkotam[NAMA_KOTA]' readonly='on'></td></tr>
                            <input type='hidden' name='idkota' value='$data1[ID_KOTA]'>
                            <input type='hidden' name='status-akun' value='$data1[STATUS_AKUN]'>
                          ";
                    }
                  echo "</tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/manajemenuser'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();