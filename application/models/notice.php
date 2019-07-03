<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->db->where('status', '1');
		$this->db->order_by('nid', 'DESC');
		$this->db->from('notices');
		$this->db->join('users', 'users.id = notices.user_id');
		$data = $this->db->get();
		if($data->num_rows() == 0) {
			return false;
		} else {
			return $data->result_array();
		}
	}

	public function get_search_result_notices($key) {
		$this->db->where('match(content) against ("'. $key .'" IN BOOLEAN MODE)');
		$this->db->or_where('match(title) against ("'. $key .'" IN BOOLEAN MODE)');
		$this->db->order_by('nid', 'DESC');
		$this->db->from('notices');
		$this->db->join('users', 'users.id = notices.user_id');
		$data = $this->db->get();

		if($data->num_rows() == 0) {
			return false;
		} else {
			return $data->result_array();
		}

	}

	public function get_notices_for_pagination($limit = NULL, $start = NULL) {

		$this->db->order_by('nid', 'DESC');
		$this->db->from('notices');
        $this->db->limit($limit, $start);
		$this->db->join('users', 'users.id = notices.user_id');
		$data = $this->db->get();

		if($data->num_rows() == 0) {
			return false;
		} else {
			return $data->result_array();
		}

	}

	public function get_few() {
		$this->db->where('status', '1');
		$this->db->order_by('nid', 'DESC');
		$this->db->limit(4);
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

	public function get_notice_count() {
		$data = $this->db->get('notices');
		return $data->num_rows();
	}

	public function get_search_result_notice_count($key = NULL) {
		$this->db->where('match(content) against ("'. $key .'" IN BOOLEAN MODE)');
		$data = $this->db->get('notices');
		return $data->num_rows();
	}

	public function get_one($id) {
		$this->db->where('nid', $id);
		$this->db->from('notices');
		$this->db->join('users', 'users.id = notices.user_id');
		$data = $this->db->get();
		$data = $data->result_array();

		return $data[0];
	}

	public function edit() {
		$data = array(
			'title' => $this->input->post('title'), 
			'content' => $this->input->post('content')
			);
		$this->db->where('nid', $this->input->post('nid'));
		$this->db->update('notices', $data);
		return true;
	}

	public function delete($nid) {
		$this->db->where('nid', $nid);
		$this->db->delete('notices');
		$this->db->where('notice_id', $nid);
		$this->db->delete('comments');
		return true;
	}



















}


