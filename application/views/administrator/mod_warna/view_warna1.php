<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Warna Website </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/warna',$attributes); 
                error_reporting(0);
                
          echo "<div class='col-md-12'>";
                 echo $this->session->flashdata('pesan');
                echo " <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><td width=120px><h5>Nama Website</h5></td><td><h4>Vaporhitz</h4></td></tr>
                      ";
                      $no=0;
                      foreach ($rows as $bg) {  $no++;                    
                echo "
                      <input type='hidden' name='id' value='$bg[ID_BACKGROUND]'>
                      <tr>
                        <td>";
                          echo $no;
                        echo "</td>
                        <td>
                          <input type='text' class='form-control' name='a' value='$bg[NAMA_BACKGROUND]' readonly='on'>
                        </td>
                        <td>
                          <input id='colorChange$no' onchange='changeColor$no()' type='text' class='form-control' name='b$no' value='$bg[KODE_WARNA]' required>
                        </td>
                        <td id='abc$no'bgcolor='$bg[KODE_WARNA]'>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                      </tr>";
                      }
              echo "
                  </tbody>
                  </table>
                </div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url().$this->uri->segment(1)."/background'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();
