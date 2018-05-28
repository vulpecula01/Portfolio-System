<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Port extends CI_Controller {

	public function index()
	{
		echo "string";
		// $data = '';
		// $this->output('v_main', $data);
	}

	public function admin()
	{
		$data = '';
		$this->output_admin('v_main', $data);
	}

	function output($page, $data='')
	{
		$bodypage['v_body'] = $this->load->view($page, $data, TRUE);
		$bodypage['fullname'] = 'ดร.คนึงนิจ กุโบลา';
		$bodypage['positition'] = 'อาจารย์';
		$bodypage['picpath'] = 'kanungnid.png';
		$this->load->view('v_menu_user', $bodypage);
	}

	function output_admin($page, $data='')
	{
		$bodypage['v_body'] = $this->load->view($page, $data, TRUE);
		$bodypage['fullname'] = 'ดร.คนึงนิจ กุโบลา';
		$bodypage['positition'] = 'อาจารย์';
		$bodypage['picpath'] = 'kanungnid.png';
		$this->load->view('v_menu_admin', $bodypage);
	}
}