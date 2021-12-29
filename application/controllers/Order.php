<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
		} else {
			$data['project']=$this->M_Project->index();
			$data['order']=$this->M_Order->all_order();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_all_order',$data);
		}
	}

	public function show($id="")
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Order->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Order->konfirmasi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Order->delete();
		} else {
			$data['project']=$this->M_Project->show($id);
			$data['order']=$this->M_Order->show($id);
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_order',$data);
		}
	}

	public function export()
	{
		$this->M_Order->export();
	}
}