<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komisi extends CI_Model {

	public function index($id)
	{
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('applied',1);
		$this->db->where('cancelled',0);
		$this->db->where('id_project',$id);
		$this->db->where('role_id',2);
		return $this->db->get('order')->result_array();
	}
	public function upline($id,$referral)
	{
		$this->db->where('role_id',2);
		$this->db->where('own_referral',$referral);
		return $this->db->get('users')->row_array();
	}

	public function export()
	{
		header('Content-Type: text/csv; charset=utf-8'); 

		header('Content-Disposition: attachment; filename=pesanan'.date('Y-m-d').'.csv'); 

		$output = fopen("php://output", "w"); 

		fputcsv($output, array('Nama Project', 'User Upline','User Downline','Nilai Pembelian','Nilai Komisi','Wallet Address'));
		$id=$this->uri->segment(5);
		$data=$this->index($id);
		foreach ($data as $key => $value) {
			if ($value['komisi']>0) {
				$datas=[$value['nama_project'],$this->upline($id,$value['referral_id'])['name'],$value['name'],$value['jml'],$value['komisi'],$value['wallet']];
				fputcsv($output, $datas);
			}
		}
		fclose($output);
	}

}
?>