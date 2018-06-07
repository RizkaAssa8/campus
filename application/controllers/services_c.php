<?php 
 
class Services_c extends CI_Controller{
 
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

		$data['service_categories'] = $this->m_data->tampil_data('service_categories')->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vservices/view_isi_services', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_services(){
		$this->load->view('view_header_web');
		$this->load->view('vservices/view_input_services');
		$this->load->view('view_footer_web');
	}

	function add_services_action(){
		$id_srvc = $this->input->post('id_srvc');
		$name_srvc = $this->input->post('name_srvc');
		$price_perkg = $this->input->post('price_perkg');

		$data = array(
			'id_srvc' => $id_srvc,
			'name_srvc' => $name_srvc,
			'price_perkg' => $price_perkg
			);
		$this->m_data->input_data($data,'service_categories');
		$this->session->set_flashdata("sukses", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Adding service is success !!</div></div>");
		redirect('services_c');
	}

	function edit_services($idu){
		$where = array('id_srvc' => $idu);
		$data['service_categories'] = $this->m_data->edit_data($where,'service_categories')->result();
		$this->load->view('view_header_web');
		$this->load->view('vservices/view_edit_services',$data);
		$this->load->view('view_footer_web');
	}

	function update_services(){
		$this->load->model('m_data');
		$this->m_data->update_data_services();
		$this->session->set_flashdata("ubah", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Editing service is success !!</div></div>");
		redirect('services_c');
	}

	function detail_services($ids){
		$where = array('id_srvc' => $ids);
        $data['title'] = 'Detail of Service';
        $this->load->model('m_data');

	    $data['service_categories'] = $this->m_data->get_byid($where,'service_categories');
		$this->load->view('view_header_web');
		$this->load->view('vservices/view_detail_services',$data);
		$this->load->view('view_footer_web');
    }

    function delete_services($ids){
		$where = array('id_srvc' => $ids);
		$this->m_data->hapus_data($where,'service_categories');
		$this->session->set_flashdata("hapus", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Deleting service is success !!</div></div>");
		redirect('services_c');
	}

}