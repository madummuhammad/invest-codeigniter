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
			rules_array('email','required|valid_email|is_unique[users.email]'),
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
			$toast=[
				'request'=>'add',
				'icon'=>'error',
				'title'=>'Tambah Admin Gagal',
				'message'=>'Isi Form Dengan Benar'
			];
			$this->session->set_flashdata($toast);
			$data['admin']=$this->M_Admin->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_admin',$data);
		} else {
			$this->db->insert('users',$data);
			$toast=[
				'request'=>'add',
				'icon'=>'success',
				'title'=>'Tambah Admin Berhasil',
				'message'=>'Admin Baru Berhasil Ditambah'
			];
			$this->session->set_flashdata($toast);
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
			$toast=[
				'request'=>'edit',
				'icon'=>'error',
				'title'=>'Edit Admin Gagal'
			];
			$this->session->set_flashdata($toast);
			redirect(admin_url('admin'));
		} else {
			$this->db->where('id',$id);
			$this->db->update('users',$data);
			$toast=[
				'request'=>'edit',
				'icon'=>'success',
				'title'=>'Edit Admin Berhasil'
			];
			$this->session->set_flashdata($toast);
			redirect(admin_url('admin'));
		}
	}

	public function delete()
	{
		$id=form('id');

		$this->db->where('id',$id);
		$this->db->delete('users');
		$toast=[
			'request'=>'delete',
			'icon'=>'success',
			'title'=>'Hapus Admin Berhasil',
			// 'message'=>'Isi Form Dengan Benar'
		];
		$this->session->set_flashdata($toast);
		redirect(admin_url('admin'));
	}
}