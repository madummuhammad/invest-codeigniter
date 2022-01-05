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

	public function kontak()
	{
		if (get_cookie('lang_is')=='in') {
			$this->db->where('id',1);
			$data=$this->db->get('contact_ind')->row_array();
			return $data;
		} else {
			$this->db->where('id',1);
			$data=$this->db->get('contact_eng')->row_array();
			return $data;
		}
	}

	public function footer()
	{
		if (get_cookie('lang_is')=='in') {
			$this->db->where('id',1);
			$data=$this->db->get('footer_ind')->row_array();
			return $data;
		} else {
			$this->db->where('id',1);
			$data=$this->db->get('footer_eng')->row_array();
			return $data;
		}
	}

	public function edit_index()
	{
		$path='./assets/img/main/';
		$type='jpg|png|jpeg';
		$file_name='main';
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('home_eng')->row_array();

		$judul=$this->input->post('judul');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');
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
			$toast=[
				'request'=>'banner',
				'icon'=>'error',
				'title'=>'Edit Banner Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->update('home_ind',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/main/'.$gambar_lama['gambar']);
					$this->db->update('home_eng',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'banner',
					'icon'=>'success',
					'title'=>'Edit Banner Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->update('home_eng',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/main/'.$gambar_lama['gambar']);
					$this->db->update('home_ind',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'banner',
					'icon'=>'success',
					'title'=>'Edit Banner Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function edit_about()
	{
		$path='./assets/img/about/';
		$type='jpg|png|jpeg';
		$file_name='about';
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('about_eng')->row_array();

		$judul=$this->input->post('judul');
		$tagline=$this->input->post('tagline');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');
		$gambar=upload_gambar($path, $type, $file_name);

		$rules=[
			rules_array('judul','required'),
			rules_array('tagline','required'),
			rules_array('content','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		if ($gambar==NULL) {
			$data=[
				'judul'=>$judul,
				'tagline'=>$tagline,
				'content'=>$content,
			];
		} else {
			$data=[
				'judul'=>$judul,
				'tagline'=>$tagline,
				'content'=>$content,
				'gambar'=>$gambar
			];
		}

		if ($validasi->run()==false) {
			$toast=[
				'request'=>'about',
				'icon'=>'error',
				'title'=>'Edit Section About Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->update('about_ind',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/about/'.$gambar_lama['gambar']);
					$this->db->update('about_eng',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'about',
					'icon'=>'success',
					'title'=>'Edit Section About Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->update('about_eng',$data);
				if ($gambar !== NULL) {
					unlink(FCPATH . 'assets/img/about/'.$gambar_lama['gambar']);
					$this->db->update('about_ind',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'about',
					'icon'=>'success',
					'title'=>'Edit Section About Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

}
