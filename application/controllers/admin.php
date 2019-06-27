<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department', 'cnfg', 'notice', 'forum'));


		if($this->session->userdata('is_logged_in') != TRUE) {
			redirect('welcome/loginpage');
		} else if($this->session->userdata('user_type') == 'Student council') {
			redirect('student_council/index');
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
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_home');
		$this->load->view('admin_templates/footer');
	}

	public function notices() {
		$data['active_menu'] = 'notices';		
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_notices');
		$this->load->view('admin_templates/footer');
	}

	public function create_student_view() {
		$data['active_menu'] = 'students';
		$data['departments'] = $this->department->get_all();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_create_student_view');
		$this->load->view('admin_templates/footer');
	}

	public function departments() {
		$data['active_menu'] = 'departments';
		$data['departments'] = $this->department->get_all(); 
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_departments');
		$this->load->view('admin_templates/footer');

	}

	public function create_department_view() {
		$data['active_menu'] = 'departments';
		$this->load->view('admin_templates/header', $data);
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

	public function create_student() {
		if($this->user->create()) {
			$this->session->set_flashdata('success', 'Success, New student account successfully created.');	
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to create new student record.');			
		}
		redirect('admin/students');
	}

	public function edit_department_view($id) {
		$data['active_menu'] = 'departments';
		$data['department'] = $this->department->get_one($id);
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_edit_department_view', $data);
		$this->load->view('admin_templates/footer');		
	}

	public function edit_student_view($id) {
		$data['active_menu'] = 'students';
		$data['student'] = $this->user->get_one($id);
		$data['departments'] = $this->department->get_all();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_edit_student_view', $data);
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

	public function edit_student() {
		if($this->user->edit($this->input->post('id'))) {
			$this->session->set_flashdata('success', 'Success, Student record successfully edited.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to edit the student record.');
		}
		redirect('admin/students');		
	}

	public function students() {
		$data['active_menu'] = 'students';
		$data['students'] = $this->user->get_all_students();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_students', $data);
		$this->load->view('admin_templates/footer');				
	}

	public function settings() {
		$data['active_menu'] = 'settings';
		$data['system_name'] = $this->cnfg->get('system_name');
		$data['system_name_short'] = $this->cnfg->get('system_name_short');
		$data['default_password'] = $this->cnfg->get('default_password');
		$data['student_council_amount'] = $this->cnfg->get('student_council_amount');
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_settings', $data);
		$this->load->view('admin_templates/footer');						
	}

	public function student_councils() {
		$data['active_menu'] = 'student_councils';
		$data['student_councils'] = $this->user->get_student_councils();
		$data['students'] = $this->user->get_non_student_councils();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_student_councils', $data);
		$this->load->view('admin_templates/footer');						
	}

	public function add_student_council() {
		$this->user->add_student_council();

		redirect('admin/student_councils');
	}

	public function remove_student_council($id) {
		$this->user->remove_student_council($id);
		redirect('admin/student_councils');
	}

	public function profile() {
		$data['active_menu'] = '';
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_profile');
		$this->load->view('admin_templates/footer');								
	}

	public function change_password() {
		if($this->user->change_password()) {
			$this->session->set_flashdata('success', "Success, Your password succesfuly updated.");
		} else {
			$this->session->set_flashdata('error', "Sorry, Unable to update ur password.");
		}
		redirect('admin/profile');
	}


	public function update_profile() {
		$config['upload_path'] = './assets/img/profile_pictures/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '200';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());

			$this->user->change_avatar($data['upload_data']['file_name']);
			$this->session->set_userdata('avatar', $data['upload_data']['file_name']);
			$this->session->set_flashdata('success', "Your Account Succesffulyy updated.");
		}
		redirect('admin/profile');
	}



}