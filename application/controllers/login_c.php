<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_c extends CI_Controller {
	
	function __construct(){
		parent::__construct();
			$this->load->model('m_login');
			$this->load->helper(array('form','url'));
			$this->load->library('session');
	}
 
	public function index(){
		$this->load->view('view_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'username' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("web"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login_c'));
	}

}