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
			// $this->db->where($data);
			// $this->db->update('users', array('last_login' => date('Y-m-d h:m:s')));
			return true;
		} else {
			return false;
		}
	}

	public function get_logged_in_user($attrib, $username) {
		$this->db->where($attrib, $username);
		$res = $this->db->get('users');
		$res = $res->result_array();
		return $res[0];
	}

	public function get_user($attrib, $username) {
		$this->db->where($attrib, $username);
		$this->db->from('users');
		$this->db->join('departments', 'departments.did = users.department');
		$res = $this->db->get();
		$res = $res->result_array();
		return $res[0];
	}

	public function get_notices_for_pagination($limit = NULL, $start = NULL) {

		$this->db->where('user_type', 'Student')->or_where('user_type', 'Student council');
		$this->db->order_by('id', 'DESC');
		$this->db->from('users');
        $this->db->limit($limit, $start);
		$this->db->join('departments', 'departments.did = users.department');
		$data = $this->db->get();
		if($data->num_rows() == 0) {
			return false; 
		} else {
			return $data->result_array();		
		}

	}

	public function get_all_students() {
		$this->db->where('user_type', 'Student')->or_where('user_type', 'Student council');
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
			'password' => md5('123456@'.$this->input->post('cgpa')),
			'email' => $this->input->post('email'),
			'sex' => $this->input->post('sex'),
			'department' => $this->input->post('department'),
			'year' => $this->input->post('year'),
			'cgpa' => $this->input->post('cgpa')
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
			'year' => $this->input->post('year'),
			'cgpa' => $this->input->post('cgpa')
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

	public function student_council_count() {
		$this->db->where('user_type', 'Student council');
		$data = $this->db->get('users');
		return $data->num_rows();
	}

	public function add_student_council() {
		$data = array('user_type' => 'Student council');
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->update('users', $data);
		return true;
	}

	public function get_student_count() {
		$this->db->where('user_type', 'Student')->or_where('user_type', 'Student council');
		$data = $this->db->get('users');

		return $data->num_rows();
	}

	public function remove_student_council($id) {
		$data = array('user_type' => 'Student');
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function change_avatar($avatar) {
		$data = array(
			'avatar' => $avatar 
			);
		$this->db->where('id', $this->session->userdata('user_id'));
		$this->db->update('users', $data);
	}

	public function change_password() {
		$data = array(
			'password' => md5($this->input->post('new_password'))
			);
		if($this->user_can_log_in($this->session->userdata('username'), $this->input->post('current_password'))) {
			$this->db->where('id', $this->session->userdata('user_id'));
			$this->db->update('users', $data);
			return true;
		} else {
			return false;
		}
	}

	public function change_all_password() {
		$data = array(
			'password' =>  md5('123456')
			);
		$this->db->update('users', $data);
	}

	public function check_eligibility() {
		$this->db->where('id', $this->session->userdata('user_id'));
		$data = $this->db->get('users');
		$data = $data->result_array()[0];

		return $data['vote_status'];
	}

	public function unset_student_council() {
		$this->db->where('user_type', "Student council");
		$this->db->update('users', array('user_type' => 'Student'));
		$this->db->where('user_type', "Student");
		$this->db->update('users', array('vote_status' => "0"));

		return true;
	}

	public function set_student_council($uid) {
		$this->db->where('id', $uid);
		$this->db->update('users', array('user_type' => 'Student council'));

		return true;
	}

	public function import_data($data) {
 
        $res = $this->db->insert_batch('users',$data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
 
    }	

    public function delete_user($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('users');

    	$this->db->where('user_id', $id);
    	$this->db->delete('pre_candidates');

    	$this->db->where('user_id', $id);
    	$this->db->delete('notices');

    	$this->db->where('user_id', $id);
    	$this->db->delete('forums');

    	$this->db->where('commenter_id', $id);
    	$this->db->delete('comments');

    	$this->db->where('user_id', $id);
    	$this->db->delete('candidates');

    	$this->db->where('user_id', $id);
    	$this->db->delete('answers');

    	$this->db->where('user_id', $id);
    	$this->db->delete('advertisements');

    	return true;
    }

    public function reset_password($id) {
    	$this->db->where('id', $id);
		$data = $this->db->get('users');
		$data = $data->result_array()[0];    	

    	$this->db->where('id', $id);
    	$this->db->update('users', array('password' => md5('123456@'.$data['cgpa'])));

    	return TRUE;
    }

	public function m_check_eligibility() {
		$this->db->where('id', $this->input->post('user_id'));
		$data = $this->db->get('users');
		$data = $data->result_array()[0];

		return $data['vote_status'];
	}












}