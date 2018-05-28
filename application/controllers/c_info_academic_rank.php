<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_prefix extends CI_Controller {

	public function index()
	{
		$data = '';
		$this->output_admin('v_info_prefix_category', $data);
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