<?php 
class Auth extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}

	function registrasi($username,$password)
	{
		$data_user = array(
			'USERNAME'=>$username,
			'PASSWORD'=>md5($password),
		);
		$this->db->insert('users',$data_user);
	}

	function cek_login($table, $where)
	{
		return $this->db->get_where($table,$where);
	}
}
?>