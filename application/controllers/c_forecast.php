<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_forecast extends Port_core {
	public function __construct()
	{ 
		parent::__construct();

			$this->load->model('m_port_insignia','sign');	
			$this->load->model('m_port_user', 'user');
			$this->load->model('m_port_position_personal', 'per');
			$this->load->model('m_port_decoration', 'dec');

	}


		public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('sign_date','Subject','trim|required|xss_clean');
		

		
			
			
			

			$this->output_admin('insignia of Instruction','v_test', $data);
		}
	}


	
	}

