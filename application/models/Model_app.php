<?php 

class Model_app extends CI_model{

    public function getKota($searchTerm=""){

        // Fetch nama kota
        $this->db->select('*');
        $this->db->where("NAMA_KOTA like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('rb_kota');
        $kotas = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach($kotas as $kota){
        $data[] = array("id"=>$kota['ID_KOTA'], "text"=>$kota['NAMA_KOTA']);
        }
        return $data;
    }

    public function getMenu($searchTerm=""){

        // Fetch nama kota
        $this->db->select('*');
        $this->db->where("ID_MENU like '%".$searchTerm."%' ");
        $this->db->or_where("NAMA_MENU like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get('menu');
        $menus = $fetched_records->result_array();

        // Initialize Array with fetched data
        $data = array();
        foreach($menus as $menu){
        $data[] = array("id"=>$menu['ID_MENU'], "text"=>$menu['ID_MENU'].' | '.$menu['NAMA_MENU']);
        }
        return $data;
    }

    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table,$data,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where_field($table1,$table2,$field1,$field2,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
    }

    function grafik_top_pembeli(){
        //pakai ini jika ingin menggunakan tahun
        // return $this->db->query("SELECT count(id_pembeli) as jumlah, id_pembeli  FROM rb_penjualan WHERE status_penjual='reseller' AND status_pembeli='konsumen' AND YEAR(waktu_transaksi)='".date('Y')."' GROUP BY id_pembeli ORDER BY jumlah DESC LIMIT 10");

        return $this->db->query("SELECT count(id_pembeli) as jumlah, id_pembeli  FROM rb_penjualan WHERE status_penjual='reseller' AND status_pembeli='konsumen' GROUP BY id_pembeli ORDER BY jumlah DESC LIMIT 10");
    }

    function grafik_penjualan_reseller(){
        return $this->db->query("SELECT r.kota_id AS kota, t.waktu_transaksi, d.id_produk AS produk, SUM(d.jumlah) AS jumlah
                FROM rb_penjualan t 
                JOIN rb_penjualan_detail d ON (d.id_penjualan = t.id_penjualan) 
                JOIN rb_member r ON (r.id_member = t.id_penjual) 
                WHERE t.status_penjual='reseller' 
                GROUP BY d.id_produk
                ORDER BY jumlah DESC 
                ");
    }

    function kategori_populer($limit){
        return $this->db->query("SELECT * FROM (SELECT a.*, b.jum_dibaca FROM
                                    (SELECT * FROM kategori) as a left join
                                    (SELECT id_kategori, sum(dibaca) as jum_dibaca FROM berita GROUP BY id_kategori) as b on a.id_kategori=b.id_kategori) as c 
                                        where c.aktif='Y' ORDER BY c.jum_dibaca DESC LIMIT $limit");
    }
}