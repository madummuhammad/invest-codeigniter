<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {

	public function index()
	{
		$id=$this->session->userdata('id');
		$role_id=$this->session->userdata('role_id');

		$this->db->where('id',$id);
		$this->db->where('role_id',$role_id);
		return $this->db->get('users')->row_array();
	}
}