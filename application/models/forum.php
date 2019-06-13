<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->db->order_by('fid', 'DESC');
		$this->db->from('forums');
		$this->db->join('users', 'users.id = forums.user_id');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function get_one($fid) {
		$this->db->where('fid', $fid);
		$this->db->from('forums');
		$this->db->join('users', 'users.id = forums.user_id');
		$data = $this->db->get();
		$data = $data->result_array();

		return $data[0];
	}

	public function post_question() {
		$data = array(
			'forum_question' => $this->input->post('forum_question'), 
			'user_id' => $this->session->userdata('user_id')
			);
		$this->db->insert('forums', $data);
		return TRUE; 
	}


}
