<?php 
 
class Customer_c extends CI_Controller{
 
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

		$data['customer'] = $this->m_data->tampil_data('customer')->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vcustomer/view_isi_customer', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_customer(){
		$this->load->view('view_header_web');
		$this->load->view('vcustomer/view_input_customer');
		$this->load->view('view_footer_web');
	}

	function add_customer_action(){
		$id_cst = $this->input->post('id_cst');
		$name_cst = $this->input->post('name_cst');
		$nohp_cst = $this->input->post('nohp_cst');

		$data = array(
			'id_cst' => $id_cst,
			'name_cst' => $name_cst,
			'nohp_cst' => $nohp_cst
			);
		$this->m_data->input_data($data,'customer');
		$this->session->set_flashdata("sukses", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Adding customer is success !!</div></div>");
		redirect('customer_c');
	}

	function edit_customer($idu){
		$where = array('id_cst' => $idu);
		$data['customer'] = $this->m_data->edit_data($where,'customer')->result();
		$this->load->view('view_header_web');
		$this->load->view('vcustomer/view_edit_customer',$data);
		$this->load->view('view_footer_web');
	}

	function update_customer(){
		$this->load->model('m_data');
		$this->m_data->update_data_customer();
		$this->session->set_flashdata("ubah", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Editing customer is success !!</div></div>");
		redirect('customer_c');
	}

	function detail_customer($ids){
		$where = array('id_cst' => $ids);
        $data['title'] = 'Detail of Customer';
        $this->load->model('m_data');

	    $data['customer'] = $this->m_data->get_byid($where,'customer');
		$this->load->view('view_header_web');
		$this->load->view('vcustomer/view_detail_customer',$data);
		$this->load->view('view_footer_web');
    }

    function delete_customer($ids){
		$where = array('id_cst' => $ids);
		$this->m_data->hapus_data($where,'customer');
		$this->session->set_flashdata("hapus", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Deleting customer is success !!</div></div>");
		redirect('customer_c');
	}

}