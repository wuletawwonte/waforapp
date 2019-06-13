<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function post() {
		$data = array(
			'answer_content' => $this->input->post('answer_content'),
			'forum_id' => $this->input->post('fid'),
			'user_id' => $this->session->userdata('user_id') 
			);
		$this->db->insert('answers', $data);
	}

	public function get_answers($fid) {
		$this->db->where('forum_id', $fid);
		$this->db->order_by('aid', 'DESC');
		$this->db->from('answers');
		$this->db->join('users', 'users.id = answers.user_id');
		$data = $this->db->get();

		return $data->result_array();
	}


}

