<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('notice','comment', 'forum', 'user', 'answer', 'cnfg', 'pre_candidate'));

		if ($this->session->userdata('user_type') == 'Administrator') {
			redirect('admin/index');
		}

	}

	public function index()
	{

		$config = array(
				'base_url' => base_url('welcome/index'), 
				'per_page' => 4,
				'uri_segment'=> 3,
				'full_tag_open' => "<ul class='pagination pagination-sm'>",
				'full_tag_close' => "</ul>",
				'num_tag_open' => '<li>',
				'num_tag_close' => '</li>',
				'cur_tag_open' => "<li class='disabled'><li class='active'><a href='#'>",
				'cur_tag_close' => "<span class='sr-only'></span></a></li>",
				'next_tag_open' => "<li>",
				'next_tagl_close' => "</li>",
				'prev_tag_open' => "<li>",
				'prev_tagl_close' => "</li>",
				'first_tag_open' => "<li>",
				'first_tagl_close' => "</li>",
				'last_tag_open' => "<li>",
				'last_tagl_close' => "</li>"

			);


		$config['total_rows'] = $this->notice->get_notice_count();

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['links'] = $this->pagination->create_links();
		$data['notices'] = $this->notice->get_notices_for_pagination($config['per_page'], $page);

		$data['active_menu'] = "notices";		
		$data['forums'] = $this->forum->get_few();
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
		$data['latest_notices'] = $this->notice->get_few();		
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
		$data['forums'] = $this->forum->get_few();
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

	public function change_password() {
		if($this->user->change_password()) {
			$this->session->set_flashdata('success', "Success, Your password succesfuly updated.");
		} else {
			$this->session->set_flashdata('error', "Sorry, Unable to update ur password.");
		}
		redirect('welcome/profile');
	}

	public function change_all_password() {
		$this->user->change_all_password();
	}

	public function election() {
		$data['active_menu'] = "election";	
		$data['latest_notices'] = $this->notice->get_few();	
		$data['election'] = $this->cnfg->get(); 
		$this->load->view('templates/header', $data);
		$this->load->view('election', $data);
		$this->load->view('templates/footer');										
	}

	public function request_candidate() {
		if($this->pre_candidate->check_user()){
			$this->pre_candidate->request_candidate();
			$this->session->set_flashdata('success', "Success, Your request succesfuly sent.");						
		} else {
			$this->session->set_flashdata('error', "Sorry, User Allready a Sent Student Council Candidate Request.");
		}
		redirect('welcome/election');
	}

	public function cancel_request_candidate() {
		if(!$this->pre_candidate->check_user()){
			$this->pre_candidate->cancel_request_candidate();
			$this->session->set_flashdata('success', "Success, Your request has been canceled.");						
		} else {
			$this->session->set_flashdata('error', "User is not student council candidate.");
		}
		redirect('welcome/election');

	}












}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */