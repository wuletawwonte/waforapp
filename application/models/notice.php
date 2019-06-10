<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$this->db->from('notices');
		$this->db->join('users', 'users.id = notices.user_id');
		$data = $this->db->get();
		if($data->num_rows() == 0) {
			return false;
		} else {
			return $data->result_array();
		}
	}

	public function create() {
		$data = array(
			'title' => $this->input->post('title'), 
			'content' => $this->input->post('content'),
			'user_id' => $this->session->userdata('user_id')
			);
		$this->db->insert('notices', $data);
		return true;
	}


















}


