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
		}
	}
}
