<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') OR exit('No direct script access allowed');
class Nicotine extends CI_Controller {

	function index(){	
        
        redirect($this->uri->segment(1).'/home');
        
    }

    function home(){        
          $data['title'] = 'Halaman Depan';
          $this->template->load('nicotine/template','nicotine/view_halaman_depan_bar',$data);
    }

    function welcome(){	
        if (isset($_POST['submit'])){
        	$nama_konsumen =$this->input->post('b');
        	$cek  = $this->model_app->view_where('rb_penjualan',array('NAMA_PELANGGAN'=>$nama_konsumen, 'TGL_PENJUALAN' => date('Y-m-d')))->num_rows();
        	if ($cek == 0) {

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

        		$this->session->set_userdata(array('costumer'=>$nama_konsumen,'nofaktur'=>$no_faktur));

                $data = array(
                        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                        'TGL_PENJUALAN'=>$date,
                        'ID_USER_KASIR'=>1,
                        'NAMA_PELANGGAN'=>$nama_konsumen,
                        'SUB_HARGA'=>0,
                        'PPN'=>0,
                        'TOTAL_HARGA'=>0,
                        'STATUS'=>'belum'
                    );

                $this->model_app->insert('rb_penjualan',$data);

        		redirect($this->uri->segment(1).'/home');
        	}
        	else{
        		echo "<script>window.alert('Maaf, Nama Pelanggan sudah ada, mohon ganti dengan nama lain!');
                                  window.location=('".base_url()."/nicotine/home')</script>";
        	}   
        }        
    }

    function transaksi_detail(){	
        if (isset($_POST['edit'])){

        	$id_menu =$this->input->post('a');
        	$nama_menu =$this->input->post('b');
        	$jumlah =$this->input->post('c');
        	$harga =$this->input->post('harga');
        	$diskon =$this->input->post('diskon');
        	$sub_total = (int)$jumlah * (int)$harga;
        	$nama_konsumen =$this->session->costumer;


        	$no_faktur =$this->session->nofaktur;
        	


            $data = array(
                        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                        'ID_PRODUK'=>$id_menu,
                        'NAMA_PRODUK'=>$nama_menu,
                        'JUMLAH'=>$jumlah,
                        'DISKON'=>$diskon,
                        'HARGA'=>$harga,
                        'SUB_TOTAL_HARGA'=>$sub_total
                    );

            $this->model_app->insert('rb_penjualan_detail',$data); 
            redirect($this->uri->segment(1).'/home');
        }        
    }

    function keranjang(){	
        if (isset($_POST['edit'])){

        	$id =$this->input->post('a');
        	$nama_menu =$this->input->post('b');
        	$jumlah =$this->input->post('c');
        	$harga =$this->input->post('d');
        	$sub_total = (int)$jumlah * (int)$harga;


        	$data = array(
                        'JUMLAH'=>$jumlah,
                        'SUB_TOTAL_HARGA'=>$sub_total
                    );

            $where = array('ID_PENJUALAN_DETAIL' => $id);
            $this->model_app->update('rb_penjualan_detail', $data, $where);
            redirect($this->uri->segment(1).'/keranjang');
        }
        else if (isset($_POST['simpan'])) {
        	$no_faktur =$this->session->nofaktur;
        	$nama_konsumen =$this->session->costumer;
        	if ($this->session->id_user == '') {
        		$id_user=1;
        	}else{
        		$id_user=$this->session->id_user;
        	}

        	$rows = $this->model_app->edit('rb_penjualan_detail', array('NO_FAKTUR_PENJUALAN' => $this->session->nofaktur))->result_array();
        	$total=0;
        	foreach ($rows as $row) {
        		$total+=(int)$row[SUB_TOTAL_HARGA];
        	}

            $ppn = $this->model_app->edit('profil_toko', array('STATUS_TOKO' => 'nicotine'))->row()->PPN;
            $jumlah_ppn = ($total*$ppn)/100;
            $jadi_plus_ppn = $total + $jumlah_ppn;


        	$data = array(
                        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                        'TGL_PENJUALAN'=>date('Y-m-d'),
                        'ID_USER_KASIR'=>$id_user,
                        'NAMA_PELANGGAN'=>$nama_konsumen,
                        'NOMOR_MEJA'=>$this->input->post('meja'),
                        'SUB_HARGA'=>$total,
                        'PPN'=>$ppn,
                        'TOTAL_HARGA'=>$jadi_plus_ppn,
                        'KEMBALI'=>0,
                        'CATATAN'=>'',
                        'KET'=>'offline',
                        'STATUS'=>'belum'
                    );

            $where = array('NO_FAKTUR_PENJUALAN' => $no_faktur);
            $this->model_app->update('rb_penjualan', $data, $where);

            $this->session->sess_destroy();
            echo "<script>window.alert('Pesanan BERHASIL disimpan, mohon Tunggu Pesanan, Terimakasih');
                                  window.location=('".base_url()."/nicotine/home')</script>";
        }
        else{
        	$data['title'] = 'keranjang';
          	$this->template->load('nicotine/template','nicotine/view_transaksi',$data);
        }        
    }

    function delete_keranjang(){
        $id = array('ID_PENJUALAN_DETAIL' => $this->uri->segment(3));
          $this->model_app->delete('rb_penjualan_detail',$id);
        redirect($this->uri->segment(1).'/keranjang');
    }

    function cetak_struk() {
        // me-load library escpos
        $this->load->library('escpos');
 
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("printer_a");
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);
 
        // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
        function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 12;
            $lebar_kolom_2 = 8;
            $lebar_kolom_3 = 8;
            $lebar_kolom_4 = 9;
 
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
            $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);
 
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
            $kolom4Array = explode("\n", $kolom4);
 
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));
 
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
 
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
 
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
 
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);
 
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
            }
 
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris, "\n") . "\n";
        }   
 
        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
        $printer->text("Nama Toko\n");
        $printer->text("\n");
 
        // Data transaksi
        $printer->initialize();
        $printer->text("Kasir : Badar Wildanie\n");
        $printer->text("Waktu : 13-10-2019 19:23:22\n");
 
        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Barang", "qty", "Harga", "Subtotal"));
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Makaroni 250gr", "2pcs", "15.000", "30.000"));
        $printer->text(buatBaris4Kolom("Telur", "2pcs", "5.000", "10.000"));
        $printer->text(buatBaris4Kolom("Tepung terigu", "1pcs", "8.200", "16.400"));
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom('', '', "Total", "56.400"));
        $printer->text("\n");
 
         // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Terima kasih telah berbelanja\n");
        $printer->text("http://badar-blog.blogspot.com\n");
 
        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
    }

    function logout(){
		$this->session->sess_destroy();
		redirect($this->uri->segment(1).'/home');
	}
}