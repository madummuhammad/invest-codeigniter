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

	public function all_order()
	{
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		return $this->db->get('order')->result_array();
	}

	public function show($id)
	{
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('id_project',$id);
		return $this->db->get('order')->result_array();
	}

	public function export()
	{
		header('Content-Type: text/csv; charset=utf-8'); 

		header('Content-Disposition: attachment; filename=pesanan'.date('Y-m-d').'.csv'); 

		$output = fopen("php://output", "w"); 

		fputcsv($output, array('ID', 'Nama','Email','Telegram','Phone','Wallet','referral_id','my_referral'));

		$id=$this->uri->segment(4);
		$this->db->select('id_member,name,telegram,phone,wallet,referral_id,own_referral');
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('id_project',$id);
		$this->db->where('role_id',2);
		$data=$this->db->get('order')->result_array();

		foreach ($data as $key => $value) {
			fputcsv($output, $value);
		}
		fclose($output);
	}

	public function konfirmasi()
	{
		$id=form('id');
		$applied=form('applied');
		if ($applied == 0) {
			$this->db->where('id_order',$id);
			$this->db->update('order',['applied'=>1]);
			// redirect('asdf');
		} else {
			$this->db->where('id_order',$id);
			$this->db->update('order',['applied'=>0]);
			// redirect('fdsaa');
		}
		
	}

	public function create()
	{
		$id_member=$this->session->userdata('id');
		$id_project=form('project');
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
			'bukti_tf'=>'default.png',
			'jml'=>$jml,
			'applied'=>0,
			'timestamp'=>time()
		];

		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal',
				'request'=>'order'
			];
			$this->session->set_flashdata($message);
			$data['project']=$this->M_Project->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('member/v_dashboard',$data);
		} else {
			$this->db->insert('order',$data);
			$message=[
				'message'=>'success',
				'request'=>'order'
			];
			$this->session->set_flashdata($message);
			redirect(member_url());
		}
	}

	public function update()
	{
		$path='./assets/admin/images/bukti';
		$type='jpg|png|jpeg';
		$file_name='bukti';
		$link=form('link');
		$id=form('order');
		$bukti_tf=upload_gambar($path, $type, $file_name);
		$this->db->where('id_order',$id);
		$gambar_lama=$this->db->get('order')->row_array();
		

		$rules=[
			rules_array('link','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));

		$data=[
			'bukti_tf'=>$bukti_tf,
			'link'=>$link
		];

		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			$data['project']=$this->M_Order->index();
			$this->load->view('admin/partial/v_header');
			$this->load->view('admin/partial/v_topbar');
			$this->load->view('admin/partial/v_sidebar');
			$this->load->view('member/v_riwayat_pembelian',$data);
		} else {
			if ($bukti_tf !== NULL) {
				if ($gambar_lama['gambar'] !== 'default.png') {
					unlink(FCPATH . 'assets/admin/images/bukti/'.$gambar_lama['gambar']);
				}
				$this->db->where('id_order',$id);
				$this->db->update('order',$data);
				$message=[
					'message'=>'success'
				];
				$this->session->set_flashdata($message);
				redirect(member_url('riwayat'));
			} else {
				$message=[
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect(member_url('riwayat'));
			}
		}
	}
}