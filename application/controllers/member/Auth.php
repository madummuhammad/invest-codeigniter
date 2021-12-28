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
			redirect('');
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Auth->registrasiMember();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Auth->loginMember();
		} elseif ($this->input->post('_verifikasi') !== NULL) {
			$this->M_Auth->memberVerifikasi();
		} elseif ($this->input->post('_forgot') !== NULL) {
			$this->M_Auth->forgot();
		}
	}

	public function forgot($token='')
	{
		$data['token']=$token;
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Auth->update_password();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Profile->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Profile->delete();
		} else {
			$this->db->where('token',$token);
			$this->db->where('token_end',date('Y-m-d'));
			$row=$this->db->get('users')->row_array();
			$data['row']=$row;
			if ($row>0) {
				$this->load->view('website/v_forgotPassword',$data);
			} else {
				if ($this->uri->segment(1) !== 'forgotpassword') {
					$this->load->view('error_404');
				}
			}
			$this->load->view('website/v_forgotPassword',$data);
		}
	}
}
