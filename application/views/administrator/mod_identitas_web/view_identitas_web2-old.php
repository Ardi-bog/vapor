<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Identitas Website Nicotine</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/identitaswebsiteNicotine',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$record[ID_IDENTITAS]'>
                    <tr><th width='120px' scope='row'>Nama Website</th>   <td><input type='text' class='form-control' name='a' readonly='on' value='$record[NAMA_WEBSITE]'></td></tr>
                    <tr><th scope='row'>Email Admin</th>                        <td><input type='email' class='form-control' name='b' value='$record[EMAIL_ADMIN]'></td></tr>
                    <tr><th scope='row'></th><td></td></tr>  
                    <tr><th scope='row'>Sosial Network</th><td></td></tr>
                    <tr><th scope='row' style='padding-left:20px;'>Facebook</th>
                      <td><input type='url' class='form-control' name='c' value='$record[FACEBOOK]'></td></tr>
                    <tr><th scope='row' style='padding-left:20px;'>Instagram</th>
                      <td><input type='text' class='form-control' name='d' value='$record[INSTAGRAM]'></td></tr>
                    <tr><th scope='row' style='padding-left:20px;'>Twitter</th>
                      <td><input type='text' class='form-control' name='e' value='$record[TWITTER]'></td></tr>
                    <tr><th scope='row' style='padding-left:20px;'>Youtube</th>
                      <td><input type='text' class='form-control' name='f' value='$record[YOUTUBE]'></td></tr>   
                    <tr><th scope='row' style='padding-left:20px;'>Nomor Whatsapp</th>
                      <td><input type='text' class='form-control' name='g' value='$record[NO_WA]'></td></tr>  
                     <tr><th scope='row'></th><td></td></tr>          
                    <tr><th scope='row'>Deskripsi Website</th>                 <td><input type='text' class='form-control' name='h' value='$record[DESKRIPSI]'></td></tr>
                    <tr><th scope='row'>Google Maps Location</th>                  <td><textarea class='form-control' name='i' style='height:80px'>$record[MAPS]</textarea></td></tr>
                  </tbody>
                  </table>
                </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info' id='updateidentitasweb'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/identitaswebsiteNicotine'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();
