<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnfg extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function save_election_date_setting() {
		$data = array(
			$this->input->post('name') => $this->input->post('value')
			);
		$this->db->update('cnfg', $data);
		return true;
	}

	public function get() {
		$data = $this->db->get('cnfg');
		return $data->result_array()[0];
	}

	public function get_by($attrib) {
		$this->db->select($attrib);
		$data = $this->db->get('cnfg');
		$data = $data->result_array()[0];

		return $data;
	}

	public function update_admin_settings() {
		$data = array(
			'system_name' => $this->input->post('system_name'), 
			'system_name_short' => $this->input->post('system_name_short'), 
			'default_password' => $this->input->post('default_password'), 
			'student_council_amount' => $this->input->post('student_council_amount')
			);
		$this->db->update('cnfg', $data);
		return true;

	}


}
