<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Footer extends CI_Model {

	public function create()
	{
		$judul=$this->input->post('tagline');
		$icon=$this->input->post('keterangan');
		$bahasa=$this->input->post('_bahasa');

		$rules=[
			rules_array('tagline','required'),
			rules_array('keterangan','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'keterangan'=>$judul,
			'tagline'=>$icon
		];
		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('contact_ind',$data);
				$this->db->insert('contact_eng',$data);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('contact_eng',$data);
				$this->db->insert('contact_ind',$data);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function update()
	{
		$nama_perusahaan=$this->input->post('nama_perusahaan');
		$keterangan=$this->input->post('keterangan');
		$twiter=$this->input->post('twiter');
		$telegram=$this->input->post('telegram');
		$bahasa=$this->input->post('_bahasa');

		$rules=[
			rules_array('nama_perusahaan','required'),
			rules_array('keterangan','required'),
			rules_array('twiter','required'),
			rules_array('telegram','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'nama_perusahaan'=>$nama_perusahaan,
			'twiter'=>$twiter,
			'keterangan'=>$keterangan,
			'telegram'=>$telegram
		];

		$sosmed=[
			'nama_perusahaan'=>$nama_perusahaan,
			'twiter'=>$twiter,
			'telegram'=>$telegram
		];
		
		if ($validasi->run()==false) {
			$toast=[
				'request'=>'footer',
				'icon'=>'error',
				'title'=>'Edit Section Footer Berhasil'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->where('id',1);
				$this->db->update('footer_ind',$data);

				$this->db->where('id',1);
				$this->db->update('footer_eng',$sosmed);
				$toast=[
					'request'=>'footer',
					'icon'=>'success',
					'title'=>'Edit Section Footer Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->where('id',1);
				$this->db->update('footer_eng',$data);

				$this->db->where('id',1);
				$this->db->update('footer_ind',$sosmed);
				$toast=[
					'request'=>'footer',
					'icon'=>'success',
					'title'=>'Edit Section Footer Berhasil'
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
		$this->db->delete('service_eng');
		$this->db->where('id',$id);
		$this->db->delete('service_ind');

		redirect(base_url('website/'.$bahasa));
	}
}