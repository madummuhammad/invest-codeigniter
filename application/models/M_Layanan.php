<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Layanan extends CI_Model {

	public function create()
	{
		$judul=$this->input->post('judul');
		$icon=$this->input->post('icon');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');

		$rules=[
			rules_array('judul','required'),
			rules_array('icon','required'),
			rules_array('content','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'judul'=>$judul,
			'icon'=>$icon,
			'content'=>$content,
		];
		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('service_ind',$data);
				$this->db->insert('service_eng',$data);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('service_eng',$data);
				$this->db->insert('service_ind',$data);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function update()
	{
		$judul=$this->input->post('judul');
		$icon=$this->input->post('icon');
		$content=$this->input->post('content');
		$bahasa=$this->input->post('_bahasa');
		$id=$this->input->post('id');

		$rules=[
			rules_array('judul','required'),
			rules_array('icon','required'),
			rules_array('content','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'judul'=>$judul,
			'icon'=>$icon,
			'content'=>$content,
		];
		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->where('id',$id);
				$this->db->update('service_ind',$data);
				$this->db->where('id',$id);
				$this->db->update('service_eng',['icon'=>$icon]);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->where('id',$id);
				$this->db->update('service_eng',$data);
				$this->db->where('id',$id);
				$this->db->update('service_ind',['icon'=>$icon]);
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