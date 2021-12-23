<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Team extends CI_Model {

	public function create()
	{
		$path='./assets/img/team/';
		$type='jpg|png|jpeg';
		$file_name='team';
		$this->db->where('id',1);
		$gambar_lama=$this->db->get('team_eng')->row_array();

		$nama=$this->input->post('nama');
		$jabatan=$this->input->post('jabatan');
		$tagline=$this->input->post('tagline');
		$bahasa=$this->input->post('_bahasa');
		$gambar=upload_gambar($path, $type, $file_name);

		if ($gambar==NULL) {
			$gambar='default.png';
		}

		$rules=[
			rules_array('nama','required'),
			rules_array('jabatan','required'),
			rules_array('tagline','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'nama'=>$nama,
			'jabatan'=>$jabatan,
			'tagline'=>$tagline,
			'gambar'=>$gambar
		];

		if ($validasi->run()==false) {
			echo "gagal";
			// redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->insert('team_ind',$data);
				$this->db->insert('team_eng',$data);
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->insert('team_eng',$data);
				$this->db->insert('team_ind',$data);
				redirect('website/english');
			} else{
				redirect(admin_url());
			}
		}
	}

	public function update()
	{
		$path='./assets/img/team/';
		$type='jpg|png|jpeg';
		$file_name='team';
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$gambar_lama=$this->db->get('team_eng')->row_array();

		$nama=$this->input->post('nama');
		$jabatan=$this->input->post('jabatan');
		$tagline=$this->input->post('tagline');
		$bahasa=$this->input->post('_bahasa');
		$gambar=upload_gambar($path, $type, $file_name);

		$rules=[
			rules_array('nama','required'),
			rules_array('jabatan','required'),
			rules_array('tagline','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		if ($gambar==NULL) {
			$data=[
				'nama'=>$nama,
				'jabatan'=>$jabatan,
				'tagline'=>$tagline
			];
		} else {
			$data=[
				'nama'=>$nama,
				'jabatan'=>$jabatan,
				'tagline'=>$tagline,
				'gambar'=>$gambar
			];
		}

		if ($validasi->run()==false) {
			redirect('website/'.$bahasa);
		} else {
			if ($bahasa=='indonesia') {
				$this->db->where('id',$id);
				$this->db->update('team_ind',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH . 'assets/img/team/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('team_eng',['gambar'=>$gambar]);
				}
				redirect('website/indonesia');
			} elseif ($bahasa=='english') {
				$this->db->where('id',$id);
				$this->db->update('team_eng',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH . 'assets/img/team/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('team_ind',['gambar'=>$gambar]);
				}
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
		$gambar_lama=$this->db->get('team_eng')->row_array();

		$this->db->where('id',$id);
		$this->db->delete('team_eng');

		$this->db->where('id',$id);
		$this->db->delete('team_ind');

		if ($gambar_lama['gambar'] !== 'default.png') {
			unlink(FCPATH . 'assets/img/team/'.$gambar_lama['gambar']);
		}
		redirect(base_url('website/'.$bahasa));
	}
}