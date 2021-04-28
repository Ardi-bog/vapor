<?php
  echo "
  	  	<tr id='itemstore'>
  	  		<td>
  	  			<div>
			    	<input type='hidden' id='iniIDProduk' value='$produk[ID_PRODUK]'>
            <input type='hidden' value='$produk[NAMA_PRODUK]' id='iniNamaProduk' readonly='on'>
            <input type='hidden' value='$produk[HARGA_JUAL]' id='iniHargaProduk' readonly='on'>
            <input type='hidden' value='$produk[DISKON]' id='iniDiskonProduk' readonly='on'>
			      <input type='hidden' value='$stok[JUMLAH_STOK]' id='iniStokProduk' readonly='on'>
			    </div>
  	  		</td>
  	  	</tr>
  ";