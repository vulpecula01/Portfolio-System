<?php
class Port_controller extends CI_Controller{	
	public function __construct()
	{ 
		parent::__construct();
	}

	function admin_headerScriptCss()
	{
		$bodypage = '';
		return $this->load->view('adminTheme/headerScriptCss',$bodypage,TRUE);
	}
	function admin_headerScriptJs()
	{
		$bodypage = '';
		return $this->load->view('adminTheme/headerScriptJs',$bodypage,TRUE);
	}
	function admin_mainheader()
	{
		$bodypage['v_body'] = $this->load->view($page, $data, TRUE);
		$bodypage['fullname'] = 'ดร.คนึงนิจ กุโบลา';
		$bodypage['positition'] = 'อาจารย์';
		$bodypage['picpath'] = 'kanungnid.png';
		return $this->load->view('adminTheme/mainHeader',$bodypage,TRUE);
	}
	function admin_slideMenu()
	{
		$bodypage = '';
		return $this->load->view('adminTheme/slideMenu',$bodypage,TRUE);
	}
	function admin_mainFooter()
	{
		$bodypage = '';
		return $this->load->view('adminTheme/mainFooter',$bodypage,TRUE);
	}
	
	// Prayong Nooyen 09/04/2015
	//ฟังก์ชันเรียกหน้า output ประกอบไปด้วย 3 param
	//1. Title ชนิด Text ของหน้านั้นๆ
	//2. page เนื้อหาในหน้านั้นๆ Text 
	//3. data ชุดข้อมูลที่อยู่ในหน้า page
	function output_admin($myTile,$page, $data='')
	{
		$bodypage = '';
		
		if($this->checkUser())
		{
			$pageData['myTile'] = $myTile;
			$pageData['headerScriptCss'] = $this->admin_headerScriptCss();
			$pageData['headerScriptJs'] = $this->admin_headerScriptJs();
			$pageData['mainHeader'] = $this->admin_mainheader();
			$pageData['slideMenu'] = $this->admin_slideMenu();
			$pageData['bodyContent'] = $this->load->view($page, $data,TRUE);
			$pageData['mainFooter'] = $this->admin_mainFooter();
			$this->load->view('adminTheme/blankBody', $pageData);
		}
		else
		{
			$this->load->view('loginPort');
		}
	}

	function checkUser()
	{
		if($this->session->userdata('userId'))
			return true;
		else
			return false;
	}
}