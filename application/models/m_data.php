<?php 
 
class M_data extends CI_Model{

	function tampil_data($table){
		return $this->db->get($table);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data_services(){
		$data = array(
			'name_srvc' => $this->input->post('name_srvc'),
			'price_perkg' => $this->input->post('price_perkg')
			);
		$ids = $this->input->post('id_srvc');
        $this->db->where('id_srvc', $ids);
        $this->db->update('service_categories', $data);
	}

	function get_byid($where,$table) {
		$this->db->from($table);
		$this->db->where($where);
		        
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function selectAll($table){
		return $this->db->get($table);
   }

   	function get_option1() {
		 $this->db->select('*');
		 $this->db->from('customer');
		 $query = $this->db->get();
		 return $query->result();
	}

	function get_option2() {
		 $this->db->select('*');
		 $this->db->from('ironmam');
		 $query = $this->db->get();
		 return $query->result();
	}

	function get_option3() {
		 $this->db->select('*');
		 $this->db->from('service_categories');
		 $query = $this->db->get();
		 return $query->result();
	}

	function get_option4() {
		 $this->db->select('*');
		 $this->db->from('status_order');
		 $query = $this->db->get();
		 return $query->result();
	}

	function edit_datao($where,$table){		
		$q = $this->db->join('customer','customer.id_cst=order_.id_cst');
		$q = $this->db->join('ironmam','ironmam.id_irm=order_.id_irm');
		$q = $this->db->join('service_categories','service_categories.id_srvc=order_.id_srvc');
		$q = $this->db->join('status_order','status_order.id_ordstatus=order_.id_ordstatus');
		return $this->db->get_where($table,$where);
	}

	function update_data_order(){
		$ido = $this->input->post('id_order');
		$data = array(
			'id_cst' => $this->input->post('id_cst'),
			'id_irm' => $this->input->post('id_irm'),
			'id_srvc' => $this->input->post('id_srvc'),
			'date_srvc' => $this->input->post('date_srvc'),
			'id_ordstatus' => $this->input->post('id_ordstatus')
			);
        $this->db->where('id_order', $ido);
        $this->db->update('order_', $data);
	}

	function update_data_admin(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
			);
		$ids = $this->input->post('id_admin');
        $this->db->where('id_admin', $ids);
        $this->db->update('admin', $data);
	}

	function update_data_ironmam(){
		$data = array(
			'name_irm' => $this->input->post('name_irm'),
			'nohp_irm' => $this->input->post('nohp_irm')
			);
		$ids = $this->input->post('id_irm');
        $this->db->where('id_irm', $ids);
        $this->db->update('ironmam', $data);
	}
    
    function update_data_customer(){
		$data = array(
			'name_cst' => $this->input->post('name_cst'),
			'nohp_cst' => $this->input->post('nohp_cst')
			);
		$ids = $this->input->post('id_cst');
        $this->db->where('id_cst', $ids);
        $this->db->update('customer', $data);
	}
}