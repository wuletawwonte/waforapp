<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('user');


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



}