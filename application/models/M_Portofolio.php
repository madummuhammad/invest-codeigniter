<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Portofolio extends CI_Model {
	public function create()
	{
		$path='./assets/img/portfolio/';
		$type='jpg|png|jpeg';
		$file_name='portofolio';
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('portofolio_eng')->row_array();

		$judul=$this->input->post('judul');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');
		$gambar=upload_gambar($path, $type, $file_name);
		if ($gambar==NULL) {
			$gambar='default.png';
		}

		$rules=[
			rules_array('judul','required'),
			rules_array('content','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'judul'=>$judul,
			'content'=>$content,
			'gambar'=>$gambar
		];

		if ($validasi->run()==false) {
			$toast=[
				'request'=>'portofolio',
				'icon'=>'error',
				'title'=>'Tambah Section portofolio Berhasil'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('portofolio_ind',$data);
				$this->db->insert('portofolio_eng',$data);
				$toast=[
					'request'=>'portofolio',
					'icon'=>'success',
					'title'=>'Edit Section portofolio Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('portofolio_eng',$data);
				$this->db->insert('portofolio_ind',$data);
				$toast=[
					'request'=>'portofolio',
					'icon'=>'success',
					'title'=>'Edit Section portofolio Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function update()
	{
		$path='./assets/img/portfolio/';
		$type='jpg|png|jpeg';
		$file_name='portofolio';
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$gambar_lama=$this->db->get('portofolio_eng')->row_array();

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
				'request'=>'portofolio',
				'icon'=>'error',
				'title'=>'Edit Section portofolio Berhasil'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->where('id',$id);
				$this->db->update('portofolio_ind',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH . 'assets/img/portfolio/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('portofolio_eng',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'portofolio',
					'icon'=>'success',
					'title'=>'Tambah Section portofolio Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->where('id',$id);
				$this->db->update('portofolio_eng',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH . 'assets/img/portfolio/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('portofolio_ind',['gambar'=>$gambar]);
				}
				$toast=[
					'request'=>'portofolio',
					'icon'=>'success',
					'title'=>'Tambah Section portofolio Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function delete()
	{
		$id=$this->input->post('id');
		$bahasa=$this->input->post('_bahasa');

		$this->db->where('id',$id);
		$gambar_lama=$this->db->get('portofolio_eng')->row_array();

		$this->db->where('id',$id);
		$this->db->delete('portofolio_eng');

		$this->db->where('id',$id);
		$this->db->delete('portofolio_ind');

		if ($gambar_lama['gambar'] !== 'default.png') {
			unlink(FCPATH . 'assets/img/portfolio/'.$gambar_lama['gambar']);
		}
		$toast=[
			'request'=>'portofolio',
			'icon'=>'warning',
			'title'=>'Hapus Section portofolio Berhasil'
		];
		$this->session->set_flashdata($toast);
		redirect(base_url('website/'.$bahasa));
	}
}