<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_page extends Port_core {
	public function index()
	{
		$this->session->set_userdata('menuadmin', true);
		$this->output_admin('Informatics Portfolio','v_blank_page');
	}
}