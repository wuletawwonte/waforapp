<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_candidate extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function check_user() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$data = $this->db->get('pre_candidates');
		if($data->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function request_candidate() {
		$data = array('user_id' => $this->session->userdata('user_id'));
		$this->db->insert('pre_candidates', $data);
		return true;
	}

	public function cancel_request_candidate() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->delete('pre_candidates');
		return true;		
	}

	public function get_all() {
		$this->db->from('pre_candidates');
		$this->db->join('users', 'users.id = pre_candidates.user_id');
		$data = $this->db->get();
		$data = $data->result_array();

		return $data;
	}

	public function unset_all() {
		$this->db->empty_table('pre_candidates'); 	
	}

	public function m_check_user() {
		$this->db->where('user_id', $this->input->post('user_id'));
		$data = $this->db->get('pre_candidates');
		if($data->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function m_request_candidate() {
		$data = array('user_id' => $this->input->post('user_id'));
		$this->db->insert('pre_candidates', $data);
		return true;
	}

	public function m_cancel_candidate_request() {
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->delete('pre_candidates');
		return true;		
	}







}
