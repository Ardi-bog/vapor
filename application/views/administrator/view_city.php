<?php
  echo "<option value='999'>PUSAT</option>";
  foreach ($kota as $row){
      echo "<option value='$row[ID_KOTA]'>$row[NAMA_KOTA]</option>";
  }