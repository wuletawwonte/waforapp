<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_council extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model(array('user', 'department', 'cnfg', 'notice', 'forum', 'pre_candidate', 'candidate', 'advertisement'));

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
		$config = array(
				'base_url' => base_url('student_council/notices'), 
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


		$data['active_menu'] = 'notices';
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
		$data['election_date'] = $this->cnfg->get();
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_settings', $data);
		$this->load->view('student_council_templates/footer');		
	}

	public function save_setting() {
		if($this->cnfg->save_election_date_setting()) {
			$this->session->set_flashdata('success', 'Success, Setting successfully saved.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to save setting, Check the value.');
		}
		redirect('student_council/settings');
	}

	public function election() {
		$conf = $this->cnfg->get();
		$data['active_menu'] = 'election';
		$data['election'] = $conf; 
		$data['pre_candidates'] = $this->pre_candidate->get_all();
		$data['candidates'] = $this->candidate->get_all();
		$data['student_councils'] = $this->candidate->get_new_student_councils($conf['student_council_amount']);
		$this->load->view('student_council_templates/header', $data);
		$this->load->view('student_council_election', $data);
		$this->load->view('student_council_templates/footer');				
	}

	public function finalize_election() {
		$conf = $this->cnfg->get();
		$this->user->unset_student_council();
		$this->advertisement->unset_all();
		$this->pre_candidate->unset_all();
		$data = $this->candidate->get_new_student_councils($conf['student_council_amount']);

		foreach($data as $stud) {
			$this->user->set_student_council($stud['user_id']);
		} 
		$this->candidate->unset_all();		
		redirect('users/logout');
	}


	public function add_candidate() {
		$res = $this->cnfg->get_by('student_council_candidate_amount');		
		if($this->candidate->candidates_count() < $res['student_council_candidate_amount']) {
			if($this->candidate->check_candidate()) {
				if($this->candidate->add_candidate()) {
					$this->session->set_flashdata('success', 'Success, Cadidate Successfully Added.');
				} else {
					$this->session->set_flashdata('error', 'Error, Unable to user to Student Council Candidates list.');
				}
			} else {
					$this->session->set_flashdata('error', 'Error, User allready a Candidate.');
			}
		} else {
			$this->session->set_flashdata('error', "Sorry, Student Council Candidate Reached Maximum count.");					
		}
		redirect('student_council/election');
	}

	public function remove_candidate($cid) {
		if($this->candidate->remove_candidate($cid)) {
			$this->session->set_flashdata('success', 'Success, Cadidate Successfully Removed.');
		} else {
			$this->session->set_flashdata('error', 'Error, Unable to user to Remove student Council Candidates.');
		}		
		redirect('student_council/election');
	}






}