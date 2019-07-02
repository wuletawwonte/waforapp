<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model {

	public function __construct() {
		parent::__construct();
	}


	public function add() {
		$data = array(
			'commenter_id' => $this->session->userdata('user_id'), 
			'notice_id' => $this->input->post('nid'),
			'comment_content' => $this->input->post('comment_content')
			);
		$this->db->insert('comments', $data);
		return true;
	}

	public function get_comments($nid) {
		$this->db->where('notice_id', $nid);
		$this->db->from('comments');
		$this->db->join('users', 'users.id = comments.commenter_id');
		$data = $this->db->get();
		$data = $data->result_array();

		return $data;
	}

	public function m_add() {
		$data = array(
			'commenter_id' => $this->input->post('user_id'), 
			'notice_id' => $this->input->post('nid'),
			'comment_content' => $this->input->post('comment_content')
			);
		$this->db->insert('comments', $data);
		return true;
	}








}

