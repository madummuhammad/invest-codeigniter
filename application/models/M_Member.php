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

		fputcsv($output, array('ID', 'Nama','Email','Telegram','Phone','Wallet','referral_id','my_referral'));

		$query = "SELECT id,name,email,telegram,phone,wallet,referral_id,own_referral from users WHERE role_id=2 ORDER BY id DESC"; 

		$result = mysqli_query($connect, $query); 

		while($row = mysqli_fetch_assoc($result)) 
		{ 
			fputcsv($output, $row);

		} 

		fclose($output); 
	}
}