<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('pre_candidate', 'user', 'notice', 'forum', 'comment', 'answer', 'advertisement', 'cnfg', 'candidate'));
	}

	public function login() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if($this->form_validation->run()){
			$userdata = $this->user->get_logged_in_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['first_name'].' '.$userdata['middle_name'],
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'user_type' => $userdata['user_type'],
				'user_id' => $userdata['id'],
				'avatar' => $userdata['avatar']
				);

			if(false) {
				
				$config = Array( 
				'protocol' => 'smtp', 
			  	'smtp_host' => 'ssl://smtp.googlemail.com', 
			  	'smtp_port' => 465, 
			  	'smtp_user' => 'waforapp@gmail.com', 
			  	'smtp_pass' => 'blen.yosef', ); 

				$this->load->library('encrypt');
			  	$this->load->library('email', $config); 
			  	$this->email->set_newline("\r\n");
			  	$this->email->from('waforapp@gmail.com', 'Waforapp');
			  	$this->email->to($userdata['email']);
			  	$this->email->subject(' My mail through codeigniter from localhost '); 
			  	$this->email->message('Hello World…');
			  	if (!$this->email->send()) {
			    	show_error($this->email->print_debugger()); }
			  	else {
			    	echo 'Your e-mail has been sent!';
			  	}
				
				if (!$this->email->send()) {
					$this->session->set_flashdata('error', $this->email->print_debugger());	
					redirect('users/account_verification_view');
				} else {
					$this->session->set_flashdata('success', 'email successfully sent.');
					redirect('users/account_verification_view');					
				}
			}

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') === "Administrator") {
				redirect('admin/index');
			} else if($this->session->userdata('user_type') === "Student council") {
				$this->session->set_userdata('department', $userdata['name']);
				redirect('student_council/index');
			} else if($this->session->userdata('user_type') === "Student") {
				$this->session->set_userdata('department', $userdata['name']);
				redirect('welcome/index');
			} else {
				$this->session->unset_userdata('is_logged_id');
				$this->session->set_flashdata("error", "Username or password incorrect.");
				redirect('welcome/loginpage');
			}

		} else {
			$this->session->unset_userdata('is_logged_id');
			$this->session->set_flashdata("error", "Username or password incorrect.");
			redirect('welcome/loginpage');
		}	

	}

	public function validate_user_credentials() {

		if($this->user->user_can_log_in($this->input->post('username'), $this->input->post('password'))) {
			return true;
		} else {
			return false;
		}

	}

	public function account_verification_view() {
		$this->load->view('account_verification');
	}

	public function logout($backto) {
		$this->session->sess_destroy();
		if($backto == "homepage") {
			redirect('welcome/index');
		} else {
			redirect('welcome/loginpage');
		}
	}

	public function m_login() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");

		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		$data = [];

		if($this->form_validation->run()){
			$userdata = $this->user->get_logged_in_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['first_name'].' '.$userdata['middle_name'],
				'username' => $this->input->post('username'),
				'status' => "loggedin",
				'user_type' => $userdata['user_type'],
				'user_id' => $userdata['id'],
				'avatar' => $userdata['avatar']
				);

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') === "Student" || $this->session->userdata('user_type') === "Student council") {
				echo json_encode($data);
			} else {
				$data['status'] = "error";
				echo json_encode($data);
			}

		} else {
			$data['status'] = "error";
			echo json_encode($data);
		}	

	}

	public function m_notices() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data = $this->notice->get_all();
		echo json_encode($data);
	}

	public function m_forums() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data = $this->forum->get_all($this->input->post('notice_key'));
		echo json_encode($data);
	}

	public function m_notice() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data['notice'] = $this->notice->get_one($this->input->post('notice_id'));
		$data['comments'] = $this->comment->get_comments($this->input->post('notice_id'));		
		echo json_encode($data);
	}

	public function m_comment() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$this->comment->m_add();
		echo json_encode("success");
	}

	public function m_post_question() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$this->forum->m_post_question();
		echo json_encode("success");
	}

	public function m_question_details() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data['forum'] = $this->forum->get_one($this->input->post('fid'));
		$data['answers'] = $this->answer->get_answers($this->input->post('fid'));	
		echo json_encode($data);
	}

	public function m_answer_forum_question() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$this->answer->m_post();
		echo json_encode('success');
	}

	public function m_election() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		$data['today'] = date('Y-m-d');
		$data['advertisements'] = $this->advertisement->m_get_all();
		$conf = $this->cnfg->get();
		$data['election'] = $conf; 
		$data['is_candidate'] = $this->candidate->m_is_candidate();
		$data['candidates'] = $this->candidate->get_all();
		if($this->candidate->get_new_student_councils($conf['student_council_amount'])) {
			$data['student_councils'] = $this->candidate->get_new_student_councils($conf['student_council_amount']);			
		} else {
			$data['student_councils'] = $this->user->get_student_councils();			
		}
		echo json_encode($data);
	}

	public function m_request_candidate() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		if($this->pre_candidate->m_check_user()){
			$this->pre_candidate->m_request_candidate();
			$data['message'] = "Success, Your request successfully sent.";
			echo json_encode($data);
		} else {
			$data['message'] = "Sorry, User already sent student council candidate request.";
			echo json_encode($data);
		}
	}

	public function m_cancel_candidate_request() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		if(!$this->pre_candidate->m_check_user()){
			$this->pre_candidate->m_cancel_candidate_request();
			$data['message'] = "Success, Your request has been canceled.";
			echo json_encode($data);

		} else {
			$data['message'] = "User is not student council candidate.";
			echo json_encode($data);
		}

	}

	public function m_post_advertisement() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		if($this->advertisement->m_add()){
			$data['message'] = "Success, Your Advertisement Succesffulyy posted.";
			echo json_encode($data);
		} else {
			$data['message'] = "Unable to post the advertisement.";
			echo json_encode($data);
		}
	}

	public function m_vote_send() {
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json");
		if(!$this->user->m_check_eligibility()){
			if($this->candidate->m_add_vote($this->input->post('cid'))){
				$data['message'] = "Success, You Have Succesffully Voted.";
				echo json_encode($data);
			} else {
				$data['message'] = "Unable to vote a Candidate.";
				echo json_encode($data);
			}
		} else {
			$data['message'] = "You have allready voted for a candidate.";
			echo json_encode($data);
		}
	}














}

