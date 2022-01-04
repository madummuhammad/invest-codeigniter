<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Order->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Order->konfirmasi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Order->delete();
		} elseif ($this->input->post('_update') !== NULL) {
			$this->M_Order->cancel();
		} else {
			$data['project']=$this->M_Order->new_order();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_dashboard',$data);
		}
	}
}
