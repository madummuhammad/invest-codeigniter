<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Member extends CI_Model {

	public function index()
	{
		$this->db->where('role_id',2);
		return $this->db->get('users')->result_array();
	}
}