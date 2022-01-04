<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in_admin();
	}

	public function indonesia()
	{
		$data['home']=$this->M_Website_Ind->index();
		$data['about']=$this->M_Website_Ind->about();
		$data['service']=$this->M_Website_Ind->service();
		$data['portofolio']=$this->M_Website_Ind->portofolio();
		$data['team']=$this->M_Website_Ind->team();
		$data['partner']=$this->M_Website_Ind->partner();
		$data['contact']=$this->M_Website_Ind->kontak();
		$data['footer']=$this->M_Website_Ind->footer();
		$this->load->view('admin/website/v_home',$data);
	}
	public function english()
	{
		$data['home']=$this->M_Website_Eng->index();
		$data['about']=$this->M_Website_Eng->about();
		$data['service']=$this->M_Website_Eng->service();
		$data['portofolio']=$this->M_Website_Eng->portofolio();
		$data['team']=$this->M_Website_Eng->team();
		$data['partner']=$this->M_Website_Eng->partner();
		$data['contact']=$this->M_Website_Eng->kontak();
		$data['footer']=$this->M_Website_Eng->footer();
		$this->load->view('admin/website/v_home',$data);
	}
}
