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

		if ($gambar==NULL) {
			$gambar='default.png';
		}

		$rules=[
			rules_array('gambar','required'),
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'gambar'=>$gambar
		];

		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('partner',$data);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('partner',$data);
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
			redirect(base_url('website/english'));
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('partner',$data);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('partner',$data);
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
		redirect(base_url('website/'.$bahasa));
	}
}