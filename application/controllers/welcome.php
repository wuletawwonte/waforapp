<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('notice');


	}

	public function index()
	{
		$data['notices'] = $this->notice->get_all();
		$this->load->view('templates/header');
		$this->load->view('homepage', $data);
		$this->load->view('templates/footer');
	}


	public function loginpage() {
		if($this->session->userdata('is_logged_in') == TRUE) {
			if($this->session->userdata('user_type') == "Administrator") {
				redirect('admin/index');
			} else if($this->session->userdata('user_type') == "Student council") {
				redirect('student_council/index');
			} else {
				redirect();
			}
		} else {
			$this->load->view('loginpage');
		}
	}













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */