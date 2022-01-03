<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_area extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in_member();
	}

	public function index()
	{
		$data['project']=$this->M_Project->index();
		$this->load->view('admin/partial/v_header');
		$this->load->view('admin/partial/v_topbar');
		$this->load->view('admin/partial/v_sidebar');
		$this->load->view('member/v_dashboard',$data);
	}

}