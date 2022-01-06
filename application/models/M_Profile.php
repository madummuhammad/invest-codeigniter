<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {

	public function index()
	{
		$id=$this->session->userdata('id');
		$role_id=$this->session->userdata('role_id');
		$this->db->where('id',$id);
		$this->db->where('role_id',$role_id);
		return $this->db->get('users')->row_array();
	}

	public function ganti_sandi()
	{
		$id=$this->session->userdata('id');
		$password=$this->input->post('password_lama');
		$hash=password_hash(form('password_baru'), PASSWORD_DEFAULT);
		$rules=[
			rules_array('password_lama','required'),
			rules_array('password_baru','required'),
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$toast=[
				'request'=>'ganti_sandi',
				'icon'=>'error',
				'title'=>'Ganti Sandi Gagal',
				'message'=>'Form tidak boleh kosong'
			];
			$this->session->set_flashdata($toast);
			if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3) {
				redirect(admin_url('profile'));
			} else {
				redirect(member_url('profile'));
			}
			

		}else{
			$this->db->where('id',$id);
			$data=$this->db->get('users')->row_array();
			if (password_verify($password, $data['password'])) {
				$this->session->set_userdata($auth);
				$this->session->set_userdata($data);
				$toast=[
					'request'=>'ganti_sandi',
					'icon'=>'success',
					'title'=>'Ganti Sandi Berhasil',
					'message'=>'Ingat sandi anda!'
				];
				$this->session->set_flashdata($toast);
				$this->db->where('id',$id);
				$this->db->update('users',['password'=>$hash]);
				if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3) {
					redirect(admin_url('profile'));
				} else {
					redirect(member_url('profile'));
				}
			} else{
				$toast=[
					'request'=>'ganti_sandi',
					'icon'=>'error',
					'title'=>'Ganti Sandi Gagal',
					'message'=>'Sandi yang anda masukan salah!'
				];
				$this->session->set_flashdata($toast);
				if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3) {
					redirect(admin_url('profile'));
				} else {
					redirect(member_url('profile'));
				}
			}
		} 
	}

	public function update()
	{
		if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3) {
			$path='./assets/admin/images/profile/';
			$type='jpg|png|jpeg';
			$file_name='admin';
			$gambar=upload_gambar($path, $type, $file_name);
			$nama=form('nama');
			$id=$this->session->userdata('id');

			$this->db->where('id',$id);
			$gambar_lama=$this->db->get('users')->row_array();

			$rules=[
				rules_array('nama','required')
			];

			$validasi=$this->form_validation->set_rules(rules($rules));

			if ($gambar==NULL) {
				$data=[
					'name'=>$nama
				];
			} else {
				$data=[
					'name'=>$nama,
					'gambar'=>$gambar
				];
			}

			if ($validasi->run()==false) {
				$toast=[
					'request'=>'update_profile',
					'icon'=>'error',
					'title'=>'Edit Profile Gagal',
					'message'=>'Isi form dengan benar!'
				];
				$this->session->set_flashdata($toast);
				redirect(admin_url('profile'));
			} else {
				$this->db->where('id',$id);
				$this->db->update('users',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH .'/assets/admin/images/profile/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('users',$data);
					$toast=[
						'request'=>'update_profile',
						'icon'=>'success',
						'title'=>'Edit Profile Berhasil'
						// 'message'=>'Sandi yang anda masukan salah!'
					];
					$this->session->set_flashdata($toast);
					redirect(admin_url('profile'));
				} else {
					$this->db->where('id',$id);
					$this->db->update('users',$data);
					$toast=[
						'request'=>'update_profile',
						'icon'=>'success',
						'title'=>'Edit Profile Berhasil'
					];
					$this->session->set_flashdata($toast);
					redirect(admin_url('profile'));
				}
			}
		} else {
			$path='./assets/img/member/';
			$type='jpg|png|jpeg';
			$file_name='member';
			$gambar=upload_gambar($path, $type, $file_name);
			$nama=form('nama');
			$telegram=form('telegram');
			$wallet=form('wallet');
			$walletdua=form('walletdua');
			$phone=form('phone');
			$id=$this->session->userdata('id');

			$this->db->where('id',$id);
			$gambar_lama=$this->db->get('users')->row_array();

			$rules=[
				rules_array('nama','required'),
				rules_array('telegram','required'),
				rules_array('wallet','required'),
				rules_array('phone','required')
			];

			$validasi=$this->form_validation->set_rules(rules($rules));

			if ($gambar==NULL) {
				$data=[
					'name'=>$nama,
					'telegram'=>$telegram,
					'wallet'=>$wallet,
					'walletdua'=>$walletdua,
					'phone'=>$phone
				];
			} else {
				$data=[
					'name'=>$nama,
					'telegram'=>$telegram,
					'wallet'=>$wallet,
					'walletdua'=>$walletdua,
					'phone'=>$phone,
					'gambar'=>$gambar
				];
			}

			if ($validasi->run()==false) {
				$toast=[
					'request'=>'update_profile',
					'icon'=>'error',
					'title'=>'Edit Profile Gagal',
					'message'=>'Isi form dengan benar!'
				];
				$this->session->set_flashdata($toast);
				redirect(member_url('profile'));
			} else {
				$this->db->where('id',$id);
				$this->db->update('users',$data);
				if ($gambar !== NULL) {
					if ($gambar_lama['gambar'] !== 'default.png') {
						unlink(FCPATH .'/assets/img/member/'.$gambar_lama['gambar']);
					}
					$this->db->where('id',$id);
					$this->db->update('users',$data);
					$toast=[
						'request'=>'update_profile',
						'icon'=>'success',
						'title'=>'Edit Profile Berhasil'
					];
					$this->session->set_flashdata($toast);
					redirect(member_url('profile'));
				} else {
					$this->db->where('id',$id);
					$this->db->update('users',$data);
					$toast=[
						'request'=>'update_profile',
						'icon'=>'success',
						'title'=>'Edit Profile Berhasil'
					];
					$this->session->set_flashdata($toast);
					redirect(member_url('profile'));
				}
			}
		}
	}
}