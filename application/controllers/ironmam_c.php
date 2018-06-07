<?php 
 
class Ironmam_c extends CI_Controller{
 
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

		$data['ironmam'] = $this->m_data->tampil_data('ironmam')->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vironmam/view_isi_ironmam', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_ironmam(){
		$this->load->view('view_header_web');
		$this->load->view('vironmam/view_input_ironmam');
		$this->load->view('view_footer_web');
	}

	function add_ironmam_action(){
		$id_irm = $this->input->post('id_irm');
		$name_irm = $this->input->post('name_irm');
		$nohp_irm = $this->input->post('nohp_irm');

		$data = array(
			'id_irm' => $id_irm,
			'name_irm' => $name_irm,
			'nohp_irm' => $nohp_irm
			);
		$this->m_data->input_data($data,'ironmam');
		$this->session->set_flashdata("sukses", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Adding ironmam is success !!</div></div>");
		redirect('ironmam_c');
	}

	function edit_ironmam($idu){
		$where = array('id_irm' => $idu);
		$data['ironmam'] = $this->m_data->edit_data($where,'ironmam')->result();
		$this->load->view('view_header_web');
		$this->load->view('vironmam/view_edit_ironmam',$data);
		$this->load->view('view_footer_web');
	}

	function update_ironmam(){
		$this->load->model('m_data');
		$this->m_data->update_data_ironmam();
		$this->session->set_flashdata("ubah", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Editing ironmam is success !!</div></div>");
		redirect('ironmam_c');
	}

	function detail_ironmam($ids){
		$where = array('id_irm' => $ids);
        $data['title'] = 'Detail of Ironmam';
        $this->load->model('m_data');

	    $data['ironmam'] = $this->m_data->get_byid($where,'ironmam');
		$this->load->view('view_header_web');
		$this->load->view('vironmam/view_detail_ironmam',$data);
		$this->load->view('view_footer_web');
    }

    function delete_ironmam($ids){
		$where = array('id_irm' => $ids);
		$this->m_data->hapus_data($where,'ironmam');
		$this->session->set_flashdata("hapus", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Deleting ironmam is success !!</div></div>");
		redirect('ironmam_c');
	}

}