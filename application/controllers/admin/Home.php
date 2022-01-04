<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
	}

	public function index()
	{
		$this->M_Home->edit_index();
	}

	public function about()
	{
		$this->M_Home->edit_about();
	}

	public function layanan()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Layanan->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Layanan->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Layanan->delete();
		} else {
			redirect(admin_url());
		}
	}

	public function portofolio()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Portofolio->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Portofolio->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Portofolio->delete();
		} else {
			redirect(admin_url());
		}
	}

	public function team()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Team->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Team->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Team->delete();
		} else {
			redirect(admin_url());
		}
	}

	public function partner()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Partner->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Partner->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Partner->delete();
		} else {
			redirect(admin_url());
		}
	}

	public function kontak()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Kontak->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Kontak->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Kontak->delete();
		} else {
			redirect(admin_url());
		}
	}

	public function footer()
	{
		if ($this->input->post('_patch') !== NULL) {
			$this->M_Footer->update();
		} elseif ($this->input->post('_post') !== NULL) {
			$this->M_Footer->create();
		} elseif ($this->input->post('_get') !== NULL) {
			$this->M_Footer->delete();
		} else {
			redirect(admin_url());
		}
	}
}
