<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Project extends CI_Model {

	public function index()
	{
		$data=$this->db->get('project')->result_array();

		return $data;
	}

	public function sum($id)
	{
		$this->db->select('SUM(jml) AS jml');
		$this->db->where('id_project',$id);
		return $this->db->get('order')->row_array();
	}

	public function show($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('project')->row_array();
	}

	public function create()
	{
		$nama_project=form('nama_project');
		$min=form('min');
		$max=form('max');
		$target=form('target');
		$rules=[
			rules_array('nama_project','required'),
			rules_array('min','required'),
			rules_array('max','required'),
			rules_array('target','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'nama_project'=>$nama_project,
			'min'=>$min,
			'max'=>$max,
			'target'=>$target
		];
		if ($validasi->run()==false) {
			$message=[
				'request'=>'create',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			$data['project']=$this->M_Project->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_project',$data);
			// redirect(admin_url('project'));
		} else {
			$message=[
				'request'=>'create',
				'message'=>'success'
			];
			$this->db->insert('project',$data);
			$this->session->set_flashdata($message);
			redirect(admin_url('project'));
		}
	}

	public function update()
	{
		$id=form('id');
		$nama_project=form('edit_nama_project');
		$min=form('edit_min');
		$max=form('edit_max');
		$target=form('edit_target');
		$rules=[
			rules_array('edit_nama_project','required'),
			rules_array('edit_min','required'),
			rules_array('edit_max','required'),
			rules_array('edit_target','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'nama_project'=>$nama_project,
			'min'=>$min,
			'max'=>$max,
			'target'=>$target
		];
		if ($validasi->run()==false) {
			$message=[
				'request'=>'update',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			$data['project']=$this->M_Project->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('admin/v_project',$data);
		} else {
			$this->db->where('id',$id);
			$this->db->update('project',$data);
			$message=[
				'request'=>'update',
				'message'=>'success'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('project'));
		}
	}

	public function delete()
	{
		$id=form('id');
		$message=[
			'request'=>'delete',
			'message'=>'success'
		];
		$this->session->set_flashdata($message);
		$this->db->where('id',$id);
		$this->db->delete('project');
		redirect(admin_url('project'));
	}
}