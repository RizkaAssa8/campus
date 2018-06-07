<?php 
 
class Admin_c extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		// if(!$this->session->userdata('logged_in')){
  //      		 redirect('login_c');
		// 	}
	}
 
	function index(){
		$this->load->database();

		$data['admin'] = $this->m_data->tampil_data('admin')->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vadmin/view_isi_admin', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_admin(){
		$this->load->view('view_header_web');
		$this->load->view('vadmin/view_input_admin');
		$this->load->view('view_footer_web');
	}

	function add_admin_action(){
		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = array(
			'id_admin' => $id_admin,
			'username' => $username,
			'password' => $password
			);
		$this->m_data->input_data($data,'admin');
		$this->session->set_flashdata("sukses", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Adding admin is success !!</div></div>");
		redirect('admin_c');
	}

	function edit_admin($idu){
		$where = array('id_admin' => $idu);
		$data['admin'] = $this->m_data->edit_data($where,'admin')->result();
		$this->load->view('view_header_web');
		$this->load->view('vadmin/view_edit_admin',$data);
		$this->load->view('view_footer_web');
	}

	function update_admin(){
		$this->load->model('m_data');
		$this->m_data->update_data_admin();
		$this->session->set_flashdata("ubah", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Editing admin is success !!</div></div>");
		redirect('admin_c');
	}

	function detail_admin($ids){
		$where = array('id_admin' => $ids);
        $data['title'] = 'Detail of Admin';
        $this->load->model('m_data');

	    $data['admin'] = $this->m_data->get_byid($where,'admin');
		$this->load->view('view_header_web');
		$this->load->view('vadmin/view_detail_admin',$data);
		$this->load->view('view_footer_web');
    }

    function delete_admin($ids){
		$where = array('id_admin' => $ids);
		$this->m_data->hapus_data($where,'admin');
		$this->session->set_flashdata("hapus", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Deleting admin is success !!</div></div>");
		redirect('admin_c');
	}

}