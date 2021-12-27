<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	public function registrasiAdmin()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$passwordHash=password_hash($password, PASSWORD_DEFAULT);

		$rules=[
			rules_array('nama','required'),
			rules_array('email','required'),
			rules_array('password','required')
		];

		$data=[
			'name'=>$nama,
			'email'=>$email,
			'password'=>$passwordHash,
			'created_at'=>time(),
			'updated_at'=>time(),
			'role_id'=>1
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			redirect(admin_url('login'));
		} else {
			$this->db->insert('users',$data);
			redirect(admin_url());
		}
	}

	public function loginAdmin()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$auth=[
			'authentication'=>'admin'
		];

		$rules=[
			rules_array('email','required'),
			rules_array('password','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('login'));
		}else{
			$this->db->where('email',$email);
			$this->db->where('role_id',1);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',1);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
					$this->session->set_userdata($auth);
					$this->session->set_userdata($data);
					$message=[
						'message'=>'success'
					];
					$this->session->set_flashdata($message);
					redirect(admin_url('login'));
				} else{
					$message=[
						'message'=>'gagal'
					];
					$this->session->set_flashdata($message);
					redirect(admin_url('login'));
				}
			} else {
				$message=[
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect(admin_url('adminsystem/login'));
			}
		}	
	}

	public function registrasiMember()
	{
		$rand=rand(1,100000000);
		$nama=$this->input->post('nama');
		$email=form('email');
		$telegram=form('telegram');
		$phone=form('phone');
		$wallet=form('wallet');
		$referral=form('referral');
		$password=form('password');
		$repeatPassword=form('repeat_password');
		$passwordHash=password_hash($password, PASSWORD_DEFAULT);
		$ownreferral=rand();
		$auth=[
			'authentication'=>'verifikasi',
			'email'=>$email,
			'password'=>$password
		];
		$rules=[
			rules_array('nama','required|trim'),
			rules_array('email','required|trim|is_unique[users.email]'),
			rules_array('password','required|trim'),
			rules_array('telegram','required|trim'),
			rules_array('phone','required|numeric|min_length[11]|max_length[13]'),
			rules_array('wallet','required|trim'),
			rules_array('referral','trim|numeric'),
			rules_array('password','required|trim'),
			rules_array('repeat_password','required|trim|matches[password]')
		];

		$data=[
			'name'=>$nama,
			'email'=>$email,
			'telegram'=>$telegram,
			'phone'=>$phone,
			'wallet'=>$wallet,
			'referral_id'=>$referral,
			'password'=>$passwordHash,
			'created_at'=>timenow(),
			'updated_at'=>timenow(),
			'role_id'=>2,
			'gambar'=>'default.png',
			'kode_verifikasi'=>$rand,
			'is_verified'=>0
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal',
				'request'=>'registrasi'
			];
			$this->session->set_flashdata($message);
			redirect('');
		} else {
			$this->session->set_userdata($auth);
			$this->db->insert('users',$data);

			ini_set( 'display_errors', 1 );   
			error_reporting( E_ALL );    
			$from = "verifikasi@atozecapital.com";    
			$to = "muhammad.madum2018@gmail.com";    
			$subject = "Checking PHP mail";    
			$message = "PHP mail berjalan dengan baik";   
			$headers = "From:" . $from;    
			mail($to,$subject,$message, $headers);    

			$this->db->where('role_id',2);
			$this->db->where('email',$email);
			$id=$this->db->get('users')->row_array();


			$datareferral=[
				'own_referral'=>$ownreferral.$id['id'],
			];
			$this->db->where('email',$email);
			$this->db->update('users',$datareferral);

			$message=[
				'message'=>'success',
				'request'=>'registrasi'
			];
			$this->session->set_flashdata($message);
			redirect('');
		}
	}

	public function loginMember()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$auth=[
			'authentication'=>'member'
		];

		$rules=[
			rules_array('email','required'),
			rules_array('password','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'request'=>'loginMember',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect('');
		} else{
			$this->db->where('email',$email);
			$this->db->where('role_id',2);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',2);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
					$this->db->where('email',$email);
					$this->db->where('role_id',2);
					$this->db->where('is_verified',0);
					$is_verified=$this->db->get('users')->num_rows();
					if ($is_verified>0) {
						$message=[
							'request'=>'not_verified',
							'message'=>'gagal'
						];
						$auth=[
							'authentication'=>'verifikasi',
							'email'=>$email,
							'password'=>$password
						];
						$this->session->set_userdata($auth);
						$this->session->set_flashdata($message);
						redirect('');
					} else {
						$this->session->set_userdata($auth);
						$this->session->set_userdata($data);
						$message=[
							'request'=>'loginMember',
							'message'=>'success'
						];
						$this->session->set_flashdata($message);
						redirect('');
					}
					
				} else{
					$message=[
						'request'=>'loginMember',
						'message'=>'gagal'
					];
					$this->session->set_flashdata($message);
					redirect('');
				}
			} else {
				$message=[
					'request'=>'loginMember',
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect('');
			}
		}	
	}

	public function memberVerifikasi()
	{
		$kode=form('verifikasi');
		$email=$this->session->userdata('email');
		$password=$this->session->userdata('password');
		$auth=[
			'authentication'=>'member'
		];
		$rules=[
			rules_array('verifikasi','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'request'=>'verifikasiMember',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect('');
		} else{
			$this->db->where('email',$email);
			$this->db->where('role_id',2);
			$this->db->where('is_verified',0);
			$this->db->where('kode_verifikasi',$kode);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',2);
				$this->db->where('is_verified',0);
				$this->db->where('kode_verifikasi',$kode);
				$data=$this->db->get('users')->row_array();
				if (password_verify($password, $data['password'])) {
					$this->session->set_userdata($auth);
					$this->session->set_userdata($data);
					$message=[
						'request'=>'verifikasiMember',
						'message'=>'success'
					];

					$dataVerifikasi=[
						'kode_verifikasi'=>$kode,
						'is_verified'=>1
					];
					$this->session->set_flashdata($message);
					$this->db->where('email',$email);
					$this->db->where('role_id',2);
					$this->db->where('is_verified',0);
					$this->db->where('kode_verifikasi',$kode);
					$this->db->update('users',$dataVerifikasi);
					redirect('');
				} else{
					$message=[
						'request'=>'verifikasiMember',
						'message'=>'gagal'
					];
					$this->session->set_flashdata($message);
					redirect('');
				}
			} else {
				$message=[
					'request'=>'verifikasiMember',
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect('');
			}
		}	
	}

	public function destroy()
	{
		session_destroy();
	}
}