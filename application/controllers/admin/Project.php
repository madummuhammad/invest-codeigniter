<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Project->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Project->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Project->delete();
		} else {
			$data['project']=$this->M_Project->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_project',$data);
		}
	}
}