<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct() {
		parent::__construct();

		
	}

	public function user_can_log_in($username, $password) {

		$data = array(
			'username' => $username ,
			'password' => md5($password)
			);
		
		$this->db->where($data);
		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			return true;
		} else {
			return false;
		}
	}

	public function get_user($attrib, $username) {
		$this->db->where($attrib, $username);
		$res = $this->db->get('users');
		$res = $res->result_array();
		return $res[0];
	}

	public function get_all_students() {
		$this->db->where('user_type', 'student');
		$this->db->order_by('id', 'DESC');
		$this->db->from('users');
		$this->db->join('departments', 'departments.did = users.department');
		$data = $this->db->get();
		if($data->num_rows() == 0) {
			return false; 
		} else {
			return $data->result_array();		
		}
	}

	public function create() {
		$data = array(
			'id_number' => $this->input->post('id_number'),
			'first_name' => $this->input->post('first_name'), 
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'username' => $this->input->post('first_name').".".$this->input->post('middle_name'),
			'password' => md5('123456'),
			'email' => $this->input->post('email'),
			'sex' => $this->input->post('sex'),
			'department' => $this->input->post('department'),
			'year' => $this->input->post('year')
			);
		$this->db->insert('users', $data);
		return true;
	}


	public function get_one($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('users');
		
		if($data->num_rows() == 0) {
			return false;
		} else {
			return $data->result_array()[0];
		}
	}

	public function edit($id) {
		$data = array(
			'id_number' => $this->input->post('id_number'), 
			'first_name' => $this->input->post('first_name'), 
			'middle_name' => $this->input->post('middle_name'), 
			'last_name' => $this->input->post('last_name'), 
			'email' => $this->input->post('email'), 
			'sex' => $this->input->post('sex'), 
			'department' => $this->input->post('department'),
			'year' => $this->input->post('year')
			);

		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}




	// public function add() {
	// 	$data = array(
	// 		'firstname' => $this->input->post('firstname'), 
	// 		'lastname' => $this->input->post('lastname'), 
	// 		'username' => $this->input->post('username'), 
	// 		'password' => md5($this->input->post('password')), 
	// 		'role' => $this->input->post('role'), 
	// 		'church' => $this->input->post('church'), 
	// 		'user_type' => 'administrator' 
	// 		);
	// 	if($this->db->insert('users', $data)) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function update_user() {
	// 	$data = array(
	// 		'firstname' => $this->input->post('firstname'), 
	// 		'lastname' => $this->input->post('lastname'), 
	// 		'username' => $this->input->post('username'), 
	// 		'role' => $this->input->post('role'), 
	// 		'church' => $this->input->post('church'), 
	// 		'user_type' => 'administrator' 
	// 		);
	// 	$this->db->where('id', $this->input->post('id'));
	// 	if($this->db->update('users', $data)) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function get_all() {
	// 	$res = $this->db->get('users');
	// 	return $res->result_array();
	// }

	// public function get_my($attrib) {
	// 	$this->db->where('username', $this->session->userdata('username'));
	// 	$data = $this->db->get('users');
	// 	$data = $data->result_array(); 

	// 	return $data[0][$attrib];
	// }

	// public function edit_one($attrib, $value) {
	// 	$data = array(
	// 		$attrib => $value
	// 		);
	// 	$this->db->where('username', $this->session->userdata('username'));
	// 	$this->db->update('users', $data);
	// }




}