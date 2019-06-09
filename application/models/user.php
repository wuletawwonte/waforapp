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
		$this->db->where('user_type', 'student')->or_where('user_type', 'student_council');
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
			'username' => strtolower($this->input->post('first_name')).'.'.strtolower($this->input->post('middle_name')),
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
			'username' => strtolower($this->input->post('first_name')).'.'.strtolower($this->input->post('middle_name')),
			'email' => $this->input->post('email'), 
			'sex' => $this->input->post('sex'), 
			'department' => $this->input->post('department'),
			'year' => $this->input->post('year')
			);

		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}

	public function get_student_councils() {
		$this->db->where('user_type', 'Student council');
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

	public function get_non_student_councils() {
		$this->db->where("user_type", 'Student');
		$this->db->from('users');
		$data = $this->db->get();
		if($data->num_rows() == 0) {
			return false; 
		} else {
			return $data->result_array();		
		}		
	}

	public function add_student_council() {
		$data = array('user_type' => 'Student council');
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->update('users', $data);
	}




}