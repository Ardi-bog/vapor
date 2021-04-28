            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Ganti Logo Website</h3>
                </div><!-- /.box-header -->
                <?php echo $this->session->flashdata('pesan'); ?>
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped">
                    <tbody>
                      <tr><td width=120px>Nama Website</td><td><h4>Nicotine</h4></td></tr>
                  <?php 
                    $attributes = array('class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart($this->uri->segment(1).'/logowebsiteNicotine',$attributes); 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<input type='hidden' name='id' value='$row[ID_LOGO]'>
                          <tr><td width=120px>Logo Terpasang</td><td><a href=''><img width='100%' src='".base_url()."asset/logo/$row[GAMBAR]'></a></td></tr>
                          <tr><td>Ganti Logo</td><td><p style='font-style: italic;'>max size file upload : 300 kb</p><a href=''><input type='file' name='f' class='form-control' required></td></tr>";
                      $no++;
                    }
                    echo "<tr><td></td><td><div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Update</button>
                            <a href='".base_url().$this->uri->segment(1)."/logowebsite'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                          </div></td></tr>";
                    echo form_close();
                  ?>
                  </tbody>
                </table>
              </div>