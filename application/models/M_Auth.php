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

		$rules=[
			rules_array('email','required'),
			rules_array('password','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect(admin_url('login'));
		} else{
			$this->db->where('email',$email);
			$this->db->where('role_id',1);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',1);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
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

	public function destroy()
	{
		session_destroy();
		redirect('adminsystem/login');
	}
}