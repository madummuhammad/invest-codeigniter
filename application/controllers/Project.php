<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in_member();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Order->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Order->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Order->delete();
		} else {
			redirect(base_url('member'));
		}
	}
	public function riwayat()
	{
		$data['keterangan']=$this->M_Order->keterangan();
		$data['project']=$this->M_Order->index();
		$this->load->view('admin/partial/v_header');
		$this->load->view('admin/partial/v_topbar');
		$this->load->view('admin/partial/v_sidebar');
		$this->load->view('member/v_riwayat_pembelian',$data);
	}

}