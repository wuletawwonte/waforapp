<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_council extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department', 'cnfg', 'notice'));

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('welcome/loginpage');
		} else if($this->session->userdata('user_type') == 'Administrator') {
			redirect('admin/index');
		}

	}

	public function index() {
		$data['active_menu'] = 'dashboard';
		$data['student_count'] = $this->user->get_student_count();
		$data['department_count'] = $this->department->get_department_count();
		$data['notice_count'] = $this->notice->get_notice_count();
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_home', $data);
		$this->load->view('student_council_templates/footer');
	}

	public function notices() {
		$data['active_menu'] = 'notices';
		$data['notices'] = $this->notice->get_all();
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_notices', $data);
		$this->load->view('student_council_templates/footer');
	}

	public function create_notice_view() {
		$data['active_menu'] = 'notices';
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_create_notice');
		$this->load->view('student_council_templates/footer');
	}

	public function create_notice() {

		if($this->notice->create()) {
			$this->session->set_flashdata('success', 'Success, Notice successfully posted.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to post the notice.');
		}
		redirect('student_council/notices');
	}

	public function edit_notice_view($id) {
		$data['active_menu'] = 'notices';
		$data['notice'] = $this->notice->get_one($id);
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_edit_notice', $data);
		$this->load->view('student_council_templates/footer');

	}

	public function edit_notice() {
		if($this->notice->edit()) {
			$this->session->set_flashdata('success', 'Success, Notice successfully edited.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to edit the notice.');
		}
		redirect('student_council/notices');
	}


}