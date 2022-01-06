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
			rules_array('email','required|valid_email'),
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
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect(admin_url('login'));
		} else {
			$this->db->insert('users',$data);
			$message=[
				'message'=>'success'
			];
			$this->session->set_flashdata($message);
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
			rules_array('email','required|valid_email'),
			rules_array('password','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			$this->load->view('admin/v_login');

		}else{
			$this->db->where('email',$email);
			$this->db->where('role_id',1);
			$this->db->or_where('role_id',3);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$this->db->where('email',$email);
				$this->db->where('role_id',1);
				$this->db->or_where('role_id',3);
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
						'message'=>'gagal',
						'error'=>'wrongakun',
						'email'=>$email
					];
					$this->session->set_flashdata($message);
					redirect(admin_url('login'));
				}
			} else {
				$message=[
					'message'=>'gagal',
					'error'=>'wrongakun',
					'email'=>$email
				];
				$this->session->set_flashdata($message);
				redirect(admin_url('login'));
			}
		}	
	}

	public function registrasiMember($referral='')
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
		$walletdua=form('walletdua');
		$auth=[
			'authentication'=>'verifikasi',
			'email'=>$email,
			'password'=>$password
		];
		$rules=[
			rules_array('nama','required|trim'),
			rules_array('email','required|trim|is_unique[users.email]|valid_email'),
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
			'is_verified'=>0,
			'walletdua'=>$walletdua
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'message'=>'gagal',
				'request'=>'registrasi',
				'referral'=>1
			];

			$this->session->set_flashdata($message);
			
			$data['referral']=$referral;
			$data['home']=$this->M_Home->index();
			$data['about']=$this->M_Home->about();
			$data['service']=$this->M_Home->service();
			$data['portofolio']=$this->M_Home->portofolio();
			$data['team']=$this->M_Home->team();
			$data['partner']=$this->M_Home->partner();
			$this->load->view('website/v_home',$data);

		} else {
			$this->session->set_userdata($auth);
			$this->db->insert('users',$data);
			$htmlContent = '<h3>Hi, '.$nama.'</h3>';
			$htmlContent .= '<p>Kode verifikasi email anda adalah: '.$rand.'</p><br>';
			$htmlContent .= '<p>Terimakasih</p>';


			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->to($email);
			$this->email->from('atozeverifikasi@atozecapital.com','Atoze Capital');
			$this->email->subject('Kode Verifikasi');
			$this->email->message($htmlContent);
			$this->email->send();

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

	public function loginMember($referral='')
	{
		$email=$this->input->post('login_email');
		$password=$this->input->post('login_password');
		$auth=[
			'authentication'=>'member'
		];

		$rules=[
			rules_array('login_email','required'),
			rules_array('login_password','required')
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'request'=>'loginMember',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			$data['referral']=$referral;
			$data['home']=$this->M_Home->index();
			$data['about']=$this->M_Home->about();
			$data['service']=$this->M_Home->service();
			$data['portofolio']=$this->M_Home->portofolio();
			$data['team']=$this->M_Home->team();
			$data['partner']=$this->M_Home->partner();
			$this->load->view('website/v_home',$data);
			// redirect('');
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
						'message'=>'gagal',
						'error'=>'wrongakun',
						'email'=>$email
					];
					$this->session->set_flashdata($message);
					redirect('');
				}
			} else {
				$message=[
					'request'=>'loginMember',
					'message'=>'gagal',
					'error'=>'wrongakun',
					'email'=>$email
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

	public function forgot()
	{
		$email=form('email');
		$kode=md5($email);
		$rules=[
			rules_array('email','required')
		];
		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'request'=>'forgotPassword',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect('');
		} else{
			$this->db->where('email',$email);
			$this->db->where('role_id',2);
			$this->db->where('is_verified',1);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$dataForgot=[
					'token'=>$kode,
					'token_end'=>date('Y-m-d')
				];

				$htmlContent = '<h3>Hi, '.$email.'</h3>';
				$htmlContent .= '<p>Untuk melanjukan, silahkan klik link berikut </p><a target="_blank" href="'.base_url('password/').$kode.'">Klik link</a><br>';
				$htmlContent .= '<p>Link hanya berlaku pada hari ini, '.date('Y-m-d').'</p>';
				$htmlContent .= '<p>Terimakasih</p>';


				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->to($email);
				$this->email->from('atozeverifikasi@atozecapital.com','Atoze Capital');
				$this->email->subject('Permohonan ganti password');
				$this->email->message($htmlContent);
				$this->email->send();

				$this->db->where('email',$email);
				$this->db->where('role_id',2);
				$this->db->where('is_verified',1);
				$this->db->update('users',$dataForgot);
				$message=[
					'request'=>'forgotPassword',
					'message'=>'success'
				];
				$this->session->set_flashdata($message);
				redirect('');
				
			} else {
				$message=[
					'request'=>'forgotPassword',
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect('');
			}
		}
	}

	public function update_password()
	{
		$password=form('password');
		$repeatPassword=form('repeat_password');
		$token=form('token');
		$kode=password_hash($password, PASSWORD_DEFAULT);
		$rules=[
			rules_array('password','required'),
			rules_array('repeat_password','required|matches[password]'),
			rules_array('token','required'),
		];

		$validasi=$this->form_validation->set_rules(rules($rules));
		if ($validasi->run()==false) {
			$message=[
				'request'=>'gantiPassword',
				'message'=>'gagal'
			];
			$this->session->set_flashdata($message);
			redirect('password/'.$token);
		} else{
			$this->db->where('token',$token);
			$this->db->where('role_id',2);
			$this->db->where('is_verified',1);
			$num_rows=$this->db->get('users')->num_rows();

			if ($num_rows>0) {
				$message=[
					'request'=>'gantiPassword',
					'message'=>'success'
				];

				$dataPassword=[
					'password'=>$kode,
					'token'=>password_hash($token, PASSWORD_DEFAULT)
				];

				$this->session->set_flashdata($message);
				$this->db->where('role_id',2);
				$this->db->where('is_verified',1);
				$this->db->update('users',$dataPassword);
				$this->session->set_flashdata($message);
				redirect('password/'.$token);
			} else {
				$message=[
					'request'=>'gantiPassword',
					'message'=>'gagal'
				];
				$this->session->set_flashdata($message);
				redirect('password/'.$token);
			}
		}
	}

	public function destroy()
	{
		session_destroy();
	}
}