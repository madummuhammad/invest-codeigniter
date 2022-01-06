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
		} elseif ($this->input->post('_update') !== NULL) {
			$this->M_Order->update_keterangan();
		} else {
			$data['keterangan']=$this->M_Order->keterangan();
			$data['project']=$this->M_Project->index();
			$data['order']=$this->M_Order->all_order();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_all_order',$data);
		}
	}

	public function komisi($id)
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Order->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Order->konfirmasi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Order->delete();
		} else {
			$data['project']=$this->M_Project->show($id);
			$data['komisi']=$this->M_Komisi->index($id);
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_komisi',$data);
		}
	}

	public function komisi_upline($id)
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Order->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Order->konfirmasi();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Order->delete();
		} else {
			$data['project']=$this->M_Project->show($id);
			$data['komisi']=$this->M_Komisi->komisi_perupline($id);
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_komisi_upline',$data);
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

	public function export_komisi()
	{
		$this->M_Komisi->export();
	}

	public function export_komisi_perupline()
	{
		$this->M_Komisi->export_perupline();
	}
}