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
		$this->db->where('cancelled',0);
		$this->db->where('id_project',$id);
		return $this->db->get('order')->row_array();
	}

	public function show($id)
	{
		if ($this->uri->segment(4) =='komisi') {
			$this->db->where('id',$this->uri->segment(4));
			return $this->db->get('project')->row_array();
		} elseif($this->uri->segment(4)=='upline'){
			$this->db->where('id',$this->uri->segment(5));
			return $this->db->get('project')->row_array();
		} else{
			$this->db->where('id',$id);
			return $this->db->get('project')->row_array();
		}
	}

	public function create()
	{
		$nama_project=form('nama_project');
		$min=form('min');
		$max=form('max');
		$target=form('target');
		$keterangan=form('keterangan');
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
			'target'=>$target,
			'keterangan'=>$keterangan
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
		} else {
			if ($max<$min) {
				$message=[
					'request'=>'create',
					'message'=>'gagal',
					'description'=>'Max target tidak boleh lebih kecil dari min target'
				];
				$this->session->set_flashdata($message);
				$this->session->set_flashdata($data);
				redirect(admin_url('project'));
			} else {
				if ($max>$target) {
					$message=[
						'request'=>'create',
						'message'=>'gagal',
						'description'=>'Max target tidak boleh lebih besar dari target alokasi'
					];
					$this->session->set_flashdata($message);
					$this->session->set_flashdata($data);
					redirect(admin_url('project'));
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
		}
	}

	public function update()
	{
		$id=form('id');
		$nama_project=form('edit_nama_project');
		$min=form('edit_min');
		$max=form('edit_max');
		$target=form('edit_target');
		$keterangan=form('edit_keterangan');
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
			'target'=>$target,
			'keterangan'=>$keterangan
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
			if ($max<$min) {
				$message=[
					'edit'=>true,
					'request'=>'update',
					'message'=>'gagal',
					'description'=>'Max target tidak boleh lebih kecil dari min target'
				];
				$this->session->set_flashdata($message);
				redirect(admin_url('project'));
			} else {
				if ($max>$target) {
					$message=[
						'edit'=>true,
						'request'=>'update',
						'message'=>'gagal',
						'description'=>'Max target tidak boleh lebih besar dari target alokasi'
					];
					$this->session->set_flashdata($message);
					redirect(admin_url('project'));
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