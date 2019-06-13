<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('notice','comment', 'forum', 'user', 'answer'));


	}

	public function index()
	{
		$data['active_menu'] = "notices";		
		$data['notices'] = $this->notice->get_all();
		$this->load->view('templates/header', $data);
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
		$data['active_menu'] = "notices";
		$data['notice'] = $this->notice->get_one($nid);
		$data['comments'] = $this->comment->get_comments($nid);
		$this->load->view('templates/header', $data);
		$this->load->view('notice', $data);
		$this->load->view('templates/footer');		
	}

	public function comment() {
		$this->comment->add();
		redirect('welcome/notice/'.$this->input->post('nid'));
	}

	public function forums() {
		$data['active_menu'] = "forums";
		$data['forums'] = $this->forum->get_all();
		$data['latest_notices'] = $this->notice->get_few();
		$this->load->view('templates/header', $data);
		$this->load->view('forums', $data);
		$this->load->view('templates/footer');				
	}

	public function profile() {
		if($this->session->userdata('is_logged_in') != 'TRUE') {
			redirect('welcome/index');
		}
		$data['active_menu'] = "";
		$this->load->view('templates/header', $data);
		$this->load->view('profile');
		$this->load->view('templates/footer');						
	}

	public function update_profile() {
		$config['upload_path'] = './assets/img/profile_pictures/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '200';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());

			$this->user->change_avatar($data['upload_data']['file_name']);
			$this->session->set_userdata('avatar', $data['upload_data']['file_name']);
			$this->session->set_flashdata('success', "Your Account Succesffulyy updated.");
		}
		redirect('welcome/profile');
	}

	public function ask_question_view() {
		if($this->session->userdata('is_logged_in') != 'TRUE') {
			redirect('welcome/index');
		}		
		$data['active_menu'] = "forums";
		$data['latest_notices'] = $this->notice->get_few();		
		$this->load->view('templates/header', $data);
		$this->load->view('ask_question_view');
		$this->load->view('templates/footer');								
	}

	public function post_question() {
		if($this->forum->post_question()) {
			$this->session->set_flashdata('success', "Success, Your question succesfuly posted.");
		} else {
			$this->session->set_flashdata('error', "Sorry, Unable to post your question.");
		}
		redirect('welcome/forums');
	}

	public function forum_details($fid) {
		$data['active_menu'] = "forums";
		$data['latest_notices'] = $this->notice->get_few();	
		$data['forum'] = $this->forum->get_one($fid);
		$data['answers'] = $this->answer->get_answers($fid);	
		$this->load->view('templates/header', $data);
		$this->load->view('forum_details', $data);
		$this->load->view('templates/footer');								
	}

	public function answer_forum_question() {
		$this->answer->post();
		redirect('welcome/forum_details/'.$this->input->post('fid'));
	}













}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */