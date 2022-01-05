<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in_member();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Profile->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Profile->ganti_sandi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Profile->delete();
		} else {
			$data['profile']=$this->M_Profile->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_profile',$data);
		}
	}
}