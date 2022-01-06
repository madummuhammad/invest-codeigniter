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
		$this->db->where('komisi >',0);
		return $this->db->get('order')->result_array();
	}

	public function show()
	{
		$this->db->join('users','order.id_member=users.id');
		$this->db->join('project','order.id_project=project.id');
		$this->db->where('applied',1);
		$this->db->where('cancelled',0);
		$this->db->where('referral_id',$this->session->userdata('own_referral'));
		$this->db->where('role_id',2);
		return $this->db->get('order')->result_array();
	}

	public function upline($id,$referral)
	{
		$this->db->where('role_id',2);
		$this->db->where('own_referral',$referral);
		return $this->db->get('users')->row_array();
	}

	public function sum($id)
	{
		$this->db->select('SUM(komisi) AS komisi');
		$this->db->where('id_member',$id);
		return $this->db->get('order')->row_array();
	}

	public function komisi_perupline($id)
	{
		// $this->db->where('own_referral',85381472437);
		$this->db->select('users.name,order.id_member,users.wallet,users.walletdua');
		$this->db->join('users','order.id_member=users.id');
		$this->db->distinct('id_member');
		$this->db->where('applied',1);
		$this->db->where('cancelled',0);
		$this->db->where('role_id',2);
		$this->db->where('komisi >',0);
		return $this->db->get('order')->result_array();
	}

	public function export()
	{
		header('Content-Type: text/csv; charset=utf-8'); 

		header('Content-Disposition: attachment; filename=Komisi'.date('Y-m-d').'.csv'); 

		$output = fopen("php://output", "w"); 

		fputcsv($output, array('Nama Project', 'User Upline','User Downline','Nilai Pembelian','Nilai Komisi','Wallet metamask/trustwallet','Wallet binance/tokocrypto'));
		$id=$this->uri->segment(5);
		$data=$this->index($id);
		foreach ($data as $key => $value) {
			if ($value['komisi']>0) {
				$datas=[$value['nama_project'],$this->upline($id,$value['referral_id'])['name'],$value['name'],$value['jml'],$value['komisi'],$value['wallet'],$value['walletdua']];
				fputcsv($output, $datas);
			}
		}
		fclose($output);
	}

	public function export_perupline()
	{
		header('Content-Type: text/csv; charset=utf-8'); 

		header('Content-Disposition: attachment; filename=Komisi_Perupline'.date('Y-m-d').'.csv'); 

		$output = fopen("php://output", "w"); 

		fputcsv($output, array('Nama User Upline', 'Jumlah Komisi','Wallet metamask/trustwallet','Wallet binance/tokocrypto'));
		$id=$this->uri->segment(5);
		$data=$this->komisi_perupline($id);
		foreach ($data as $key => $value) {
			$datas=[$value['name'],$this->sum($value['id_member'])['komisi'],$value['wallet'],$value['walletdua']];
			fputcsv($output, $datas);
		}
		fclose($output);
	}

}
?>