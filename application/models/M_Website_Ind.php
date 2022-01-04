<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Website_Ind extends CI_Model {

	public function index()
	{
		$data=$this->db->get('home_ind')->result_array();
		return $data;
	}

	public function about()
	{
		$data=$this->db->get('about_ind')->result_array();
		return $data;
	}

	public function service()
	{
		$data=$this->db->get('service_ind')->result_array();
		return $data;
	}

	public function portofolio()
	{
		$data=$this->db->get('portofolio_ind')->result_array();
		return $data;
	}

	public function team()
	{
		$data=$this->db->get('team_ind')->result_array();
		return $data;
	}

	public function partner()
	{
		return $this->db->get('partner')->result_array();
	}

	public function kontak()
	{
		$this->db->where('id',1);
		$data=$this->db->get('contact_ind')->row_array();
		return $data;
	}


	public function footer()
	{
		$this->db->where('id',1);
		$data=$this->db->get('footer_ind')->row_array();
		return $data;
	}
}
