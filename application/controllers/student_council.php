<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_council extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department', 'cnfg'));

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('welcome/loginpage');
		} else if($this->session->userdata('user_type') == 'Administrator') {
			redirect('admin/index');
		}

	}

	public function index() {
		$data['active_menu'] = 'dashboard';
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_home');
		$this->load->view('student_council_templates/footer');
	}



}