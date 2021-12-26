<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	public function registrasiAdmin()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$passwordHash=password_hash($password, PASSWORD_DEFAULT);

		$rules=[
			rules_array('nama','required'),
			rules_array('email','required'),
			rules_array('password','required')
		];

		$data=[
			'name'=>$nama,
			'email'=>$email,
			'password'=>$passwordHash,
			'created_at'=>time(),
			'updated_at'=>time(),
			'role_id'=>1
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect(admin_url('login'));
		} else {
			$this->db->insert('users',$data);
			redirect(admin_url());
		}
	}

	public function loginAdmin()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$auth=[
			'authentication'=>'admin'
		];

		$rules=[
			rules_array('email','required'),
			rules_array('password','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect(admin_url('login'));
		}else{
			$this->db->where('email',$email);
			$this->db->where('role_id',1);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',1);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
					$this->session->set_userdata($auth);
					$this->session->set_userdata($data);
					redirect(admin_url());
				} else{
					redirect(admin_url('login'));
				}
			} else {
				redirect(admin_url('adminsystem/login'));
			}
		}	
	}

	public function registrasiMember()
	{
		$nama=$this->input->post('nama');
		$email=form('email');
		$telegram=form('telegram');
		$phone=form('phone');
		$wallet=form('wallet');
		$referral=form('referral');
		$password=form('password');
		$repeatPassword=form('repeat_password');
		$passwordHash=password_hash($password, PASSWORD_DEFAULT);
		$ownreferral=rand();
		$rules=[
			rules_array('nama','required|trim'),
			rules_array('email','required|trim|is_unique[users.email]'),
			rules_array('password','required|trim'),
			rules_array('telegram','required|trim'),
			rules_array('phone','required|numeric|min_length[11]|max_length[13]'),
			rules_array('wallet','required|trim'),
			rules_array('referral','trim|numeric'),
			rules_array('password','required|trim'),
			rules_array('repeat_password','required|trim|matches[password]')
		];

		$data=[
			'name'=>$nama,
			'email'=>$email,
			'telegram'=>$telegram,
			'phone'=>$phone,
			'wallet'=>$wallet,
			'referral_id'=>$referral,
			'password'=>$passwordHash,
			'created_at'=>timenow(),
			'updated_at'=>timenow(),
			'role_id'=>2
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect('');
		} else {
			$this->db->insert('users',$data);

			$this->db->where('role_id',2);
			$this->db->where('email',$email);
			$id=$this->db->get('users')->row_array();


			$datareferral=[
				'own_referral'=>$ownreferral.$id['id'],
			];
			$this->db->where('email',$email);
			$this->db->update('users',$datareferral);
			redirect('');
		}
	}

	public function loginMember()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$auth=[
			'authentication'=>'member'
		];

		$rules=[
			rules_array('email','required'),
			rules_array('password','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect('');
		} else{
			$this->db->where('email',$email);
			$this->db->where('role_id',2);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',2);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
					$this->session->set_userdata($auth);
					$this->session->set_userdata($data);
					redirect('');
				} else{
					redirect('');
				}
			} else {
				redirect('');
			}
		}	
	}

	public function destroy()
	{
		session_destroy();
	}
}