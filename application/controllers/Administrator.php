<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	function index(){
		if (isset($_POST['submit'])){
          if ($this->input->post()) {
                $username = $this->input->post('a');
          			$password = hash("sha512", md5($this->input->post('b')));
          			$cek = $this->model_app->cek_login($username,$password,'users');
          		    $row = $cek->row_array();
          		    $total = $cek->num_rows();
          			if ($total > 0){
                    
      				$this->session->set_userdata('upload_image_file_manager',true);
      				$this->session->set_userdata(array('username'=>$row['USERNAME'],
                                          'id_user' => $row['ID_USERNYA'],
                                          'level'=>$row['LEVEL_USERS']));
      				redirect($this->uri->segment(1).'/home');
    			}else{
                    echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Username dan Password Salah!!</center></div>');
    				redirect($this->uri->segment(1).'/index');
    			}
            }else{
                echo $this->session->set_flashdata('message', '<div class="alert alert-danger"><center>Security Code salah!</center></div>');
                redirect($this->uri->segment(1).'/index');
            }
		}else{
            if ($this->session->level!=''){
              redirect($this->uri->segment(1).'/home');
            }else{
    			$data['title'] = 'Administrator &rsaquo; Log In';
    			$this->load->view('administrator/view_login',$data);
            }
		}
	}

    function halaman_depan_bar(){        
          redirect('nicotine/');
    }

    function home(){
        cek_session_akses();
        
          $data['title'] = 'Welcome Super Admin';
          $this->load->library('template');
          $this->template->load('administrator/template','administrator/view_home_admin',$data);
    }

    function city(){
        $state_id = $this->input->post('stat_id');
        $data['kota'] = $this->model_app->view_where_ordering('rb_kota',array('ID_PROVINSI' => $state_id),'ID_KOTA','DESC');
        $this->load->view('administrator/view_city',$data);      
    }

    function findProduk(){
        $produk_id = $this->input->post('produk_id');
        $data['produk'] = $this->model_app->view_where('produk',array('ID_PRODUK' => $produk_id))->row_array();
        $data['stok'] = $this->model_app->view_where('stok',array('ID_PRODUK' => $produk_id,'ID_CABANG' => 0))->row_array();
        $this->load->view('administrator/view_produk',$data);      
    }

    function findMenu(){
        $menu_id = $this->input->post('menu_id');
        $data['menu'] = $this->model_app->view_where('menu',array('ID_MENU' => $menu_id))->row_array();

        $model_menu = $this->model_app->view_where('menu',array('ID_MENU' => $menu_id))->row_array();

        $harga = $model_menu[HARGA];
        $diskon = $model_menu[DISKON];
        if ($diskon == 0) {
          $data['harga_new'] = $harga;
        }else{
          $nilai=($diskon/100)*$harga;
          $jadi= $harga-$nilai;

          $data['harga_new'] = $jadi;
        }

        $this->load->view('administrator/view_cari_menu',$data);      
    }

    // Get kota
    function cariKotas(){

      // kata
      $searchTerm = $this->input->post('kata');

      // Get Kota
      $response = $this->model_app->getKota($searchTerm);

      echo json_encode($response);
    }

    function cariMenus(){

      // kata
      $searchTerm = $this->input->post('kata');

      // Get Kota
      $response = $this->model_app->getMenu($searchTerm);

      echo json_encode($response);
    }

    // Controller Modul User

    function ganti_status_manajemenuser(){
        cek_session_akses();
        if (isset($_POST['submit'])){       
                    
           $data = array('STATUS_AKUN'=>$this->input->post('status-akun'));
                        
            $where = array('USERNAME' => $this->input->post('a'));
            $this->model_app->update('users', $data, $where);
            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data User <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect('administrator/manajemenuser');
        }else{
            redirect('administrator/manajemenuser');
        }
    }

    function ganti_status_pegawai(){
        cek_session_akses();
        if (isset($_POST['submit'])){       
                    
           $data = array('STATUS_AKUN'=>$this->input->post('status-akun'));
                        
            $where = array('USERNAME' => $this->input->post('a'));
            $this->model_app->update('users', $data, $where);
            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data User <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect('administrator/pegawai');
        }else{
            redirect('administrator/pegawai');
        }
    }

    function manajemenuser(){
        cek_session_akses();
        $data['title'] = 'Manajemen Admin';
        $id = $this->uri->segment(3);

        if (isset($_POST['tambah'])){
            $username = $this->db->escape_str($this->input->post('username'));

            $cek1  = $this->model_app->view_where('users',array('USERNAME'=>$username))->num_rows();
            if ($cek1 >= 1){
                $username = $this->input->post('username');
                echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
                                  window.location=('".base_url()."/administrator/manajemenuser')</script>";
            }else{
                $config['upload_path'] = 'asset/foto_user/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['max_size'] = '300'; // kb
                $newName = 'foto-'.$this->input->post('username');
                $config['file_name'] = $newName;
                $this->load->library('upload', $config);
                $this->upload->overwrite = true;

                //data profil
                $data1 = array('ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_ADMIN'=>$this->db->escape_str($this->input->post('nama')),
                                        'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                        'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                        'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                        'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                        'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                        'TANGGAL_MASUK'=>$this->db->escape_str($this->input->post('tanggal')));
                $this->model_app->insert('rb_admin',$data1);
                $NAMA_ADMIN = $this->db->escape_str($this->input->post('nama'));
                $id = $this->db->query("SELECT * FROM rb_admin where NAMA_ADMIN='".$NAMA_ADMIN."'")->row_array();
                //data akun
                if (!$this->upload->do_upload('f')){
                        $data = array(
                                        'ID_USERNYA'=>$id[ID_ADMIN],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                        'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'STATUS_AKUN'=>1
                                    );
                        
                }else{
                  $hasil=$this->upload->data();
                        $data = array(
                                        'ID_USERNYA'=>$id[ID_ADMIN],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                        'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'STATUS_AKUN'=>1,
                                        'FOTO'=>$hasil['file_name']
                                    );
                }
                $this->model_app->insert('users',$data);
                $this->session->set_flashdata('pesan','
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User <strong>Berhasil ditambahkan !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ');
                redirect($this->uri->segment(1).'/manajemenuser');
            }
        }
        else if (isset($_POST['edit'])){

            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'foto-'.$this->input->post('a');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload('f') AND $this->input->post('b') ==''){
                    $data1 = array(
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_ADMIN'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') ==''){
              $hasil=$this->upload->data();
                    $data1 = array('FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_ADMIN'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif (!$this->upload->do_upload('f') AND $this->input->post('b') !=''){
                    $data1 = array('PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_ADMIN'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') !=''){
              $hasil=$this->upload->data();
                    $data1 = array(
                                  'PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_ADMIN'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }
            $where1 = array('USERNAME' => $this->input->post('id1'));
            $where2 = array('ID_ADMIN' => $this->input->post('id2'));
            $this->model_app->update('users', $data1, $where1);
            $this->model_app->update('rb_admin', $data2, $where2);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data User <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/manajemenuser');

        }
        else{
          $this->db->select('*');
          $this->db->from('rb_admin');
          $this->db->join('users', 'rb_admin.ID_ADMIN=users.ID_USERNYA');
          $this->db->like('LEVEL_USERS','admin');
          $this->db->order_by('ID_ADMIN','DESC');
          $data['record'] = $this->db->get()->result_array();
          $data['provinsi'] = $this->model_app->view_ordering('rb_provinsi','ID_PROVINSI','ASC');
          $this->template->load('administrator/template','administrator/mod_users/view_users',$data);
        }
    }

    function delete_manajemenuser(){
        cek_session_akses();

        $where1 = array('ID_USERNYA' => $this->uri->segment(3));
        $model = $this->db->query("SELECT * FROM users where ID_USERNYA =".$this->uri->segment(3))->row_array();
        unlink("asset/foto_user/".$model[FOTO]);
        $where2 = array('ID_ADMIN' => $model[ID_USERNYA]);
        $this->model_app->delete('rb_admin',$where2);
        $this->model_app->delete('users',$where1);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data User <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/manajemenuser');
    }

  // Controller modul Pegawai
    function pegawai(){
        cek_session_akses();
        $data['title'] = 'Data Pegawai';
        $id = $this->uri->segment(3);

        if (isset($_POST['tambah'])){
            $username = $this->db->escape_str($this->input->post('username'));

            $cek1  = $this->model_app->view_where('users',array('USERNAME'=>$username))->num_rows();
            if ($cek1 >= 1){
                $username = $this->input->post('username');
                echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
                                  window.location=('".base_url()."/administrator/tambah_pegawai')</script>";
            }else{
                $config['upload_path'] = 'asset/foto_user/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['max_size'] = '300'; // kb
                $newName = 'foto-'.$this->input->post('username');
                $config['file_name'] = $newName;
                $this->load->library('upload', $config);
                $this->upload->overwrite = true;

                //data profil
                $data1 = array('ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_LENGKAP'=>$this->input->post('nama'),
                                        'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                        'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                        'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                        'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                        'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                        'TANGGAL_MASUK'=>$this->db->escape_str($this->input->post('tanggal')));
                $this->model_app->insert('rb_pegawai',$data1);
                $NAMA_PEGAWAI = $this->input->post('nama');
                $id = $this->db->query("SELECT * FROM rb_pegawai where NAMA_LENGKAP='".$NAMA_PEGAWAI."'")->row_array();
                //data akun
                if (!$this->upload->do_upload('f')){

                        $data = array(
                                        'ID_USERNYA'=>$id['ID_PEGAWAI'],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->input->post('nama'),
                                        'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'STATUS_AKUN'=>1
                                    );
                        
                }else{

                      $hasil=$this->upload->data();
                        $data = array(
                                        'ID_USERNYA'=>$id['ID_PEGAWAI'],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->input->post('nama'),
                                        'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'FOTO'=>$hasil['file_name'],
                                        'STATUS_AKUN'=>1
                                    );
                }
                $this->model_app->insert('users',$data);
                $this->session->set_flashdata('pesan','
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Pegawai <strong>Berhasil diupdate !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ');
                redirect($this->uri->segment(1).'/pegawai');
            }
        }
        else if (isset($_POST['edit'])){
            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'foto-'.$this->input->post('a');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload('f') AND $this->input->post('b') ==''){
                    $data1 = array(
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_LENGKAP'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') ==''){
                  $hasil=$this->upload->data();
                    $data1 = array('FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_LENGKAP'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif (!$this->upload->do_upload('f') AND $this->input->post('b') !=''){
                    $data1 = array('PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_LENGKAP'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') !=''){
                  $hasil=$this->upload->data();
                    $data1 = array(
                                  'PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'LEVEL_USERS'=>$this->db->escape_str($this->input->post('level')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_LENGKAP'=>$this->db->escape_str($this->input->post('nama')),
                                  'EMAIL'=>$this->db->escape_str($this->input->post('email')),
                                  'NO_HP'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'JENIS_KELAMIN'=>$this->db->escape_str($this->input->post('jk')),
                                  'ALAMAT_LENGKAP'=>$this->db->escape_str($this->input->post('alamat')),
                                  'KECAMATAN'=>$this->db->escape_str($this->input->post('kecamatan')),
                                  'TANGGAL_MASUK'=>$this->input->post('tanggal'),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota'))
                                );
            }
            $where1 = array('USERNAME' => $this->input->post('id1'));
            $where2 = array('ID_PEGAWAI' => $this->input->post('id2'));
            $this->model_app->update('users', $data1, $where1);
            $this->model_app->update('rb_pegawai', $data2, $where2);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pegawai <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/pegawai');

        }
        else{
          $this->db->select('*');
          $this->db->from('rb_pegawai');
          $this->db->join('users', 'rb_pegawai.ID_PEGAWAI=users.ID_USERNYA');
          $this->db->not_like('LEVEL_USERS','admin');
          $this->db->order_by('ID_PEGAWAI','DESC');
          $data['record'] = $this->db->get()->result_array();
          $data['provinsi'] = $this->model_app->view_ordering('rb_provinsi','ID_PROVINSI','ASC');
          $this->template->load('administrator/template','administrator/mod_pegawai/view_pegawai',$data);
        }
    }

    function delete_pegawai(){
        cek_session_akses();
        $where1 = array('USERNAME' => $this->uri->segment(3));
        $model = $this->db->query("SELECT * FROM users where USERNAME='".$this->uri->segment(3)."'")->row_array();
        unlink("asset/foto_user/".$model[FOTO]);
        $where2 = array('ID_PEGAWAI' => $model[ID_USERNYA]);
        $this->model_app->delete('rb_pegawai',$where2);
        $this->model_app->delete('users',$where1);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pegawai <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/pegawai');
    }

  // Controller Modul Logo

    function logowebsite(){
        cek_session_akses();
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/logo/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['max_size'] = '300'; // kb
            $newName = 'logo-'.$this->input->post('id');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();

            $datadb = array('GAMBAR'=>$hasil['file_name']);
            $where = array('ID_LOGO' => $this->input->post('id'));
            $this->model_app->update('logo', $datadb, $where);
            redirect($this->uri->segment(1).'/logowebsite');
        }else{
            $data['title'] = 'Logo Web';
            $where=array('NAMA_WEB'=>'vaporhitz');
            $data['record'] = $this->model_app->edit('logo',$where);
            $this->template->load('administrator/template','administrator/mod_logowebsite/view_logowebsite1',$data);
        }
    }

    function logowebsiteNicotine(){
        cek_session_akses();
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/logo/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['max_size'] = '300'; // kb
            $newName = 'logo-'.$this->input->post('id');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();

            if (!$this->upload->do_upload('f')) {
                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('pesan','
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Logo Website nicotine <strong>Gagal diupdate !! <br>'.$error['error'].'</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ');
                redirect($this->uri->segment(1).'/logowebsiteNicotine');
            }
            else{
              $datadb = array('GAMBAR'=>$hasil['file_name']);
              $where = array('ID_LOGO' => $this->input->post('id'));
              $this->model_app->update('logo', $datadb, $where);

              $this->session->set_flashdata('pesan','
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data Logo Website nicotine <strong>Berhasil diupdate !!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              ');
              redirect($this->uri->segment(1).'/logowebsiteNicotine');
            }
        }else{
            $data['title'] = 'Logo Web';
            $where=array('NAMA_WEB'=>'nicotine');
            $data['record'] = $this->model_app->edit('logo',$where);
            $this->template->load('administrator/template','administrator/mod_logowebsite/view_logowebsite2',$data);
        }
    }

    //  Controller modul banner

    function bannerNicotine(){
        cek_session_akses();
        if (isset($_POST['tambah'])){

            $data = array(
                'NAMA_WEB'=>$this->input->post('nama'),
                'JUDUL_BANNER'=>$this->input->post('judul'),
                'DESKRIPSI'=>$this->input->post('deskripsi'),
                'TGL_POSTING'=>$this->input->post('tanggal')
            );
            $this->model_app->insert('banner',$data);

            $JUDUL = $this->input->post('judul');
            $id = $this->db->query("SELECT * FROM banner where JUDUL_BANNER LIKE'%".$JUDUL."%'")->row()->ID_BANNER;

            $config['upload_path'] = 'asset/banner/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'banner-'.$id;
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('f')){

              $hasil=$this->upload->data();
              $data = array(
                              'GAMBAR'=>$hasil['file_name']
                          );
            }

            $where = array('ID_BANNER' => $id);
            $this->model_app->update('banner', $data, $where);
            
            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Banner <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/bannerNicotine');

        }else if (isset($_POST['edit'])){

            $id = $this->uri->segment(3);

            $config['upload_path'] = 'asset/banner/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'banner-'.$this->input->post('id');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload('f')){
                    $data = array(
                                    'NAMA_WEB'=>$this->input->post('nama'),
                                    'JUDUL_BANNER'=>$this->input->post('judul'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'TGL_POSTING'=>$this->input->post('tanggal')
                                );
                    
            }else{
                    $hasil=$this->upload->data();
                    $data = array(
                                    'NAMA_WEB'=>$this->input->post('nama'),
                                    'JUDUL_BANNER'=>$this->input->post('judul'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'TGL_POSTING'=>$this->input->post('tanggal'),
                                    'GAMBAR'=>$hasil['file_name']
                                );
            }
            $where = array('ID_BANNER' => $this->input->post('id'));
            $this->model_app->update('banner', $data, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Banner <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/bannerNicotine');

        }

        else{
          $data['title'] = 'Banner Nicotine Bar';
          $data['jenismenu'] = $this->model_app->view_ordering('jenis_menu','ID_JENIS_MENU','ASC');
          $data['record'] = $this->model_app->view_ordering('banner','ID_BANNER','DESC');
          $this->template->load('administrator/template','administrator/mod_banner/view_banner2',$data);
        }
    }

    function delete_bannerNicotine(){
        cek_session_akses();
        $model = $this->db->query("SELECT * FROM banner where ID_BANNER='".$this->uri->segment(3)."'")->row_array();
        // menghapus gambar
        unlink("asset/banner/".$model[GAMBAR]);
        $id = array('ID_BANNER' => $this->uri->segment(3));
        $this->model_app->delete('banner',$id);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Banner <strong>Berhasil dihapus !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
        redirect($this->uri->segment(1).'/bannerNicotine');
    }
    // Controller Modul background

    function warna(){
        cek_session_akses();
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data1 = array('KODE_WARNA'=>$this->input->post('b1'));
            $where1 = array('ID_BACKGROUND' => 1);
            $this->model_app->update('background', $data1, $where1);

            $data2 = array('KODE_WARNA'=>$this->input->post('b2'));
            $where2 = array('ID_BACKGROUND' => 2);
            $this->model_app->update('background', $data2, $where2);

            $data3 = array('KODE_WARNA'=>$this->input->post('b3'));
            $where3 = array('ID_BACKGROUND' => 3);
            $this->model_app->update('background', $data3, $where3);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Desain Warna <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/warna');
        }else{
            $title = 'Desain Warna';
            $where=array('NAMA_WEB'=>'vaporhitz');
            $proses = $this->model_app->edit('background',$where)->result_array();
            $data = array('rows' => $proses,'title' => $title);
            $this->template->load('administrator/template','administrator/mod_warna/view_warna1',$data);
        }
    }

    function warnaNicotine(){
        cek_session_akses();
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data1 = array('KODE_WARNA'=>$this->input->post('b1'));
            $where1 = array('ID_BACKGROUND' => 4);
            $this->model_app->update('background', $data1, $where1);

            $data2 = array('KODE_WARNA'=>$this->input->post('b2'));
            $where2 = array('ID_BACKGROUND' => 5);
            $this->model_app->update('background', $data2, $where2);

            $data3 = array('KODE_WARNA'=>$this->input->post('b3'));
            $where3 = array('ID_BACKGROUND' => 6);
            $this->model_app->update('background', $data3, $where3);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Desain Warna <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/warnaNicotine');
        }else{
            $title = 'Desain Warna';
            $where=array('NAMA_WEB'=>'nicotine');
            $proses = $this->model_app->edit('background',$where)->result_array();
            $data = array('rows' => $proses,'title' => $title);
            $this->template->load('administrator/template','administrator/mod_warna/view_warna2',$data);
        }
    }

    function identitaswebsite(){
      cek_session_akses();
      if (isset($_POST['submit'])){
        
          $data = array('NAMA_WEBSITE'=>$this->db->escape_str($this->input->post('a')),
                            'EMAIL_ADMIN'=>$this->db->escape_str($this->input->post('b')),
                            'FACEBOOK'=>$this->db->escape_str($this->input->post('c')),
                            'INSTAGRAM'=>$this->db->escape_str($this->input->post('d')),
                            'TWITTER'=>$this->db->escape_str($this->input->post('e')),
                            'YOUTUBE'=>$this->db->escape_str($this->input->post('f')),
                            'NO_WA'=>$this->db->escape_str($this->input->post('g')),
                            'DESKRIPSI'=>$this->db->escape_str($this->input->post('h')),
                            'MAPS'=>$this->input->post('i'));

          $where = array('ID_IDENTITAS' => $this->input->post('id'));
        $this->model_app->update('identitas_web', $data, $where);

        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Identitas Website <strong>Berhasil diupdate !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');

        redirect($this->uri->segment(1).'/identitaswebsite');
      }else{
        $title = 'Identitas Website';
        $proses = $this->model_app->edit('identitas_web', array('ID_IDENTITAS' => 1))->row_array();
        $data = array('title'=>$title,'record' => $proses);
        $this->template->load('administrator/template','administrator/mod_identitas_web/view_identitas_web1',$data);
      }
    }

    function identitaswebsiteNicotine(){
      cek_session_akses();
      if (isset($_POST['submit'])){
        
          $data = array('NAMA_WEBSITE'=>$this->db->escape_str($this->input->post('a')),
                            'EMAIL_ADMIN'=>$this->db->escape_str($this->input->post('b')),
                            'FACEBOOK'=>$this->db->escape_str($this->input->post('c')),
                            'INSTAGRAM'=>$this->db->escape_str($this->input->post('d')),
                            'TWITTER'=>$this->db->escape_str($this->input->post('e')),
                            'YOUTUBE'=>$this->db->escape_str($this->input->post('f')),
                            'NO_WA'=>$this->db->escape_str($this->input->post('g')),
                            'DESKRIPSI'=>$this->db->escape_str($this->input->post('h')),
                            'MAPS'=>$this->input->post('i'));

          $where = array('ID_IDENTITAS' => $this->input->post('id'));
        $this->model_app->update('identitas_web', $data, $where);

        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Identitas Website <strong>Berhasil diupdate !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');

        redirect($this->uri->segment(1).'/identitaswebsiteNicotine');
      }else{
              $title = 'Identitas Website';
        $proses = $this->model_app->edit('identitas_web', array('ID_IDENTITAS' => 2))->row_array();
        $data = array('record' => $proses,'title' => $title);
        $this->template->load('administrator/template','administrator/mod_identitas_web/view_identitas_web2',$data);
      }
    }

    function reset_password(){
        if (isset($_POST['submit'])){
            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows()>=1){
                if ($this->input->post('a')==$this->input->post('b')){
                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager',true);
                    $this->session->set_userdata(array('username'=>$row['username'],
                                       'level'=>$row['level'],
                                       'id_session'=>$row['id_session']));
                    redirect($this->uri->segment(1).'/home');
                }else{
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('administrator/view_reset',$data);
                }
            }else{
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('administrator/view_reset',$data);
            }
        }else{
            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('administrator/view_reset',$data);
        }
    }

    function lupapassword(){
        $this->load->helper('url');
        if (isset($_POST['lupa'])){
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->model_app->edit('users', array('email' => $email));
            $row = $cekemail->row_array();
            $total = $cekemail->num_rows();
            if ($total <= 0){
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger">
                      Alamat email <strong>'.$email.'</strong> tidak ditemukan, Mohon masukan alamat email yang terkait dengan Akun Anda
                    </div>
                ');
                redirect('administrator', 'index');
            }else{
                $identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
                $randompass = generateRandomString(10);
                $passwordbaru = hash("sha512", md5($randompass));
                $this->db->query("UPDATE users SET password='$passwordbaru' where email='".$this->db->escape_str($email)."'");

                $email_tujuan = $row['email'];

                $tglaktif = date("d-m-Y H:i:s");
                $subject      = 'Permintaan Reset Password ...';
                $message      = "<html><body>Halooo! <b>".$row['nama_lengkap']."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permintaan untuk Reset Password
                    <br> Username Login : <b style='color:red'>$row[username]</b>
                    <br> Password Login : <b style='color:red'>$randompass</b>
                    <br> Silahkan Login di : <a href='$identitas[url]'>$identitas[url]</a> <br>
                    Admin, $identitas[nama_website] </body></html> \n";

                    $this->load->library('email');
                    $config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user']    = "erdindikri@gmail.com";
                    $config['smtp_pass']    = "087755152721";
                    $config['charset']    = 'utf-8';
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'html'; 
                    $config['validation'] = TRUE; 
                    $this->email->initialize($config);
                    $this->email->from("$identitas[email]", "$identitas[nama_website]");
                    $this->email->to($email_tujuan);
                    $this->email->cc('');
                    $this->email->bcc('');
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $this->email->send();

                $this->session->set_flashdata('pesan','
                    <div class="alert alert-success">
                        Permintaan Untuk Pergantian password sudah kami terima...<br>
                        Silahkan cek email anda, kami telah mengirimkan password baru ke <strong>'.$email_tujuan.'</strong>
                    </div>
                ');
                redirect('administrator', 'index');
            }
        }else{
            redirect($this->uri->segment(1));
        }
    }

  //controller modul merek
    function merek(){
      cek_session_akses();
      if (isset($_POST['tambah'])){
        $cek  = $this->model_app->view_where('merek_produk',array('NAMA_MEREK'=>$this->input->post('b')))->num_rows();
            if ($cek >= 1){
                $namaMerek = $this->input->post('b');
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger">
                        Merek Sudah Tersedia pada sistem
                    </div>
                ');
                redirect($this->uri->segment(1).'/merek');
            }else{
              $data = array('NAMA_MEREK'=>$this->db->escape_str($this->input->post('b')));
            
            $this->model_app->insert('merek_produk',$data);
            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success">
                        Data Merek <br><b>berhasil ditambahkan<b>.
                    </div>
                ');
                redirect($this->uri->segment(1).'/merek');
            }
      }else if (isset($_POST['edit'])){
        $cek  = $this->model_app->view_where('merek_produk',array('NAMA_MEREK'=>$this->input->post('b')))->num_rows();
            if ($cek >= 1){
                $namaMerek = $this->input->post('b');
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger">
                        Merek Sudah Tersedia pada sistem
                    </div>
                ');
                redirect($this->uri->segment(1).'/merek');
            }else{
              $data = array('NAMA_MEREK'=>$this->db->escape_str($this->input->post('b')));
            
              $where = array('ID_MEREK' => $this->input->post('a'));
              $this->model_app->update('merek_produk', $data, $where);
              $this->session->set_flashdata('pesan','
                    <div class="alert alert-success">
                        Data Merek <br><b>berhasil diupdate<b>.
                    </div>
                ');
                redirect($this->uri->segment(1).'/merek');
            }
      }
      else{
        $data['title'] = 'Merek Produk';
        $proses = $this->model_app->view('merek_produk')->result_array();
        $data = array('record' => $proses);
        $this->template->load('administrator/template','administrator/mod_merekproduk/view_merek',$data);
      }
    }

    function delete_merekproduk(){
        cek_session_akses();
      $id = array('ID_MEREK' => $this->uri->segment(3));
          $this->model_app->delete('merek_produk',$id);
          $this->session->set_flashdata('pesan','
                    <div class="alert alert-success">
                        Data Merek <br><b>berhasil dihapus<b>.
                    </div>
                ');
      redirect($this->uri->segment(1).'/merek');
    }

  // Controller Modul Menu NICOTINE BAR
    function jenismenu(){
      cek_session_akses();
      if (isset($_POST['tambah'])){
        $cek  = $this->model_app->view_where('jenis_menu',array('JENIS_MENU'=>$this->input->post('b')))->num_rows();
            if ($cek >= 1){
                $namaMerek = $this->input->post('b');
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Jenis Menu sudah Tersedia di sistem
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
                redirect($this->uri->segment(1).'/jenismenu');
            }else{
              $data = array('JENIS_MENU'=>$this->db->escape_str($this->input->post('b')));
            
            $this->model_app->insert('jenis_menu',$data);
            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Menu <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
                redirect($this->uri->segment(1).'/jenismenu');
            }
      }else if (isset($_POST['edit'])){
        $cek  = $this->model_app->view_where('jenis_menu',array('JENIS_MENU'=>$this->input->post('b')))->num_rows();
            if ($cek >= 1){
                $namaJenis = $this->input->post('b');
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Jenis Menu sudah Tersedia di Sistem
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
                redirect($this->uri->segment(1).'/jenismenu');
            }else{
              $data = array('JENIS_MENU'=>$this->db->escape_str($this->input->post('b')));
            
              $where = array('ID_JENIS_MENU' => $this->input->post('a'));
              $this->model_app->update('jenis_menu', $data, $where);
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Menu <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
                redirect($this->uri->segment(1).'/jenismenu');
            }
      }
      else{
        $data['title'] = 'Jenis Menu Produk';
        $proses = $this->model_app->view('jenis_menu')->result_array();
        $data = array('record' => $proses,'title' => 'Jenis Menu Bar');
        $this->template->load('administrator/template','administrator/mod_menu_bar/view_jenis_menu',$data);
      }
    }

    function delete_jenismenu(){
        cek_session_akses();
        $id = array('ID_JENIS_MENU' => $this->uri->segment(3));
          $this->model_app->delete('jenis_menu',$id);
          $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Jenis Menu <strong>Berhasil dihapus !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
        redirect($this->uri->segment(1).'/jenismenu');
    }

    function generateBarcode($id,$title)
    {
      $this->zend->load('Zend/Barcode'); 
      $isiBarcode = $id; 
      $imageResource = Zend_Barcode::factory('ean8', 'image', array('text'=>$isiBarcode,'font'=>3,'barHeight'=> 50,'factor'=>3.98), array())->draw();
      // $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$isiBarcode,'fontSize'=>20,'barHeight'=> 74,'factor'=>3.98), array())->draw();
      $imageName = $title.'-'.$isiBarcode.'.jpg';
      $imagePath = 'asset/barcode/'; 
       imagejpeg($imageResource, $imagePath.$imageName,100);
    }

    public function cari_menu_barcode()
    {
      # code...
    }

    function menubar(){
        cek_session_akses();
        if (isset($_POST['tambah'])){

            $data = array(
                'NAMA_MENU'=>$this->input->post('nama'),
                'JENIS_MENU'=>$this->input->post('jenis'),
                'DESKRIPSI'=>$this->input->post('deskripsi'),
                'HARGA'=>$this->db->escape_str($this->input->post('harga')),
                'DISKON'=>$this->db->escape_str($this->input->post('diskon'))
            );

            $this->model_app->insert('menu',$data);

            $NAMA = $this->input->post('nama');
            $id = $this->db->query("SELECT * FROM menu where NAMA_MENU LIKE'%".$NAMA."%'")->row()->ID_MENU;

            $config['upload_path'] = 'asset/foto_produk/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'menu-'.$id;
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            $this->generateBarcode($id,'menu');

            if ($this->upload->do_upload('f')){
                    $hasil=$this->upload->data();
                    $data = array(
                          'BARCODE'=>$newName.'.jpg',
                          'GAMBAR'=>$hasil['file_name']
                      );
            }else{
                $data = array(
                    'BARCODE'=>$newName.'.jpg'
                );
            }

            $where = array('ID_MENU' => $id);
            $this->model_app->update('menu', $data, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Menu <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/menubar');

        }else if (isset($_POST['edit'])){

            $id = $this->uri->segment(3);

            $config['upload_path'] = 'asset/foto_produk/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';            

            $config['max_size'] = '300'; // kb
            $newName = 'menu-'.$this->input->post('id');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            $this->generateBarcode($this->input->post('id'),'menu');

            if (!$this->upload->do_upload('f')){
                    $data = array(  
                                    'BARCODE'=>$newName.'.jpg',
                                    'NAMA_MENU'=>$this->input->post('nama'),
                                    'JENIS_MENU'=>$this->input->post('jenis'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'HARGA'=>$this->db->escape_str($this->input->post('harga')),
                                    'DISKON'=>$this->db->escape_str($this->input->post('diskon'))
                                );
                    
            }else{
                    $hasil=$this->upload->data();
                    $data = array(
                                    'BARCODE'=>$newName.'.jpg',
                                    'NAMA_MENU'=>$this->input->post('nama'),
                                    'JENIS_MENU'=>$this->input->post('jenis'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'HARGA'=>$this->db->escape_str($this->input->post('harga')),
                                    'DISKON'=>$this->db->escape_str($this->input->post('diskon')),
                                    'GAMBAR'=>$hasil['file_name']
                                );
            }
            $where = array('ID_MENU' => $this->input->post('id'));
            $this->model_app->update('menu', $data, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Menu <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/menubar');

        }

        else{
          $data['title'] = 'Menu Bar';
          $data['jenismenu'] = $this->model_app->view_ordering('jenis_menu','ID_JENIS_MENU','ASC');
          $data['record'] = $this->model_app->view_ordering('menu','ID_MENU','DESC');
          $this->template->load('administrator/template','administrator/mod_menu_bar/view_menu_bar',$data);
        }
    }

    function delete_menubar(){
        cek_session_akses();
        $model = $this->db->query("SELECT * FROM menu where ID_MENU='".$this->uri->segment(3)."'")->row_array();
        // menghapus gambar
        unlink("asset/foto_produk/".$model[GAMBAR]);
        $id = array('ID_MENU' => $this->uri->segment(3));
        $this->model_app->delete('menu',$id);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Menu <strong>Berhasil dihapus !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
        redirect($this->uri->segment(1).'/menubar');
    }

    function promo_menu(){
        cek_session_akses();
        $id = $this->uri->segment(3);
        if (isset($_POST['tambah'])){

            $data = array(
                'JUDUL_PROMO'=>$this->input->post('nama'),
                'DESKRIPSI'=>$this->input->post('deskripsi'),
                'URL'=>$this->input->post('url'),
                'TGL_POSTING'=>$this->input->post('tanggal')
            );
            $this->model_app->insert('promo',$data);

            $NAMA = $this->input->post('nama');
            $id = $this->db->query("SELECT * FROM promo where JUDUL_PROMO LIKE'%".$NAMA."%'")->row()->ID_PROMO;


            $config['upload_path'] = 'asset/foto_promo/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'promo-'.$id;
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if ($this->upload->do_upload('f')){
                    $hasil=$this->upload->data();
                    $data = array(
                                    'GAMBAR'=>$hasil['file_name']
                                );
            }
            $where = array('ID_PROMO' => $id);
            $this->model_app->update('promo', $data, $where);
            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Promo <strong>Berhasil ditambahkan !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/promo_menu');

        } else if (isset($_POST['edit'])){
            $config['upload_path'] = 'asset/foto_promo/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

            $config['max_size'] = '300'; // kb
            $newName = 'promo-'.$this->input->post('id');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload('f')){
                    $data = array(
                                    'JUDUL_PROMO'=>$this->input->post('nama'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'URL'=>$this->input->post('url'),
                                    'TGL_POSTING'=>$this->input->post('tanggal')
                                );
                    
            }else{
                    $hasil=$this->upload->data();
                    $data = array(
                                    'JUDUL_PROMO'=>$this->input->post('nama'),
                                    'DESKRIPSI'=>$this->input->post('deskripsi'),
                                    'URL'=>$this->input->post('url'),
                                    'TGL_POSTING'=>$this->input->post('tanggal'),
                                    'GAMBAR'=>$hasil['file_name']
                                );
            }
            $where = array('ID_PROMO' => $this->input->post('id'));
            $this->model_app->update('promo', $data, $where);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Promo <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/promo_menu');

        }
        else{
          $data['title'] = 'Promo Menu';
          $data['record'] = $this->model_app->view_ordering('promo','ID_PROMO','DESC');
          $this->template->load('administrator/template','administrator/mod_menu_bar/view_promo_menu',$data);
        }
    }

    function delete_promo(){
        cek_session_akses();
        $model = $this->db->query("SELECT * FROM promo where ID_PROMO='".$this->uri->segment(3)."'")->row_array();
        // menghapus gambar
        unlink("asset/foto_promo/".$model[GAMBAR]);
        $id = array('ID_PROMO' => $this->uri->segment(3));
        $this->model_app->delete('promo',$id);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Promo <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/promo_menu');
    }

// controller modul info toko
    function info_toko_nicotine(){
        cek_session_akses();

        if (isset($_POST['edit'])){
            
            $data = array(
                'ID_KOTA'=>$this->input->post('idkota'),
                'NAMA_TOKO'=>$this->input->post('nama'),
                'STATUS_TOKO'=>$this->input->post('status_toko'),
                'STATUSNYA'=>$this->input->post('statusnya')
            );
            $where = array('KODE_TOKO' => $this->input->post('id'));
            $this->model_app->update('profil_toko', $data, $where);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Info Toko <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/info_toko_nicotine');

        }else{
          $data['title'] = 'Info Toko';
          $data['record'] = $this->model_app->view_where('profil_toko',array('STATUS_TOKO' => 'nicotine'))->result_array();
          $this->template->load('administrator/template','administrator/mod_info_toko/view_info_toko2',$data);
        }
    }

    function delete_info_toko_nicotine(){
        cek_session_akses();
        $id = array('KODE_TOKO' => $this->uri->segment(3));
        $this->model_app->delete('profil_toko',$id);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Info Toko <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/info_toko_nicotine');
    }

    function info_toko_vapor(){
        cek_session_akses();

        if (isset($_POST['edit'])){
            
            $data = array(
                'ID_KOTA'=>$this->input->post('idkota'),
                'NAMA_TOKO'=>$this->input->post('nama'),
                'STATUS_TOKO'=>$this->input->post('status_toko'),
                'STATUSNYA'=>$this->input->post('statusnya')
            );
            $where = array('KODE_TOKO' => $this->input->post('id'));
            $this->model_app->update('profil_toko', $data, $where);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Info Toko <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/info_toko_vapor');

        }else{
          $data['title'] = 'Info Toko';
          $data['record'] = $this->model_app->view_where('profil_toko',array('STATUS_TOKO' => 'vaporhitz'))->result_array();
          $this->template->load('administrator/template','administrator/mod_info_toko/view_info_toko1',$data);
        }
    }

    function delete_info_toko_vapor(){
        cek_session_akses();
        $id = array('KODE_TOKO' => $this->uri->segment(3));
        $this->model_app->delete('profil_toko',$id);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Info Toko <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/info_toko_vapor');
    }

  public function kasir_bar()
  {
    if (isset($_POST['submit'])){
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

      $data = array(
        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
        'TGL_PENJUALAN'=>$date,
        'ID_USER_KASIR'=>$this->session->id_user,
        'NAMA_PELANGGAN'=>$this->input->post('nama_pelanggan'),
        'NOMOR_MEJA'=>$this->input->post('nomor_meja'),
        'TOTAL_HARGA'=>$this->input->post('total_harga'),
        'KEMBALI'=>$this->input->post('sisa_harga'),
        'CATATAN'=>'',
        'KET'=>'offline',
        'STATUS'=>'belum'
      );
      // status 0 = sedang di proses

      $this->model_app->insert('rb_penjualan',$data);

      if(!empty($this->input->post('addmore'))){

          foreach ($this->input->post('addmore') as $key => $value) {
              $data1 = array(
                'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                'ID_PRODUK'=>(int)$value['id'],
                'NAMA_PRODUK'=>$value['name'],
                'JUMLAH'=>(int)$value['jumlah'],
                'HARGA'=>(int)$value['harga'],
                'DISKON'=>(int)$value['diskon'],
                'SUB_TOTAL_HARGA'=>(int)$value['subtotal']
              );
              $this->model_app->insert('rb_penjualan_detail',$data1);


          }
             
      }

      $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Transaksi <strong>Berhasil !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
      redirect($this->uri->segment(1).'/kasir_bar');
    }
    else{
      $data['title'] = 'Kasir Bar';
      $data['data_menu'] = $this->model_app->view_ordering('menu','ID_MENU','ASC');
      $this->template->load('administrator/template','administrator/mod_kasir/view_kasir',$data);
    }
  }

  public function kasir_vapor()
  {
    if (isset($_POST['submit'])){
      $date = date('Y-m-d');

      $kd_toko = $this->model_app->view_where('profil_toko',array('STATUS_TOKO' => 'vaporhitz', ))->row()->KODE_TOKO;

        
      $maxid = $this->db->query("SELECT MAX(NO_FAKTUR_PENJUALAN) as maxid FROM rb_penjualan WHERE TGL_PENJUALAN ='".$date."' AND NO_FAKTUR_PENJUALAN LIKE '". $kd_toko ."%'")->row()->maxid;

      if ($maxid == '') {
        $maxid = 0;
      }

      $date2=date('Ymd');

      $no_urut = substr($maxid, -4);
      $new_urut = $no_urut + 1;
      $no_faktur = $kd_toko . $date2 . sprintf("%04s", $new_urut);

      $data = array(
        'NO_FAKTUR_PENJUALAN'=>$no_faktur,
        'TGL_PENJUALAN'=>$date,
        'ID_USER_KASIR'=>$this->session->id_user,
        'NAMA_PELANGGAN'=>null,
        'NOMOR_MEJA'=>null,
        'TOTAL_HARGA'=>$this->input->post('total_harga'),
        'KEMBALI'=>$this->input->post('sisa_harga'),
        'CATATAN'=>'',
        'KET'=>'offline',
        'STATUS'=>'selesai'
      );
      // status 0 = sedang di proses

      $this->model_app->insert('rb_penjualan',$data);

      if(!empty($this->input->post('addmore'))){

          foreach ($this->input->post('addmore') as $key => $value) {
              $data1 = array(
                'NO_FAKTUR_PENJUALAN'=>$no_faktur,
                'ID_PRODUK'=>(int)$value['id'],
                'NAMA_PRODUK'=>$value['name'],
                'JUMLAH'=>(int)$value['jumlah'],
                'HARGA'=>(int)$value['harga'],
                'DISKON'=>(int)$value['diskon'],
                'SUB_TOTAL_HARGA'=>(int)$value['subtotal']
              );
              $this->model_app->insert('rb_penjualan_detail',$data1);

              $where = array('ID_PRODUK' => (int)$value['id'], 'ID_CABANG'=>0);
              $model_stok_keluar = $this->model_app->view_where('stok',$where)->row()->STOK_KELUAR;

              $stok_keluar = $model_stok_keluar + (int)$value['jumlah'];
              $stok = (int)$value['stok'] - (int)$value['jumlah'];

              $data2 = array(
                'STOK_KELUAR'=>$stok_keluar,
                'JUMLAH_STOK'=>$stok,
                'DATE_TIME_UPDATED'=>date('Y-m-d H:i:s')
              );

              $this->model_app->update('stok', $data2, $where);
          }
             
      }

      $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Transaksi <strong>Berhasil !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
      redirect($this->uri->segment(1).'/kasir_vapor');
    }
    else{
      $data['title'] = 'Kasir Vapor';
      $data['data_produk'] = $this->model_app->view_ordering('produk','ID_PRODUK','ASC');
      $this->template->load('administrator/template','administrator/mod_kasir/view_kasir_vapor',$data);
    }
  }

  function cabang(){
        cek_session_akses();
        if (isset($_POST['tambah'])){

            $data = array(
                'NAMA_CABANG'=>$this->input->post('nama'),
                'TANGGAL_DAFTAR'=>$this->input->post('tanggal'),
                'TELP_CABANG'=>$this->input->post('telp'),
                'KODE_WILAYAH'=>$this->input->post('kota'),
                'ALAMAT_CABANG'=>$this->input->post('alamat')
            );

            $this->model_app->insert('cabang',$data);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Cabang <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/cabang');

        }else if (isset($_POST['edit'])){

            $id = $this->uri->segment(3);

            $data = array(
                'NAMA_CABANG'=>$this->input->post('nama'),
                'TANGGAL_DAFTAR'=>$this->input->post('tanggal'),
                'TELP_CABANG'=>$this->input->post('telp'),
                'KODE_WILAYAH'=>$this->input->post('idkota'),
                'ALAMAT_CABANG'=>$this->input->post('alamat')
            );

            $where = array('KODE_CABANG' => $this->input->post('id'));
            $this->model_app->update('cabang', $data, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Cabang <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/cabang');

        }

        else{
          $data['title'] = 'Menu Cabang';
          $data['provinsi'] = $this->model_app->view_ordering('rb_provinsi','ID_PROVINSI','ASC');
          $data['record'] = $this->model_app->view_ordering('cabang','TANGGAL_DAFTAR','DESC');
          $this->template->load('administrator/template','administrator/mod_cabang/view_cabang',$data);
        }
    }

    function delete_cabang(){
        cek_session_akses();
        
        $id = array('KODE_CABANG' => $this->uri->segment(3));
        $this->model_app->delete('cabang',$id);
        $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Cabang <strong>Berhasil dihapus !!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        ');
        redirect($this->uri->segment(1).'/cabang');
    }

    function stok(){
        cek_session_akses();
        if (isset($_POST['tambah'])){

            $cek = $this->model_app->view_where('stok',array('ID_PRODUK' => $this->input->post('produk'),'ID_CABANG' => $this->input->post('cabang')))->num_rows();

            if ($cek != 0) {
              echo "<script>window.alert('Maaf, Stok Produk Sudah Tersedia!');
                                  window.location=('".base_url()."/administrator/stok')</script>";
            }else{
                $jumlahStok = (int)$this->input->post('in') - (int)$this->input->post('out');

                $data = array(
                  'ID_CABANG'=>$this->input->post('cabang'),
                  'ID_PRODUK'=>$this->input->post('produk'),
                  'STOK_MASUK'=>$this->input->post('in'),
                  'STOK_KELUAR'=>$this->input->post('out'),
                  'JUMLAH_STOK'=>$jumlahStok,
                  'DATE_TIME_UPDATED'=>date('Y-m-d H:i:s')
                );

                $this->model_app->insert('stok',$data);

                $this->session->set_flashdata('pesan','
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Data Stok Produk <strong>Berhasil ditambahkan !!</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    ');
                redirect($this->uri->segment(1).'/stok');
            }

        }else if (isset($_POST['edit'])){

            $id = $this->uri->segment(3);

            $tambah=$this->input->post('masuk');

            $stok_masuk = (int)$tambah + $this->input->post('in');
            $jumlah = (int)$tambah + $this->input->post('jumlah');

            $data = array(
              'ID_PRODUK'=>$this->input->post('produk'),
              'STOK_MASUK'=>$stok_masuk,
              'JUMLAH_STOK'=>$jumlah,
              'DATE_TIME_UPDATED'=>date('Y-m-d H:i:s')
            );

            $where = array('ID_STOK' => $this->input->post('id'));
            $this->model_app->update('stok', $data, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Stok Produk <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/stok');

        }

        else{
          $data['title'] = 'Detail Stok';
          $data['dataProduk'] = $this->model_app->view_ordering('produk','ID_PRODUK','DESC');
          $data['dataCabang'] = $this->model_app->view_ordering('cabang','KODE_CABANG','DESC');
          $data['record'] = $this->model_app->view_ordering('stok','DATE_TIME_UPDATED','DESC');
          $this->template->load('administrator/template','administrator/mod_stok/view_stok',$data);
        }
    }

    function permintaan_stok(){
        cek_session_akses();
        if (isset($_POST['proses'])){

            $kode=$this->input->post('kode');

            $data = array(
              'STATUS'=>1
            );

            $where = array('KODE_PERMINTAAN' => $kode);
            $this->model_app->update('permintaan', $data, $where);

            if(!empty($this->input->post('addmore'))){
   
                foreach ($this->input->post('addmore') as $key => $value) {
                    $data1 = array(
                      'APPROVED_JUMLAH_REQ'=>$value['jumlah']
                    );
                    $where = array('ID_DET_PERMINTAAN' => $value['id']);
                    $this->model_app->update('detail_permintaan', $data1, $where);

                    // produk
                    $model_produk = $this->model_app->view_where('stok',array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => 0))->row();

                    $jumlah_total= $model_produk->JUMLAH_STOK - $value['jumlah'];
                    $jumlah_keluar = $model_produk->STOK_KELUAR + $value['jumlah'];

                    $data2 = array(
                      'STOK_KELUAR'=>$jumlah_keluar,
                      'JUMLAH_STOK'=>$jumlah_total
                    );
                    $where = array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => 0);
                    $this->model_app->update('stok', $data2, $where);
                }
                   
            }

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Permintaan <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/permintaan_stok');

        }else{
          $data['title'] = 'Data Permintaan Stok';
          $data['dataPermintaan'] = $this->model_app->view_ordering('permintaan','STATUS','ASC');
          $this->template->load('administrator/template','administrator/mod_permintaan_stok/view_permintaan_stok',$data);
        }
    }

    function tambah_permintaan_stok(){
        cek_session_akses();
        if (isset($_POST['submit'])){

            $date = date('Y-m-d');
    
            $maxid = $this->db->query("SELECT MAX(KODE_PERMINTAAN) as maxid FROM permintaan WHERE TGL_PERMINTAAN ='".$date."'")->row()->maxid;

            if ($maxid == '') {
              $maxid = 0;
            }

            $date2=date('Ymd');

            $no_urut = substr($maxid, -5);
            $new_urut = $no_urut + 1;
            $no_req = 'REQ'. $date2 . sprintf("%04s", $new_urut);
            

            $data = array(
              'KODE_PERMINTAAN'=>$no_req,
              'TGL_PERMINTAAN'=>$date,
              'KODE_CABANG'=>$this->input->post('cabang'),
              'CATATAN'=>'',
              'STATUS'=>0
            );
            // status 0 = belum di proses

            $this->model_app->insert('permintaan',$data);

            if(!empty($this->input->post('addmore'))){
   
                foreach ($this->input->post('addmore') as $key => $value) {
                    $data1 = array(
                      'ID_PERMINTAAN'=>$no_req,
                      'ID_PRODUK'=>$value['id'],
                      'JUMLAH_REQ'=>(int)$value['jumlah'],
                      'APPROVED_JUMLAH_REQ'=>0
                    );
                    $this->model_app->insert('detail_permintaan',$data1);
                }
                   
            }

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Permintaan Produk <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/tambah_permintaan_stok');

        }

        else{
          $data['title'] = 'Permintaan tambah Stok';
          $data['dataProduk'] = $this->model_app->view_ordering('produk','ID_PRODUK','DESC');
          $data['dataCabang'] = $this->model_app->view_ordering('cabang','KODE_CABANG','DESC');
          $data['record'] = $this->model_app->view_ordering('stok','DATE_TIME_UPDATED','DESC');
          $this->template->load('administrator/template','administrator/mod_permintaan_stok/view_tambah_permintaan_stok',$data);
        }
    }

    // pengiriman 

    function tambah_pengiriman(){
        cek_session_akses();

        $id_permintaan = $this->uri->segment(3);
        if (isset($_POST['submit'])){

            $date = date('Y-m-d');
    
            $maxid = $this->db->query("SELECT MAX(KODE_PENGIRIMAN) as maxid FROM pengiriman WHERE TANGGAL_PENGIRIMAN ='".$date."'")->row()->maxid;

            if ($maxid == '') {
              $maxid = 0;
            }

            $date2=date('Ymd');

            $no_urut = substr($maxid, -4);
            $new_urut = $no_urut + 1;
            $no_req = 'DELV'. $date2 . sprintf("%04s", $new_urut);

            $data = array(
              'KODE_PENGIRIMAN'=>$no_req,
              'TANGGAL_PENGIRIMAN'=>$date,
              'LOKASI_PENGIRIMAN'=>$this->input->post('lokasi'),
              'PENERIMA'=>$this->input->post('penerima'),
              'ID_KURIR'=>$this->input->post('kurir'),
              'NOMOR_KENDARAAN'=>$this->input->post('nopol'),
              'KETERANGAN'=>$this->input->post('keterangan'),
              'STATUS'=>0
            );
            // status 0 = belum di proses

            $this->model_app->insert('pengiriman',$data);

            if(!empty($this->input->post('addmore'))){
   
                foreach ($this->input->post('addmore') as $key => $value) {
                    $data1 = array(
                      'KODE_PENGIRIMAN'=>$no_req,
                      'ID_PRODUK'=>$value['id_produk'],
                      'JUMLAH_DIKIRIM'=>(int)$value['jumlah'],
                      'JUMLAH_DITERIMA'=>''
                    );
                    $this->model_app->insert('detail_pengiriman',$data1);

                    $id_permintaan = $value['id_permintaan'];
                }
                   
            }

            //set status permintaan jadi 2 = sedang di KIRIM
            $data = array('STATUS'=>2);
                        
            $where = array('KODE_PERMINTAAN'=>$id_permintaan);
            $this->model_app->update('permintaan', $data, $where);


            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data pengiriman <strong>Berhasil ditambahkan !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/pengiriman');

        }

        else{
          $data['title'] = 'Tambah data pengiriman';
          $data['dataKurir'] = $this->model_app->view_ordering('kurir','ID_KURIR','DESC');
          $data['dataPermintaan'] = $this->model_app->view_where('permintaan',array('KODE_PERMINTAAN' => $id_permintaan))->row_array();
          $data['dataDetail'] = $this->model_app->view_where('detail_permintaan',array('ID_PERMINTAAN' => $id_permintaan))->result_array();
          $this->template->load('administrator/template','administrator/mod_pengiriman/view_tambah_pengiriman',$data);
        }
    }

    function pengiriman(){
        cek_session_akses();

        if (isset($_POST['proses'])){
            $cekini=0;
            if(!empty($this->input->post('addmore'))){
   
                foreach ($this->input->post('addmore') as $key => $value) {
                   $jumlah_diterima =$value['jumlah'];
                   $jumlah_dikirim = $this->model_app->view_where('detail_pengiriman',array('ID_DET_PENGIRIMAN' => $value['id']))->row()->JUMLAH_DIKIRIM;

                   if ($jumlah_diterima > $jumlah_dikirim) {
                     $cekini++;
                   }                   
                }
            }

            if ($cekini > 0) {
              $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Data Pengiriman <strong>Gagal diupdate !!<br> Mohon isi data dengan benar !</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
              redirect($this->uri->segment(1).'/pengiriman');
            }else{
                $cekitu=0;
                if(!empty($this->input->post('addmore'))){
       
                    foreach ($this->input->post('addmore') as $key => $value) {
                        $jumlah_diterima =$value['jumlah'];
                        $jumlah_dikirim = $this->model_app->view_where('detail_pengiriman',array('ID_DET_PENGIRIMAN' => $value['id']))->row()->JUMLAH_DIKIRIM;

                        if ($jumlah_diterima < $jumlah_dikirim) {
                          $cekitu++;
                        }             
                    }
                }

                $kode=$this->input->post('kode');

                if ($cekitu > 0) {
                  $statusn=2;
                }else{
                  $statusn=1;
                }
                $data = array(
                  'STATUS'=>$statusn
                );

                $where = array('KODE_PENGIRIMAN' => $kode);
                $this->model_app->update('pengiriman', $data, $where);

                if(!empty($this->input->post('addmore'))){
       
                    foreach ($this->input->post('addmore') as $key => $value) {
                        $jumlah_diterima =$value['jumlah'];
                        $jumlah_dikirim = $this->model_app->view_where('detail_pengiriman',array('ID_DET_PENGIRIMAN' => $value['id']))->row()->JUMLAH_DIKIRIM;

                        if ($jumlah_diterima < $jumlah_dikirim) {
                          $jumlah_retur= $jumlah_dikirim - $jumlah_diterima;

                          $data1 = array(
                            'JUMLAH_DITERIMA'=>$value['jumlah'],
                            'JUMLAH_DIKEMBALIKAN'=>$jumlah_retur
                          );
                          $where = array('ID_DET_PENGIRIMAN' => $value['id']);
                          $this->model_app->update('detail_pengiriman', $data1, $where);
                        }else{

                          $data1 = array(
                            'JUMLAH_DITERIMA'=>$value['jumlah']
                          );
                          $where = array('ID_DET_PENGIRIMAN' => $value['id']);
                          $this->model_app->update('detail_pengiriman', $data1, $where);
                        }

                        // STOK
                        $model_stok = $this->model_app->view_where('stok',array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => $value['id_penerima']))->row();

                        if ($model_stok == '') {
                            $jumlahStok = (int)$value['jumlah'] + 0;

                            $data = array(
                              'ID_CABANG'=>$value['id_penerima'],
                              'ID_PRODUK'=>$value['id_produk'],
                              'STOK_MASUK'=>$value['jumlah'],
                              'STOK_KELUAR'=>0,
                              'JUMLAH_STOK'=>$jumlahStok,
                              'DATE_TIME_UPDATED'=>date('Y-m-d H:i:s')
                            );

                            $this->model_app->insert('stok',$data);
                        }else{
                            $jumlah_total= $model_stok->JUMLAH_STOK + $value['jumlah'];
                            $jumlah_masuk = $model_stok->STOK_MASUK + $value['jumlah'];

                            $data2 = array(
                              'STOK_MASUK'=>$jumlah_masuk,
                              'JUMLAH_STOK'=>$jumlah_total
                            );
                            $where = array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => $value['id_penerima']);
                            $this->model_app->update('stok', $data2, $where);
                        }
                    }
                       
                }

                $this->session->set_flashdata('pesan','
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Data Pengiriman <strong>Berhasil diupdate !!</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    ');
                redirect($this->uri->segment(1).'/pengiriman');
            }
        }
        else{
          $data['title'] = 'Data Pengiriman';
          $data['record'] = $this->model_app->view_ordering('pengiriman','TANGGAL_PENGIRIMAN','DESC');
          $this->template->load('administrator/template','administrator/mod_pengiriman/view_pengiriman',$data);
        }
      
    }

    function kurir(){
        cek_session_akses();
        $data['title'] = 'Data Kurir';
        $id = $this->uri->segment(3);

        if (isset($_POST['tambah'])){
            $username = $this->db->escape_str($this->input->post('username'));

            $cek1  = $this->model_app->view_where('users',array('USERNAME'=>$username))->num_rows();
            if ($cek1 >= 1){
                $username = $this->input->post('username');
                echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
                                  window.location=('".base_url()."/administrator/kurir')</script>";
            }else{
                $config['upload_path'] = 'asset/foto_user/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['max_size'] = '300'; // kb
                $newName = 'foto-'.$this->input->post('username');
                $config['file_name'] = $newName;
                $this->load->library('upload', $config);
                $this->upload->overwrite = true;

                //data profil
                $data1 = array(
                                        'NAMA_KURIR'=>$this->input->post('nama'),
                                        'ALAMAT'=>$this->db->escape_str($this->input->post('alamat')),
                                        'TELEPON'=>$this->db->escape_str($this->input->post('no_hp')),
                                        );

                $this->model_app->insert('kurir',$data1);

                // //////////////////////////////////////////////////////
                $NAMA_KURIR = $this->input->post('nama');
                $id = $this->db->query("SELECT * FROM kurir where NAMA_KURIR='".$NAMA_KURIR."'")->row_array();
                //data akun
                if (!$this->upload->do_upload('f')){

                        $data = array(
                                        'ID_USERNYA'=>$id['ID_KURIR'],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->input->post('nama'),
                                        'LEVEL_USERS'=>'kurir',
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'STATUS_AKUN'=>1
                                    );
                        
                }else{

                      $hasil=$this->upload->data();
                        $data = array(
                                        'ID_USERNYA'=>$id['ID_KURIR'],
                                        'ID_KOTA'=>$this->db->escape_str($this->input->post('kota')),
                                        'NAMA_USER'=>$this->input->post('nama'),
                                        'LEVEL_USERS'=>'kurir',
                                        'USERNAME'=>$this->db->escape_str($this->input->post('username')),
                                        'PASSWORD'=>hash("sha512", md5($this->input->post('password'))),
                                        'FOTO'=>$hasil['file_name'],
                                        'STATUS_AKUN'=>1
                                    );
                }
                $this->model_app->insert('users',$data);
                $this->session->set_flashdata('pesan','
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kurir <strong>Berhasil diupdate !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ');
                redirect($this->uri->segment(1).'/kurir');
            }
        }
        else if (isset($_POST['edit'])){
            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '300'; // kb
            $newName = 'foto-'.$this->input->post('a');
            $config['file_name'] = $newName;
            $this->load->library('upload', $config);
            $this->upload->overwrite = true;

            if (!$this->upload->do_upload('f') AND $this->input->post('b') ==''){
                    $data1 = array(
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_KURIR'=>$this->db->escape_str($this->input->post('nama')),
                                  'TELEPON'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'ALAMAT'=>$this->db->escape_str($this->input->post('alamat'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') ==''){
                  $hasil=$this->upload->data();
                    $data1 = array('FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_KURIR'=>$this->db->escape_str($this->input->post('nama')),
                                  'TELEPON'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'ALAMAT'=>$this->db->escape_str($this->input->post('alamat'))
                                );
            }elseif (!$this->upload->do_upload('f') AND $this->input->post('b') !=''){
                    $data1 = array('PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_KURIR'=>$this->db->escape_str($this->input->post('nama')),
                                  'TELEPON'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'ALAMAT'=>$this->db->escape_str($this->input->post('alamat'))
                                );
            }elseif ($this->upload->do_upload('f') AND $this->input->post('b') !=''){
                  $hasil=$this->upload->data();
                    $data1 = array(
                                  'PASSWORD'=>hash("sha512", md5($this->input->post('b'))),
                                  'FOTO'=>$hasil['file_name'],
                                  'NAMA_USER'=>$this->db->escape_str($this->input->post('nama')),
                                  'ID_KOTA'=>$this->db->escape_str($this->input->post('idkota')),
                                  'STATUS_AKUN'=>$this->db->escape_str($this->input->post('status-akun'))
                                );
                    $data2 = array(
                                  'NAMA_KURIR'=>$this->db->escape_str($this->input->post('nama')),
                                  'TELEPON'=>$this->db->escape_str($this->input->post('no_hp')),
                                  'ALAMAT'=>$this->db->escape_str($this->input->post('alamat'))
                                );
            }
            $where1 = array('USERNAME' => $this->input->post('id1'));
            $where2 = array('ID_KURIR' => $this->input->post('id2'));
            $this->model_app->update('users', $data1, $where1);
            $this->model_app->update('kurir', $data2, $where2);

            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Kurir <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect($this->uri->segment(1).'/kurir');

        }
        else{
          $this->db->select('*');
          $this->db->from('kurir');
          $this->db->join('users', 'kurir.ID_KURIR=users.ID_USERNYA');
          $this->db->like('LEVEL_USERS','kurir');
          $this->db->order_by('ID_KURIR','DESC');
          $data['record'] = $this->db->get()->result_array();
          $data['provinsi'] = $this->model_app->view_ordering('rb_provinsi','ID_PROVINSI','ASC');
          $this->template->load('administrator/template','administrator/mod_pengiriman/view_kurir',$data);
        }
    }

    function ganti_status_kurir(){
        cek_session_akses();
        if (isset($_POST['submit'])){       
                    
           $data = array('STATUS_AKUN'=>$this->input->post('status-akun'));
                        
            $where = array('USERNAME' => $this->input->post('a'));
            $this->model_app->update('users', $data, $where);
            $this->session->set_flashdata('pesan','
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data User <strong>Berhasil diupdate !!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            ');
            redirect('administrator/kurir');
        }else{
            redirect('administrator/kurir');
        }
    }

    function delete_kurir(){
        cek_session_akses();
        $where1 = array('USERNAME' => $this->uri->segment(3));
        $model = $this->db->query("SELECT * FROM users where USERNAME='".$this->uri->segment(3)."'")->row_array();
        unlink("asset/foto_user/".$model[FOTO]);
        $where2 = array('ID_KURIR' => $model[ID_USERNYA]);
        $this->model_app->delete('kurir',$where2);
        $this->model_app->delete('users',$where1);
        $this->session->set_flashdata('pesan','
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kurir <strong>Berhasil dihapus !!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect($this->uri->segment(1).'/kurir');
    }

    function detail_retur(){
        cek_session_akses();
        if (isset($_POST['proses'])){

            $kode=$this->input->post('kode');

            $data = array(
              'STATUS'=>1
            );

            $where = array('KODE_PENGIRIMAN' => $kode);
            $this->model_app->update('pengiriman', $data, $where);

            // STOK
            // $model_stok = $this->model_app->view_where('stok',array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => 0))->row();

            // $jumlah_total= $model_stok->JUMLAH_STOK + $this->input->post('jumlah');
            // $jumlah_keluar = $model_stok->STOK_KELUAR - $this->input->post('jumlah');
            // $jumlah_masuk = $model_stok->STOK_MASUK + $this->input->post('jumlah');

            // $data2 = array(
            //   'STOK_MASUK'=>$jumlah_masuk,
            //   'STOK_KELUAR'=>$jumlah_keluar,
            //   'JUMLAH_STOK'=>$jumlah_total
            // );
            // $where = array('ID_PRODUK' => $value['id_produk'],'ID_CABANG' => 0);
            // $this->model_app->update('stok', $data2, $where);

            $this->session->set_flashdata('pesan','
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Permintaan <strong>Berhasil diupdate !!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                ');
            redirect($this->uri->segment(1).'/detail_retur');

        }else{
          $data['title'] = 'Data Retur Barang';
          $data['dataRetur'] = $this->model_app->view_where_ordering('detail_pengiriman',array('JUMLAH_DIKEMBALIKAN !=' => 0),'ID_DET_PENGIRIMAN','DESC');
          $this->template->load('administrator/template','administrator/mod_pengiriman/view_retur',$data);
        }
    }


	function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}
}
