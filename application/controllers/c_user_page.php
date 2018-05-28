<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user_page extends Port_core {
	public function index()
	{
		$this->session->set_userdata('menuadmin', false);
		$data['user_id'] = $this->session->userdata('usr_id');;
		$this->output_user('Informatics Portfolio','v_blank_page', $data);
	}
}