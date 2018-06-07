<?php 
 
class Order_c extends CI_Controller{
 
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

		$data['order_']=$this->m_data->selectAll('order_')->result();
		
		$data['orders_']= $this->db->query("select * from order_ JOIN customer ON customer.id_cst=order_.id_cst JOIN ironmam on ironmam.id_irm=order_.id_irm JOIN service_categories ON service_categories.id_srvc=order_.id_srvc JOIN status_order on status_order.id_ordstatus=order_.id_ordstatus")->result();

		$this->load->view('view_header_web', $data);
		$this->load->view('vorder/view_isi_order', $data);
		$this->load->view('view_footer_web', $data);
	}

	function add_order(){
		$data=array(
			'name_cst' => $this->m_data->get_option1(),
			'name_irm' => $this->m_data->get_option2(),
			'name_srvc' => $this->m_data->get_option3(),
			'name_ordstatus' => $this->m_data->get_option4()
		);
		$this->load->view('view_header_web');
		$this->load->view('vorder/view_input_order', $data);
		$this->load->view('view_footer_web');
	}

	function add_order_action(){
		$name_cst = $this->input->post('name_cst');
		$name_irm = $this->input->post('name_irm');
		$name_srvc = $this->input->post('name_srvc');
		$date_srvc = $this->input->post('date_srvc');
		$name_ordstatus = $this->input->post('name_ordstatus');
		$is_paid = $this->input->post('is_paid');

		$data = array(
			'id_cst' => $name_cst,
			'id_irm' => $name_irm,
			'id_srvc' => $name_srvc,
			'date_srvc' => $date_srvc,
			'id_ordstatus' => $name_ordstatus,
			'is_paid' => $is_paid
		);

		$this->m_data->input_data($data,'order_');
		$this->session->set_flashdata("sukses", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Adding order is success !!</div></div>");
		redirect('order_c');
	}

	function edit_order($ido){
		$where = array('id_order' => $ido);
		$get = $this->m_data->edit_datao($where, 'order_')->result();
		$name_cst = $this->m_data->get_option1();
		$name_irm = $this->m_data->get_option2();
		$name_srvc = $this->m_data->get_option3();
		$name_ordstatus = $this->m_data->get_option4();

		$data=array(
			'get' => $get,
			'name_cst' => $name_cst,
			'name_irm' => $name_irm,
			'name_srvc' => $name_srvc,
			'name_ordstatus' => $name_ordstatus
			);

		$this->load->view('view_header_web');
		$this->load->view('vorder/view_edit_order',$data);
		$this->load->view('view_footer_web');
	}

	function update_order(){
		$this->load->model('m_data');
		$this->m_data->update_data_order();
		$this->session->set_flashdata("ubah", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Editing order is success !!</div></div>");
		redirect('order_c');
	}

	function detail_order($ids){
		$where = array('id_order' => $ids);
        $data['title'] = 'Detail of Order';
        $this->load->model('m_data');

	    // $data['order_'] = $this->m_data->get_byid($where,'order_');
	    $data['orders_']= $this->db->query("select * from order_ JOIN customer ON customer.id_cst=order_.id_cst JOIN ironmam on ironmam.id_irm=order_.id_irm JOIN service_categories ON service_categories.id_srvc=order_.id_srvc JOIN status_order on status_order.id_ordstatus=order_.id_ordstatus WHERE order_.id_order=".$ids)->result();
		$this->load->view('view_header_web');
		$this->load->view('vorder/view_detail_order',$data);
		$this->load->view('view_footer_web');
    }

    function delete_order($ido){
		$where = array('id_order' => $ido);
		$this->m_data->hapus_data($where,'order_');
		$this->session->set_flashdata("hapus", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\"><i class=\"icon fa fa-check\"></i>Deleting order is success !!</div></div>");
		redirect('order_c');
	}

}