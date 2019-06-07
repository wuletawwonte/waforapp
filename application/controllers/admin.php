<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department'));


		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('welcome/loginpage');
		} 

	}

	public function index() {
		$data['active_menu'] = 'dashboard';
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_home');
		$this->load->view('admin_templates/footer');
	}

	public function notices() {
		$data['active_menu'] = 'notices';		
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_notices');
		$this->load->view('admin_templates/footer');
	}

	public function create_student_view() {
		$data['active_menu'] = 'create_student';
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_create_student');
		$this->load->view('admin_templates/footer');
	}

	public function departments() {
		$data['active_menu'] = 'departments';
		$data['departments'] = $this->department->get_all(); 
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_departments');
		$this->load->view('admin_templates/footer');

	}

	public function create_department_view() {
		$data['active_menu'] = 'departments';
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_create_department_view');
		$this->load->view('admin_templates/footer');
	}

	public function create_department() {
		if($this->department->create()) {
			$this->session->set_flashdata('success', 'Success, New department successfully created.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to create new department.');
		}
		redirect('admin/departments');
	}

	public function edit_department_view($id) {
		$data['active_menu'] = 'departments';
		$data['department'] = $this->department->get_one($id);
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_edit_department_view', $data);
		$this->load->view('admin_templates/footer');		
	}

	public function edit_department() {
		if($this->department->edit($this->input->post('id'))) {
			$this->session->set_flashdata('success', 'Success, Department successfully edited.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to edit the department.');
		}
		redirect('admin/departments');		
	}


}