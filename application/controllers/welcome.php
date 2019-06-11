<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('notice','comment'));


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

	public function notice($nid) {
		$data['notice'] = $this->notice->get_one($nid);
		$data['comments'] = $this->comment->get_comments($nid);
		$this->load->view('templates/header');
		$this->load->view('notice', $data);
		$this->load->view('templates/footer');		
	}

	public function comment() {
		$this->comment->add();
		redirect('welcome/notice/'.$this->input->post('nid'));
	}













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */