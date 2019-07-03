<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all($key = NULL) {
		if($key != NULL) {
			$this->db->where('match(forum_question) against ("'. $key .'" IN BOOLEAN MODE)');
		}
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

	public function get_forum_count() {
		$data = $this->db->get('forums');
		return $data->num_rows();
	}

	public function get_few() {
		$this->db->order_by('fid', 'DESC');
		$this->db->limit('4');
		$this->db->from('forums');
		$this->db->join('users', 'users.id = forums.user_id');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function m_post_question() {
		$data = array(
			'forum_question' => $this->input->post('forum_question'), 
			'user_id' => $this->input->post('user_id')
			);
		$this->db->insert('forums', $data);
		return TRUE; 
	}




}
