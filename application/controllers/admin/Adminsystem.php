<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsystem extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/partial/v_header');
		$this->load->view('admin/partial/v_topbar');
		$this->load->view('admin/partial/v_sidebar');
		$this->load->view('admin/v_dashboard');
		$this->load->view('admin/partial/v_footer');
	}
}
