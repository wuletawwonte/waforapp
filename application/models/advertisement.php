<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all($limit = NULL, $start = NULL) {
		$this->db->from('advertisements');
		$this->db->order_by('ad_id', 'DESC');
        $this->db->limit($limit, $start);
		$this->db->join('users', 'users.id = advertisements.user_id');
		$data = $this->db->get();

		return $data->result_array();
	}

	public function add() {
		$data = array(
			'user_id' => $this->session->userdata('user_id'), 
			'ad_content' => $this->input->post('ad_content')
			);
		$this->db->insert('advertisements', $data);
		
		return true;
	}

	public function get_advertisement_count() {
		$data = $this->db->get('advertisements');

		return $data->num_rows();
	}



}