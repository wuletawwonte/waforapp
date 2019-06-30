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


}
