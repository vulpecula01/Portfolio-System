<?php
class C_login extends CI_Controller{  
	public function __construct()
	{ 
		parent::__construct();
	}

	function index()
	{
		$this->form_validation->set_error_delimiters('<p style="color:red;text-align:right">','</p>');
		$this->form_validation->set_message('required', '%s is Not Empty');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');

		if ($this->form_validation->run() == true){

			
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_user_authen','uaut');

			$this->uaut->uaut_username = $this->input->post('username');
			$this->uaut->uaut_password = $this->input->post('password');
			$remember = $this->input->post('remember');

			/*CHECK USER LOGIN*/
			/*เข้ารหัสแบบ HASH*/
			/*
			$options = [
			'cost' => 10
			];
			$this->uaut->uaut_password = password_hash($this->uaut->uaut_password,PASSWORD_BCRYPT,$options);
			*/
			$port = $this->uaut->check_login();
			//ไม่มี User หรือ Password ไม่ตรงกับ User

			if(!$port)
			{
				/*Check ldap*/
				$this->load->library('ldapService/service_ldap');
				$this->service_ldap->connect();
				if($this->service_ldap->authenticate('' ,$this->uaut->uaut_username,$this->input->post('password')))
				{
					// User Pass ถูกต้องบน Ldap
					$userdata = $this->service_ldap->get_data($this->uaut->uaut_username,$this->input->post('password'));
					
					//เช็คว่าใน DB มี User นี้หรือไม่
					//$user = $this->uaut->check_user();
					// ถ้ามีให้เข้าระบบได้ และ อัพเดท password บน Local DB พร้อม ENCRYPT
					// ถ้าไม่มีให้ Login Faild
					$port = $this->uaut->check_user();
					if($port)
					{
						// อัพเดท Password ไว้เข้ามาครั้งหน้า
						$this->uaut->update_user_password_by_ldap();
						// Login ไปเลย
						// Session สิท
						$this->session->set_userdata('uaut_id',$port['uaut_id']);
						$this->session->set_userdata('uaut_username',$port['uaut_username']);
						$this->session->set_userdata('aut_admin',$port['aut_admin']);
						$this->session->set_userdata('aut_user',$port['aut_user']);


						$this->load->model('m_port_user','puser');
						$this->puser->uaut_id = $port['uaut_id'];
						$port = $this->puser->getById();

						// Session ชื่อนามสกุลรูป
						$this->session->set_userdata('usr_id',$port['usr_id']);
						$this->session->set_userdata('usr_tfname',$port['usr_tfname']);
						$this->session->set_userdata('usr_tlname',$port['usr_tlname']);
						$this->session->set_userdata('usr_efname',$port['usr_efname']);
						$this->session->set_userdata('usr_elname',$port['usr_elname']);
						if($port['usr_picpath'] == '')
							$this->session->set_userdata('usr_picpath','0.png');
						else
							$this->session->set_userdata('usr_picpath',$port['usr_picpath']);
						$this->session->set_userdata('logged_in',TRUE);
						
						if ($this->port->trans_status() === FALSE) {
							$this->port->trans_rollback();
						}else {
							$this->port->trans_commit();
							redirect("c_user_page");
						}	
					}
					else
					{
						// ถ้าไม่มีให้ Login Faild
						$this->session->set_flashdata('result', '<p style="color:red;text-align:center">User or Password is not Valid</p>');
						redirect("c_login");
					}
				}
				else
				{
					// ถ้าไม่มีให้ Login Faild
					$this->session->set_flashdata('result', '<p style="color:red;text-align:center">User or Password is not Valid</p>');
					redirect("c_login");
				}
				$this->service_ldap->close();
			}
			else
			{
				//ล๊อคอินได้
				// Session สิท
				$this->session->set_userdata('uaut_id',$port['uaut_id']);
				$this->session->set_userdata('uaut_username',$port['uaut_username']);
				$this->session->set_userdata('aut_admin',$port['aut_admin']);
				$this->session->set_userdata('aut_user',$port['aut_user']);


				$this->load->model('m_port_user','puser');
				$this->puser->uaut_id = $port['uaut_id'];
				$port = $this->puser->getById();
				
				// Session ชื่อนามสกุลรูป
				$this->session->set_userdata('usr_id',$port['usr_id']);
				$this->session->set_userdata('usr_tfname',$port['usr_tfname']);
				$this->session->set_userdata('usr_tlname',$port['usr_tlname']);
				$this->session->set_userdata('usr_efname',$port['usr_efname']);
				$this->session->set_userdata('usr_elname',$port['usr_elname']);
				if($port['usr_picpath'] == '')
					$this->session->set_userdata('usr_picpath','0.png');
				else
					$this->session->set_userdata('usr_picpath',$port['usr_picpath']);
				$this->session->set_userdata('logged_in',TRUE);
				redirect("c_user_page");
			}
			
		}
		else
		{
			if($this->session->userdata('uaut_id'))
				redirect("c_user_page");

			$this->load->view('v_loginPort');
		}
	}

	function log_out()
	{
		$this->session->sess_destroy();
		redirect("c_login");
	}
}