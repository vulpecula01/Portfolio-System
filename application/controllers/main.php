<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data = '';
		$this->load->view('v_list_teacher', $data);
	}
}