<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') OR exit('No direct script access allowed');
class Market extends CI_Controller {

	function index(){	
        
        redirect('market/home');
        
	}
	

    function home(){        
          $data['title'] = 'Login';
          $this->load->view('olshop/login',$data);
    }
	public function prosesregistrasi(){
        $this->form_validation->set_rules('username', 'Username','trim|required|min_length[1]|max_length[255]|is_unique[users.USERNAME]');
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->auth->registrasi($username,$password);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
            $this->load->view('olshop/login',$data);
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
            $this->load->view('olshop/register',$data);
		}
	}
	

	public function register()
	{
		$data['title'] = 'Register';
		$this->load->view('olshop/register',$data);
	}

	public function proseslogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'USERNAME' => $username,
			'PASSWORD' => md5($password)
			);
		$cek = $this->auth->cek_login("users",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('market/rumah');
 
		}else{
			echo "Username dan password salah !";
		}
	}
	function rumah(){
		$data['title'] = 'Halaman Depan';
		$this->template->load('olshop/template','olshop/view_halaman_depan_bar',$data);	
	}
    function welcome(){	
        if (isset($_POST['submit'])){
        	$nama_konsumen =$this->input->post('b');
        	$cek  = $this->model_app->view_where('rb_penjualan',array('NAMA_PELANGGAN'=>$nama_konsumen, 'TGL_PENJUALAN' => date('Y-m-d')))->num_rows();
        	if ($cek == 0) {

        		$date = date('ymd');
				$kd_toko = $this->model_app->view_where('profil_toko',array('STATUS_TOKO' => 'nicotine', ))->row()->KODE_TOKO;

				$maxid = $this->db->query("SELECT MAX(NO_FAKTUR_PENJUALAN) as maxid FROM rb_penjualan WHERE NO_FAKTUR_PENJUALAN LIKE '" . $kd_toko . "%'")->row()->maxid;

				// $no_urut = substr($maxid, -5);
			 //    $new_urut = $no_urut + 1;
			    $no_faktur = $kd_toko . $date . rand(10000,1000000);

        		$this->session->set_userdata(array('costumer'=>$nama_konsumen,'nofaktur'=>$no_faktur));
        		redirect($this->uri->segment(1).'/home');
        	}
        	else{
        		echo "<script>window.alert('Maaf, Nama Pelanggan sudah ada, mohon ganti dengan nama lain!');
                                  window.location=('".base_url()."/olshop/home')</script>";
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
                        'UKURAN'=>'',
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


        	$data = array(
                        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                        'TGL_PENJUALAN'=>date('Y-m-d'),
                        'ID_USER_KASIR'=>$id_user,
                        'NAMA_PELANGGAN'=>$nama_konsumen,
                        'NOMOR_MEJA'=>$this->input->post('meja'),
                        'TOTAL_HARGA'=>$total,
                        'SISA'=>0,
                        'CATATAN'=>'',
                        'KET'=>'offline',
                        'STATUS'=>'selesai'
                    );

            $this->model_app->insert('rb_penjualan',$data); 
            $this->session->sess_destroy();
            echo "<script>window.alert('Pesanan BERHASIL disimpan, mohon Tunggu Pesanan, Terimakasih');
                                  window.location=('".base_url()."/olshop/home')</script>";
        }
        else{
        	$data['title'] = 'keranjang';
          	$this->template->load('olshop/template','olshop/view_transaksi',$data);
        }        
    }

    function delete_keranjang(){
        $id = array('ID_PENJUALAN_DETAIL' => $this->uri->segment(3));
          $this->model_app->delete('rb_penjualan_detail',$id);
        redirect($this->uri->segment(1).'/keranjang');
    }

    function logout(){
		$this->session->sess_destroy();
		redirect($this->uri->segment(1).'/home');
	}
}