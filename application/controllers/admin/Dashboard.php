<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$this->load->view('admin/partial/v_header');
		$this->load->view('admin/partial/v_topbar');
		$this->load->view('admin/partial/v_sidebar');
		$this->load->view('admin/v_dashboard');
		$this->load->view('admin/partial/v_footer');
	}
}
