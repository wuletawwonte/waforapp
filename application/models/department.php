<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function create() {
		$data = array(
			'code' => $this->input->post('code'), 
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description')
			);
		$this->db->insert('departments', $data);
		return true;
	}

	public function get_all() {
		$this->db->order_by('created', 'DESC');
		$data = $this->db->get('departments');
		if($data->num_rows() == 0) {
			return true;
		} else {
			return $data->result_array();
		}
	}

	public function get_one($id) {
		$this->db->where('did', $id);
		$data = $this->db->get('departments');

		return $data->result_array()[0];
	}

	public function edit($id) {
		$data = array(
			'code' => $this->input->post('code'), 
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description')
			);

		$this->db->where('did', $id);
		$this->db->update('departments', $data);
		return true;
	}


}
