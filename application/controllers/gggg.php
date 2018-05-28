<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class gggg extends CI_Controller {
	
public function index()
	{
	$data['data'] = $this->test->gets_insignia();
	print_r($data);
	}
}