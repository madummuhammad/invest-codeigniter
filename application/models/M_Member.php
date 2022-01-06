<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Member extends CI_Model {

	public function index()
	{
		$this->db->where('role_id',2);
		return $this->db->get('users')->result_array();
	}

	public function export()
	{

		$connect = mysqli_connect("localhost", "u7992544_atoze", "atozecapital", "u7992544_atozecapital"); 

		header('Content-Type: text/csv; charset=utf-8'); 

		header('Content-Disposition: attachment; filename=member'.date('Y-m-d').'.csv'); 

		$output = fopen("php://output", "w"); 

		fputcsv($output, array('ID', 'Nama','Email','Telegram','Phone','Wallet metamask/trustwallet','Wallet binance/tokocrypto','referral_id','my_referral'));

		$this->db->select('id,name,email,telegram,phone,wallet,walletdua,referral_id,own_referral');
		$this->db->where('role_id',2);
		$this->db->order_by('id','DESC');
		$data=$this->db->get('users')->result_array();

		foreach ($data as $key => $value) {
			fputcsv($output, $value);
		}

		fclose($output);
	}
}