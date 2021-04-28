<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['logo']  = $this->model_app->view_where('logo',array('NAMA_WEB'=>'vaporhitz'))->row()->GAMBAR;
		$this->load->view('main/index',$data);
	}
}
