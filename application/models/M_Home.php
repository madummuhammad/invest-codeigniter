<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Controller {

	public function index()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('home_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('home_eng')->result_array();
			return $data;
		}
	}

	public function about()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('about_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('about_eng')->result_array();
			return $data;
		}
	}

	public function service()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('service_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('service_eng')->result_array();
			return $data;
		}
	}

	public function portofolio()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('portofolio_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('portofolio_eng')->result_array();
			return $data;
		}
	}

	public function team()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('team_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('team_eng')->result_array();
			return $data;
		}
	}

	public function partner()
	{
		return $this->db->get('partner')->result_array();
	}
}
