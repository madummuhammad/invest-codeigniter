<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Auth->destroy();
			redirect('adminsystem/login');
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Auth->registrasiAdmin();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Auth->loginAdmin();
		} else {
			// login_in();
			$this->db->where('role_id',1);
			$admin=$this->db->get('users')->num_rows();
			if ($admin<1) {
				$this->load->view('admin/v_setup');
			} else {
				$this->load->view('admin/v_login');
			}
		}
	}

	public function admin()
	{
		if ($this->session->userdata('role_id')==1) {
			if ($this->input->post('_patch') !== NULL) {
				$this->M_Admin->update();
			} elseif ($this->input->post('_post') !== NULL) {
				$this->M_Admin->create();
			} elseif ($this->input->post('_get') !== NULL) {
				$this->M_Admin->delete();
			} else {
				$data['admin']=$this->M_Admin->index();
				$this->load->view('admin/partial/v_header');
				$this->load->view('admin/partial/v_topbar');
				$this->load->view('admin/partial/v_sidebar');
				$this->load->view('admin/v_admin',$data);
			}
		} else {
			redirect(admin_url());
		}
		
	}
}
