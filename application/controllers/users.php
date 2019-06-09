<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('user');
	}


	public function login() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if($this->form_validation->run()){
			$userdata = $this->user->get_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['first_name'].' '.$userdata['middle_name'],
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'user_type' => $userdata['user_type'],
				'last_visited' => time()
				);

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') == "Administrator") {

				redirect('admin/index');

			} else if($this->session->userdata('user_type') == "Student council") {
				redirect('student_council/index');
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


	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}












}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */