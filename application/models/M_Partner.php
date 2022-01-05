<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Partner extends CI_Model {

	public function create()
	{
		$path='./assets/img/clients/';
		$type='jpg|png|jpeg';
		$file_name='client';
		$bahasa=form('_bahasa');
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('partner')->row_array();
		$gambar=upload_gambar($path, $type, $file_name);
		$data=[
			'gambar'=>$gambar
		];
		if ($gambar==NULL) {
			$toast=[
				'request'=>'partner',
				'icon'=>'error',
				'title'=>'Tambah Section Partner Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('partner',$data);
				$toast=[
					'request'=>'partner',
					'icon'=>'success',
					'title'=>'Tambah Section Partner Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('partner',$data);
				$toast=[
					'request'=>'partner',
					'icon'=>'success',
					'title'=>'Tambah Section Partner Berhasil'
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
		$path='./assets/img/clients/';
		$type='jpg|png|jpeg';
		$file_name='client';
		$bahasa=form('_bahasa');
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('partner')->row_array();
		$gambar=upload_gambar($path, $type, $file_name);

		$data=[
			'gambar'=>$gambar
		];

		if ($gambar==NULL) {
			$toast=[
				'request'=>'partner',
				'icon'=>'error',
				'title'=>'Edit Section Partner Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect(base_url('website/english'));
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('partner',$data);
				$toast=[
					'request'=>'partner',
					'icon'=>'success',
					'title'=>'Edit Section Partner Berhasil'
				];
				$this->session->set_flashdata($toast);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('partner',$data);
				$toast=[
					'request'=>'partner',
					'icon'=>'success',
					'title'=>'Edit Section Partner Berhasil'
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
		$gambar_lama=$this->db->get('partner')->row_array();

		$this->db->where('id',$id);
		$this->db->delete('partner');

		if ($gambar_lama['gambar'] !== 'default.png') {
			unlink(FCPATH . 'assets/img/clients/'.$gambar_lama['gambar']);
		}
		$toast=[
			'request'=>'partner',
			'icon'=>'warning',
			'title'=>'Hapus Section Partner Berhasil'
		];
		$this->session->set_flashdata($toast);
		redirect(base_url('website/'.$bahasa));
	}
}