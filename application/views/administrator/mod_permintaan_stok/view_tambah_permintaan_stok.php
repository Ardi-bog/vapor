<?php 

    $date = date('Y-m-d');
    
    $maxid = $this->db->query("SELECT MAX(KODE_PERMINTAAN) as maxid FROM permintaan WHERE TGL_PERMINTAAN ='".$date."'")->row()->maxid;

    if ($maxid == '') {
      $maxid = 0;
    }

    $date2=date('Ymd');

    $no_urut = substr($maxid, -5);
    $new_urut = $no_urut + 1;
    $no_req = 'REQ'. $date2 . sprintf("%04s", $new_urut);

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Permintaan Stok </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart($this->uri->segment(1).'/tambah_permintaan_stok',$attributes); 

                error_reporting(0);

                 echo $this->session->flashdata('pesan');
                echo " 
                  <div class='row'>
                      <div class='col-lg-6'>
                          <hr style='height:3px;background:green'>
                          <div class='row p-2'>
                            <div class='col-lg-3 mb-2'>
                              <p style='padding-top:10px;'>Kode Reg</p>
                            </div>
                            <div class='col-lg-9 mb-2'>
                              <input type='text' class='form-control' readonly='on' value='".$no_req."' name='kode'>
                            </div>
                            <div class='col-lg-3 mb-2'>
                              <p style='padding-top:10px;'>Pilih Produk</p>
                            </div>
                            <div class='col-lg-9 mb-2'>"; 
                            echo "<select class='form-control' name='produk' id='cariIdprodukl'>
                                <option value=''>--Pilih Produk--</option>";
                                foreach ($dataProduk as $p) {
                                    echo "<option value='$p[ID_PRODUK]'>$p[NAMA_PRODUK]</option>";
                                }
                            echo "</select>
                            </div>
                          </div>
                      </div>
                      <div class='col-lg-6'>
                        <hr style='height:3px;background:red'>
                        <div class='row p-2'>
                          <div class='col-lg-3 mb-2'>
                            <p style='padding-top:10px;'>Cabang</p>
                          </div>
                          <div class='col-lg-6 mb-2'>";

                            echo "<select class='custom-select' name='cabang' required>
                                <option value='' >--Pilih Cabang--</option>";
                                foreach ($dataCabang as $c) {
                                    echo "<option value='$c[KODE_CABANG]'>$c[NAMA_CABANG]</option>";
                                }
                            echo "</select>

                          </div>
                          <div class='col-lg-3'></div>

                          <div class='col-lg-3'>
                            <p style='padding-top:10px;'>Tanggal</p>
                          </div>
                          <div class='col-lg-6'>
                            <input class='form-control' readonly='on' data-date-format='yyyy-mm-dd' type='text' name='tanggal' value='".$date."' >
                          </div>
                          <div class='col-lg-3'></div>
                        </div>
                      </div>


                      <div class='col-lg-12'>
                        <hr>
                        <hr style='height:3px;background:cyan'><br>

                        <table class='table table-borderless mb-4'>
                          <tbody id='itemstorebody'>

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <h4 style='margin-top:-50px;'>Daftar Barang</h4>
                  <table class='table table-bordered table-hover mb-4'>
                    <thead>
                      <tr>
                        <td>Kode Barang</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Request</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody id='dynamic_field'>

                    </tbody>
                  </table>
              </div>
              <div class='box-footer'>
                    <button type='submit' id='simpan' name='submit' class='btn btn-info'>Simpan</button>

                    <a href='".base_url().$this->uri->segment(1)."'/tambah_permintaan_stok><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();
            ?>

<script type="text/javascript">
  var i=0;

  $('#cariIdprodukl').change(function(){
    var produkId = $(this).val();
    $.ajax({
      type:"POST",
      url:"<?php echo site_url('administrator/findProduk'); ?>",
      data:"produk_id="+produkId,
      success: function(response){
        $('#itemstorebody').html(response);

        
        add();
      }
    });
  });
  

  function add() {
    i++;  
    var id =$("#iniIDProduk").val();
    var nama =$("#iniNamaProduk").val();
    var sisa =parseInt($("#iniSisaProduk").val());

    if (id == '' || id == null) {
    alert('Mohon Memilih produk Terlebih Dahulu');
    }
    else{
      var cek = sisa-1;
      if (cek <0) {
        alert('Maaf Sisa stok di Pusat Belum memenuhi Permintaan');
      }else{  
        var check =parseInt($('#col'+id+'').val());
        if (id != check) {      
          $('#dynamic_field').append(
          "<tr id='row"+id+"' class='dynamic-added'> <td> <input type='text' id='col"+id+"' name='addmore["+id+"][id]' class='form-control' readonly='on' value='"+id+"' /> </td> <td> <input type='text' name='addmore["+id+"][name]' class='form-control' readonly='on' value='"+nama+"' /> </td> <td> <input type='text' id='jumlah"+id+"' name='addmore["+id+"][jumlah]' class='form-control' value='1' /> </td> <td> <button type='button' name='remove' id='"+id+"' class='btn btn-danger btn_remove'>X</button></td></tr>"
          );
          $('#itemstore').remove();
        }else{
          var jumlahSebelum = parseInt($('#jumlah'+id+'').val());
          var total= 1+jumlahSebelum;
          
          $('#row'+id+'').remove();

          $('#dynamic_field').append(
          "<tr id='row"+id+"' class='dynamic-added'> <td> <input type='text' id='col"+id+"' name='addmore["+id+"][id]' class='form-control' readonly='on' value='"+id+"' /> </td> <td> <input type='text' name='addmore["+id+"][name]' class='form-control' readonly='on' value='"+nama+"' /> </td> <td> <input type='text' id='jumlah"+id+"' name='addmore["+id+"][jumlah]' class='form-control' value='"+total+"' /> </td> <td> <button type='button' name='remove' id='"+id+"' class='btn btn-danger btn_remove'>X</button></td></tr>"
          );

          $('#itemstore').remove();
        }
      }
    }  
  }


  $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
  }); 

  $('#simpan').click(function(){ 
    if (i == 0) {
      alert('Mohon memilih produk dan menambahkan daftar permintaan terlebih dahulu !!');
      event.preventDefault();
    }

  });

</script>
