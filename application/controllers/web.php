<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
			$this->load->model('m_data');
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');

			if($this->session->userdata('status') != "login"){
			redirect(base_url("login_c"));
		}
	}
 
	public function index(){
		$this->load->view('view_header_web');
		$this->load->view('view_main');
		$this->load->view('view_footer_web');

	}
}