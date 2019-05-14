<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if($this->session->userdata('is_logged_in') == TRUE) {
			redirect('admin/index');
		} 


	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('homepage');
		$this->load->view('templates/footer');
	}


	public function loginpage() {
		$this->load->view('loginpage');
	}













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */