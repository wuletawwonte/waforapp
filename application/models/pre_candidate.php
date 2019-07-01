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





}
