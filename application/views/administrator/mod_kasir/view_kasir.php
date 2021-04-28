<?php 
  
  $date = date('Y-m-d');

  $kd_toko = $this->model_app->view_where('profil_toko',array('STATUS_TOKO' => 'nicotine', ))->row()->KODE_TOKO;

    
  $maxid = $this->db->query("SELECT MAX(NO_FAKTUR_PENJUALAN) as maxid FROM rb_penjualan WHERE TGL_PENJUALAN ='".$date."' AND NO_FAKTUR_PENJUALAN LIKE '". $kd_toko ."%'")->row()->maxid;

  if ($maxid == '') {
    $maxid = 0;
  }

  $date2=date('Ymd');

  $no_urut = substr($maxid, -4);
  $new_urut = $no_urut + 1;
  $no_faktur = $kd_toko . $date2 . sprintf("%04s", $new_urut);

?>
<section id="kasir" onkeydown="f11()">
  <div class="row">
    <div class="col-sm-12">
      <div class="card overflow-hidden">                                
        <div class="card-content">
           <div class="card-body">

                  <?php 
                    $attributes = array('class'=>'form-horizontal','role'=>'form');
                    echo form_open_multipart($this->uri->segment(1).'/kasir',$attributes); 

                    error_reporting(0);
                 ?>
              <div class="row">
                  <div class="col-lg-12 d-flex">
                    <a id="fullscreen" class="ml-auto"><i class="fas fa-expand-alt fa-2x"></i></a>
                    <a id="close" style="display: none;" class="ml-auto"><i class="fas fa-expand-arrows-alt fa-2x"></i></a>
                  </div>
                  <div class="col-lg-12 mt-1">
                    <?php 
                      echo $this->session->flashdata('pesan');
                    ?>
                  </div>
                  
                  <div class="col-lg-8 col-12">
                      <div class="card">                                
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-6 mb-4">
                                        <h5>Nomor Nota Penjualan</h5>
                                          <fieldset>
                                            <div class="input-group">
                                              <div class="input-group-append" id="button-addon11">
                                                <button class="btn btn-primary btn-sm" type="button">
                                                   <i class="fas fa-certificate fa-2x"></i></button>
                                              </div>
                                             <input type="text" class="form-control" aria-describedby="button-addon11" value="<?= $no_faktur ?>" readonly="on">
                                            </div>
                                          </fieldset>
                                      </div>
                                      <div class="col-6 mb-4">
                                        <h5>Nama Pelanggan</h5>
                                          <fieldset>
                                            <div class="input-group">
                                              <div class="input-group-append" id="button-addon9">
                                                <button class="btn btn-primary btn-sm" type="button">
                                                   <i class="fas fa-users fa-2x"></i></button>
                                              </div>
                                             <input type="text" class="form-control" autofocus aria-describedby="button-addon9" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan" required>
                                            </div>
                                          </fieldset>
                                      </div>
                                      <div class="col-6">
                                        <div class="text-bold-600 font-medium-1 d-none d-sm-block">Nomor Meja</div>
                                          <fieldset>
                                              <div class="input-group">
                                                  <div class="input-group-append" id="button-addon2">
                                                      <button class="btn btn-primary d-none d-sm-block" type="button">
                                                      <i class="fa fa-barcode"></i></button>
                                                  </div>
                                                  <input type="text" class="form-control" name="nomor_meja" aria-describedby="button-addon2" placeholder="Masukan Nomor Meja Pelanggan" required> 
                                              </div>
                                          </fieldset> 
                                      </div>
                                      <div class="col-6">                                                
                                        <div class="text-bold-600 font-medium-1 d-none d-sm-block">Cari Menu</div>
                                          <div class="form-group">                                                  
                                              <select style="width: 100%;" id="idMenu" class="custom-select" name='produk'>
                                                  <option value=''>Cari Menu disini</option>
                                                  <?php 
                                                    foreach ($data_menu as $m) {
                                                        echo "<option value='$m[ID_MENU]'>$m[NAMA_MENU]</option>";
                                                    }
                                                  ?>
                                                </select>
                                          </div>
                                      </div>
                                       <div class="col-12 table-responsive-lg">
                                          <table class="table table-middle">
                                             <tbody id="isiMenu">
                                             </tbody> 
                                          </table>

                                          <table class="table table-middle">
                                            <thead> 
                                              <tr>
                                                <th>KODE</th>
                                                <th>MENU</th>
                                                <th>JUMLAH</th>
                                                <th>Disc</th>
                                                <th>HARGA</th>
                                                <th>SUBTOTAL</th>
                                                <th>HAPUS</th> 
                                              </tr>
                                             </thead>
                                             <tbody id="dynamic_field">
                                              
                                             </tbody> 
                                          </table>
                                       </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Kalkulasi</h4>
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="col-12 table-responsive-lg">
                                     <table class="table table-middle">
                                       <tr>
                                         <td>Total</td>
                                         <th><h2 id="iniTotal">0</h2><input type='hidden' id='idTotal' name='total_harga'/></th>
                                       </tr> 
                                       <tr>
                                         <td>Kembalian</td>
                                         <th><h2 id="iniTextKembalian">0</h2><input type='hidden' id='idSisa' name='sisa_harga'/></th>
                                        </tr> 
                                      </table>
                                  </div>
                                  <div class="text-bold-100 font-medium-1 d-none d-sm-block">
                                  <h4>Pembayaran</h4></div>
                                  <fieldset>
                                    <div class="input-group">
                                      <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-primary btn-sm" type="button">
                                           <i class="fa fa-calculator fa-2x"></i></button>
                                      </div>
                                     <input id='iniPembayaran' type="number" class="form-control" aria-describedby="button-addon2" placeholder="Masukan Jumlah Uang">
                                    </div>
                                  </fieldset>        
                              </div>
                          </div>
                          <button class="btn btn-primary btn-lg btn-block mb-4" type="submit" name="submit" id="tombolSimpan"><i class="fa fa-print"></i> Cetak Nota</button>
                      </div>
                  </div>
              </div>                                                
                  <?php 
                    echo form_close();
                  ?>
                
               </div>
             </div>
           </div>
         </div>
       </div>
    </div>
</section>
<!-- Nav Justified Ends -->

<script type="text/javascript">

  var i=0;

  function delay(callback, ms) {
    var timer = 0;
    return function() {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, ms || 0);
    };
  }

  $('#idMenu').change(function(){ 
    var menuID = $(this).val();
    $.ajax({
      type:"POST",
      url:"<?php echo site_url('administrator/findMenu'); ?>",
      data:"menu_id="+menuID,
      success: function(response){
        $('#isiMenu').html(response);

        add();
      }
    })
  });

  $('#inputSearchKasir').keyup(delay(function (e) {
    var menuID = $(this).val();
    $.ajax({
      type:"POST",
      url:"<?php echo site_url('administrator/findMenu'); ?>",
      data:"menu_id="+menuID,
      success: function(response){
        $('#isiMenu').html(response);

        add();
      }
    })
  }, 500));

  var total_harga=0;

  // pembayaran
  $('#iniPembayaran').keyup(delay(function (e) {
    var kembali = $(this).val()-total_harga;

    var text = formatRupiah(""+kembali, 'Rp. ');
    $("#iniTextKembalian").text(""+text+"");
    document.getElementById("idSisa").value = kembali;
  }, 500));

  
  function add() { 
       i++;  
       var id =$("#iniIDmenu").val();
       var nama =$("#iniNamaMenu").val();
       var diskon =parseInt($("#iniDiskonMenu").val());
       var harga =parseInt($("#iniHargaMenu").val());
       
       if (id == '' || id == null) {
        alert('Mohon Memilih produk Terlebih Dahulu');
       }
       else{

          var check =parseInt($('#col'+id+'').val());

          if (id == check) {
            $('#itemstore').remove();
          }else{
             var subTotal = harga *1;
             var text_harga = formatRupiah($("#iniHargaMenu").val(), 'Rp. ');
             var text_sub = formatRupiah(""+subTotal, 'Rp. ');
             total_harga = total_harga +subTotal;

             var text = formatRupiah(""+total_harga, 'Rp. ');
             $("#iniTotal").text(""+text+"");

             document.getElementById("idTotal").value = total_harga;

            $('#dynamic_field').append(
            "<tr id='row"+id+"' class='dynamic-added'> <td> <input type='hidden' id='col"+id+"' name='addmore["+id+"][id]' value='"+id+"' /> "+id+" </td> <td> <input id='nama"+id+"' type='hidden' name='addmore["+id+"][name]' value='"+nama+"' /> "+nama+" </td> <td> <input style='width:40px' type='text' id='jumlah"+id+"' name='addmore["+id+"][jumlah]' class='form-control jumlah' value='1' /> </td> <td> <input type='hidden' id='diskon"+id+"' name='addmore["+id+"][diskon]' value='"+diskon+"' /> "+diskon+"% </td> <td> <input type='hidden' id='harga"+id+"' name='addmore["+id+"][harga]' value='"+harga+"' /> "+text_harga+" </td> <td> <input type='hidden' id='sub"+id+"' name='addmore["+id+"][subtotal]' value='"+subTotal+"' /> "+text_sub+" </td> <td> <a name='remove' id='"+id+"' class='feather icon-trash-2 text-bold-700 text-danger btn_remove'></a></td></tr>"
            );
            $('#itemstore').remove();
          }
          
       }  
  };

  $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");   
       var ini = parseInt($("#sub"+button_id+"").val());
       total_harga = total_harga - ini;
       var text = formatRupiah(""+total_harga, 'Rp. ');
       $("#iniTotal").text(""+text+"");
       document.getElementById("idTotal").value = total_harga;

       $('#row'+button_id+'').remove();
  }); 

  $(document).on('keyup', '.jumlah', delay(function(){ 
       Pace.restart();
       var button_id = $(this).attr("id");   
       var id = button_id.substring(+6);

        var namaSebelum = $('#nama'+id+'').val();
        var diskonSebelum = parseInt($('#diskon'+id+'').val());
        var hargaSebelum = parseInt($('#harga'+id+'').val());
        var newtext_harga = formatRupiah(""+hargaSebelum, 'Rp. ');
       
        var new_jumlah = parseInt($('#jumlah'+id+'').val());

        var subSebelum = parseInt($('#sub'+id+'').val());
        total_harga = total_harga - subSebelum;

        var newsubTotal = hargaSebelum * new_jumlah;
        var newtext_sub = formatRupiah(""+newsubTotal, 'Rp. ');

        total_harga = total_harga + newsubTotal;
        var text = formatRupiah(""+total_harga, 'Rp. ');
        $("#iniTotal").text(""+text+"");
        document.getElementById("idTotal").value = total_harga;

        $('#row'+id+'').remove();

        $('#dynamic_field').append(
        "<tr id='row"+id+"' class='dynamic-added'> <td> <input type='hidden' id='col"+id+"' name='addmore["+id+"][id]' value='"+id+"' /> "+id+" </td> <td> <input id='nama"+id+"' type='hidden' name='addmore["+id+"][name]' value='"+namaSebelum+"' /> "+namaSebelum+" </td> <td> <input style='width:40px' type='text' id='jumlah"+id+"' name='addmore["+id+"][jumlah]' class='form-control jumlah' value='"+new_jumlah+"' /> </td> <td> <input type='hidden' id='diskon"+id+"' name='addmore["+id+"][diskon]' value='"+diskonSebelum+"' /> "+diskonSebelum+"% </td> <td> <input type='hidden' id='harga"+id+"' name='addmore["+id+"][harga]' value='"+hargaSebelum+"' /> "+newtext_harga+" </td> <td> <input type='hidden' id='sub"+id+"' name='addmore["+id+"][subtotal]' value='"+newsubTotal+"' /> "+newtext_sub+" </td> <td> <a name='remove' id='"+id+"' class='feather icon-trash-2 text-bold-700 text-danger btn_remove'></a></td></tr>"
        );

        $('#itemstore').remove();
  // });
  }, 600));

  $('#tombolSimpan').click(function(){ 
    if (i == 0) {
      alert('Mohon memilih produk dan menambahkan daftar permintaan terlebih dahulu !!');
      event.preventDefault();
    }

  });

  function f11(){
    /* tombol F11 */
    if(event.keyCode == 122) {
      event.preventDefault();
      alert('Anda menekan tombol F11');
    }
  }

</script>