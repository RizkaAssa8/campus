<?php 
 
class User_c extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data'); //ini ntar sesuai sm kebutuhan?
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		// if(!$this->session->userdata('logged_in')){
  //      		 redirect('login_c');
		// 	}
	}
 
	function index(){
		$this->load->database();

		$data['user']= $this->db->query("select id_irm, name_irm, nohp_irm, id_cst, name_cst, nohp_cst from ironmam, customer")->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vuser/view_isi_user', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_user(){
		$this->load->view('view_header_web');
		$this->load->view('vuser/view_input_user');
		$this->load->view('view_footer_web');
	}

}