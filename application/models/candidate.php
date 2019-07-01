<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->db->from('candidates');
		$this->db->join('users', 'users.id = candidates.user_id');
		$data = $this->db->get();

		return $data->result_array();
	}

	public function add_candidate() {
		$data = array(
			'user_id' => $this->input->post('user_id') 
			);
		$this->db->insert('candidates', $data);

		return true;
	}

	public function candidates_count() {
		$data = $this->db->get('candidates');
		return $data->num_rows();
	}

	public function remove_candidate($id) {
		$this->db->where('user_id', $id);
		$this->db->delete('candidates');
	}

	public function check_candidate() {
		$this->db->where('user_id', $this->input->post('user_id'));
		$data = $this->db->get('candidates');

		if($data->num_rows > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function is_candidate() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$data = $this->db->get('candidates');

		if($data->num_rows() == 0){
			return false;
		} else {
			return true;
		}
	}












}