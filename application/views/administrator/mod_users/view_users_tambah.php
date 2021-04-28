<?php 
    echo "<div class='col-md-12'>
              <div class='box box-default'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data User</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/tambah_manajemenuser',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='username' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='password' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Nama Admin</th>             <td><input type='text' class='form-control' name='nama' required></td></tr>
                    <tr><th scope='row'>Alamat Email</th>             <td><input type='email' class='form-control' name='email' required></td></tr>
                    <tr><th scope='row'>No HP</th>               <td><input type='number' class='form-control' name='no_hp' required></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>                   
                            <td><input type='radio' name='jk' value='Laki-laki'> Laki-laki &nbsp;
                            <input type='radio' name='jk' value='Perempuan' checked> Perempuan</td></tr>
                    <tr><th scope='row'>Alamat Lengkap</th>               <td><textarea rows='4' cols='50' name='alamat' placeholder='Alamat Desa, Jalan, dan No Rumah/Kantor anda..' required></textarea></td></tr>
                    <tr><th scope='row'>Kecamatan</th>             <td><input type='text' class='form-control' name='kecamatan' required></td></tr>
                    <tr><th scope='row'>Provinsi</th>              
                      <td>"; 
                                        echo "<select id='state'  class='form-control' name='zzz'>
                                            <option value=''>--Pilih Provinsi--</option>";
                                            foreach ($provinsi as $rows) {
                                                echo "<option value='$rows[ID_PROVINSI]'>$rows[NAMA_PROVINSI]</option>";
                                            }
              echo "</select></td></tr>
                  <tr><th scope='row'>Kota</th>               
                    <td>
                      <select class='form-control' name='kota' id='city' required>
                          <option value=''>--Pilih Provinsi Terlebih Dahulu--</option>
                      </select>
                    </td>
                  </tr>
                  <tr><th scope='row'>Upload Foto</th>              <td><input type='file' class='form-control' name='f'></td></tr>
                    <tr><th scope='row'>Level</th>                   
                      <td><input type='radio' name='level' value='admin' checked> Administrator &nbsp;
                      <input type='radio' name='level' value='admin-wilayah'> Admin Wilayah</td></tr>
                      <tr><th scope='row'>Tanggal Masuk</th>             <td><input class='form-control datepicker'  data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='";echo date('Y-m-d')."' ></td></tr>
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url().$this->uri->segment(1)."/manajemenuser'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();