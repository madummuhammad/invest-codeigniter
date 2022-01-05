<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kontak extends CI_Model {

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
		$tagline=$this->input->post('tagline');
		$keterangan=$this->input->post('keterangan');
		$bahasa=$this->input->post('_bahasa');

		$rules=[
			rules_array('tagline','required'),
			rules_array('keterangan','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'keterangan'=>$keterangan,
			'tagline'=>$tagline
		];

		if ($validasi->run()==false) {
			$toast=[
				'request'=>'kontak',
				'icon'=>'error',
				'title'=>'Edit Section Kontak Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->where('id',1);
				$this->db->update('contact_ind',$data);
				$toast=[
					'request'=>'kontak',
					'icon'=>'success',
					'title'=>'Edit Section Kontak Berhasil'
				]; 
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->where('id',1);
				$this->db->update('contact_eng',$data);
				$toast=[
					'request'=>'kontak',
					'icon'=>'success',
					'title'=>'Edit Section Kontak Berhasil'
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
		$toast=[
			'request'=>'kontak',
			'icon'=>'warning',
			'title'=>'Edit Section Kontak Gagal'
		];
		redirect(base_url('website/'.$bahasa));
	}
}