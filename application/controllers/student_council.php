<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_council extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department', 'cnfg', 'notice', 'forum'));

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('welcome/loginpage');
		} else if($this->session->userdata('user_type') == 'Administrator') {
			redirect('admin/index');
		} else if($this->session->userdata('user_type') == 'Student') {
			redirect('welcome/index');
		} 

	}

	public function index() {
		$data['active_menu'] = 'dashboard';
		$data['student_count'] = $this->user->get_student_count();
		$data['department_count'] = $this->department->get_department_count();
		$data['notice_count'] = $this->notice->get_notice_count();
		$data['forum_count'] = $this->forum->get_forum_count();
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

	public function delete_notice($nid) {
		if($this->notice->delete($nid)) {
			$this->session->set_flashdata('success', 'Success, Notice successfully Deleted.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to Delete the notice.');
		}
		redirect('student_council/notices');
	}

	public function settings() {
		$data['active_menu'] = 'settings';
		$data['candidate_approval_date'] = 'settings';
		$data['candidate_selection_date'] = 'settings';
		$data['student_council_amount'] = 'settings';

		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_settings');
		$this->load->view('student_council_templates/footer');		
	}


}