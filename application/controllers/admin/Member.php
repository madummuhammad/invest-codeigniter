<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Member->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Member->konfirmasi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Member->delete();
		} else {
			$data['member']=$this->M_Member->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_member',$data);
		}
	}

	public function export()
	{
		$this->M_Member->export();
	}
}