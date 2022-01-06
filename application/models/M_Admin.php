<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
	public function index()
	{
		$this->db->where('role_id',3);
		$this->db->or_where('role_id',1);
		$this->db->order_by('id','ASC');
		return $this->db->get('users')->result_array();
	}

	public function create()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$role=form('role');
		if ($role!==1) {
			$role=3;
		}
		$passwordHash=password_hash($password, PASSWORD_DEFAULT);

		$rules=[
			rules_array('nama','required'),
			rules_array('email','required|valid_email'),
			rules_array('password','required')
		];

		$data=[
			'name'=>$nama,
			'email'=>$email,
			'password'=>$passwordHash,
			'created_at'=>time(),
			'updated_at'=>time(),
			'role_id'=>$role,
			'gambar'=>'default.png'
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('admin'));
		} else {
			$this->db->insert('users',$data);
			$message=[
				'message'=>'success'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('admin'));
		}
	}

	public function update()
	{
		$id=form('id');
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$role=form('role');
		if ($role==1) {
			$role=3;
			$data=[
				'name'=>$nama,
				'email'=>$email,
				'updated_at'=>time(),
				'role_id'=>$role,
			];
		} elseif ($role==3) {
			$role=1;
			$data=[
				'name'=>$nama,
				'email'=>$email,
				'updated_at'=>time(),
				'role_id'=>$role,
			];
		} else {
			$data=[
				'name'=>$nama,
				'email'=>$email,
				'updated_at'=>time()
			];
		}
		$rules=[
			rules_array('nama','required'),
			rules_array('email','required|valid_email'),
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('admin'));
		} else {
			$this->db->where('id',$id);
			$this->db->update('users',$data);
			$message=[
				'message'=>'success'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('admin'));
		}
	}

	public function delete()
	{
		$id=form('id');

		$this->db->where('id',$id);
		$this->db->delete('users');
		redirect(admin_url('admin'));
	}
}