<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'notice', 'forum'));
	}

	public function login() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if($this->form_validation->run()){
			$userdata = $this->user->get_logged_in_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['first_name'].' '.$userdata['middle_name'],
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'user_type' => $userdata['user_type'],
				'user_id' => $userdata['id'],
				'avatar' => $userdata['avatar']
				);

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') === "Administrator") {
				redirect('admin/index');
			} else if($this->session->userdata('user_type') === "Student council") {
				$this->session->set_userdata('department', $userdata['name']);
				redirect('student_council/index');
			} else if($this->session->userdata('user_type') === "Student") {
				$this->session->set_userdata('department', $userdata['name']);
				redirect('welcome/index');
			} else {
				$this->session->unset_userdata('is_logged_id');
				$this->session->set_flashdata("error", "Username or password incorrect.");
				redirect('welcome/loginpage');
			}

		} else {
			$this->session->unset_userdata('is_logged_id');
			$this->session->set_flashdata("error", "Username or password incorrect.");
			redirect('welcome/loginpage');
		}	

	}

	public function validate_user_credentials() {

		if($this->user->user_can_log_in($this->input->post('username'), $this->input->post('password'))) {
			return true;
		} else {
			return false;
		}

	}


	public function logout($backto) {
		$this->session->sess_destroy();
		if($backto == "homepage") {
			redirect('welcome/index');
		} else {
			redirect('welcome/loginpage');
		}
	}




	public function m_login() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		$data = [];

		if($this->form_validation->run()){
			$userdata = $this->user->get_logged_in_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['first_name'].' '.$userdata['middle_name'],
				'username' => $this->input->post('username'),
				'status' => "loggedin",
				'user_type' => $userdata['user_type'],
				'user_id' => $userdata['id'],
				'avatar' => $userdata['avatar']
				);

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') === "Student" || $this->session->userdata('user_type') === "Student council") {
				echo json_encode($data);
			} else {
				$data['status'] = "error";
				echo json_encode($data);
			}

		} else {
			$data['status'] = "error";
			echo json_encode($data);
		}	

	}

	public function m_notices() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data = $this->notice->get_all();
		echo json_encode($data);
	}

	public function m_forums() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data = $this->forum->get_all();
		echo json_encode($data);
	}

	// public function m_get_user() {
	// 	header("Access-Control-Allow-Origin: *");
	// 	header("Content-Type: application/json");
	// 	$data[] = $this->session->userdata('status');
	// 	echo json_encode($data);
	// }








}

