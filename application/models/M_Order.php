<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {

	public function index()
	{
		$id=$this->session->userdata('id');
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('id_member',$id);
		return $this->db->get('order')->result_array();

	}

	public function new_order()
	{
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('applied',0);
		return $this->db->get('order')->result_array();
	}

	public function konfirmasi()
	{
		$id=form('id');
		$applied=form('applied');
		if ($applied == 0) {
			$this->db->where('id',$id);
			$this->db->update('order',['applied'=>1]);
			redirect('asdf');
		} else {
			$this->db->where('id',$id);
			$this->db->update('order',['applied'=>0]);
			redirect('fdsaa');
		}
		
	}

	public function create()
	{
		$path='./assets/admin/images/bukti';
		$type='jpg|png|jpeg';
		$file_name='bukti';
		$id_member=$this->session->userdata('id');
		$id_project=form('project');
		$bukti_tf=upload_gambar($path, $type, $file_name);
		$jml=form('jml');
		$applied=0;

		$rules=[
			rules_array('jml','required'),
			rules_array('project','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'id_member'=>$id_member,
			'id_project'=>$id_project,
			'bukti_tf'=>$bukti_tf,
			'jml'=>$jml,
			'applied'=>0,
			'timestamp'=>time()
		];

		if ($validasi->run()==false) {
			redirect(member_url());
		} else {
			$this->db->insert('order',$data);
			redirect(member_url());
		}
	}
}