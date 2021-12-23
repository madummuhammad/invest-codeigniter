<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {

	public function index()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('home_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('home_eng')->result_array();
			return $data;
		}
	}

	public function about()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('about_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('about_eng')->result_array();
			return $data;
		}
	}

	public function service()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('service_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('service_eng')->result_array();
			return $data;
		}
	}

	public function portofolio()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('portofolio_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('portofolio_eng')->result_array();
			return $data;
		}
	}

	public function team()
	{
		if (get_cookie('lang_is')=='in') {
			$data=$this->db->get('team_ind')->result_array();
			return $data;
		} else {
			$data=$this->db->get('team_eng')->result_array();
			return $data;
		}
	}

	public function partner()
	{
		return $this->db->get('partner')->result_array();
	}

	public function edit_index()
	{
		$path='./assets/img/main/';
		$type='jpg|png|jpeg';
		$file_name='main';

		$judul=$this->input->post('judul');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('home_eng')->row_array();
		$gambar=upload_gambar($path, $type, $file_name);

		$rules=[
			rules_array('judul','required'),
			rules_array('content','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		if ($gambar==NULL) {
			$data=[
				'judul'=>$judul,
				'content'=>$content,
			];
		} else {
			$data=[
				'judul'=>$judul,
				'content'=>$content,
				'gambar'=>$gambar
			];
		}

		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->update('home_ind',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/main/'.$gambar_lama['gambar']);
					$this->db->update('home_eng',['gambar'=>$gambar]);
				}
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->update('home_eng',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/main/'.$gambar_lama['gambar']);
					$this->db->update('home_ind',['gambar'=>$gambar]);
				}
				redirect('website/english');
			} else{
				redirect('adminsystem');
			}
		}
	}
}
