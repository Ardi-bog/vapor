<?php 
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/identitaswebsiteNicotine',$attributes); 
              echo $this->session->flashdata('pesan');
          echo "
                  <table class='table table-condensed table-borderless'>
                  <tbody>
                    <input type='hidden' name='id' value='$record[ID_IDENTITAS]'>
                    <tr><th width='120px' scope='row'>Nama Website</th>   <td colspan='3'><input type='text' class='form-control' name='a' readonly='on' value='$record[NAMA_WEBSITE]'></td></tr>
                    <tr>
                      <th scope='row'>Email Admin</th>                        
                      <td><input type='email' class='form-control' name='b' value='$record[EMAIL_ADMIN]'>
                      </td>

                      <th scope='row' style='padding-left:20px;text-align:right;'>Nomor Whatsapp</th>
                      <td><input type='text' class='form-control' name='g' value='$record[NO_WA]'></td>
                    </tr>

                    <tr><th scope='row'></th><td></td></tr>  
                    <tr><th scope='row'>Sosial Network</th><td></td></tr>

                    <tr>
                      <th scope='row' style='padding-left:20px;'>Facebook</th>
                      <td>
                        <div class='input-group mb-75'>
                          <div class='input-group-prepend'>
                              <span class='input-group-text feather icon-facebook' id='basic-addon4'></span>
                          </div>
                          <input type='text' class='form-control' name='c' value='$record[FACEBOOK]' placeholder='https://www.facebook.com/' aria-describedby='basic-addon4'>
                        </div>
                      </td>

                      <th scope='row' style='padding-left:20px;text-align:right;'>Youtube</th>
                      <td>
                        <div class='input-group mb-75'>
                          <div class='input-group-prepend'>
                              <span class='input-group-text feather icon-youtube' id='basic-addon6'></span>
                          </div>
                          <input type='text' class='form-control' name='f' value='$record[YOUTUBE]' placeholder='https://www.youtube.com/' aria-describedby='basic-addon6'>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row' style='padding-left:20px;'>Instagram</th>
                      <td>
                        <div class='input-group mb-75'>
                          <div class='input-group-prepend'>
                              <span class='input-group-text feather icon-instagram' id='basic-addon5'></span>
                          </div>
                          <input type='text' class='form-control' name='d' value='$record[INSTAGRAM]' placeholder='https://www.instagram.com/' aria-describedby='basic-addon5'>
                        </div>
                      </td>

                      <th scope='row' style='padding-left:20px;text-align:right;'>Twitter</th>
                      <td>
                        <div class='input-group mb-75'>
                          <div class='input-group-prepend'>
                              <span class='input-group-text feather icon-twitter' id='basic-addon3'></span>
                          </div>
                          <input type='text' class='form-control' name='e' value='$record[TWITTER]' placeholder='https://www.twitter.com/' aria-describedby='basic-addon3'>
                        </div>
                     </td>
                    </tr>

                     <tr><th scope='row'></th><td></td></tr>          
                    <tr><th scope='row'>Deskripsi Website</th>                 <td colspan='3'><input type='text' class='form-control' name='h' value='$record[DESKRIPSI]'></td></tr>
                    <tr><th scope='row'>Google Maps Location</th>                  <td colspan='3'><textarea class='form-control' name='i' style='height:80px'>$record[MAPS]</textarea></td></tr>
                  </tbody>
                  </table>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info' id='updateidentitasweb'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/identitaswebsiteNicotine'><button type='button' class='btn btn-warning pull-right'>Cancel</button></a>
                    
                  </div>
            ";
            echo form_close();
