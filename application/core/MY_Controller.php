<?php
class Port_core extends CI_Controller{  
    private $page;
    private $data;

    public function __construct()
    { 
        parent::__construct();
    }
    /*--------------------------------Admin Output-------------------------------------------------*/
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
        $bodypage['fullname'] = $this->session->userdata('usr_efname').' '.$this->session->userdata('usr_elname');
        $bodypage['picpath'] = $this->session->userdata('usr_picpath');
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
        
        if($this->checkUserAdmin())
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
            redirect("c_login");
        }
    }

    /*--------------------------------User Output-------------------------------------------------*/
    function user_headerScriptCss()
    {
        $bodypage = '';
        return $this->load->view('userTheme/headerScriptCss',$bodypage,TRUE);
    }
    function user_headerScriptJs()
    {
        $bodypage = '';
        return $this->load->view('userTheme/headerScriptJs',$bodypage,TRUE);
    }
    function user_mainheader()
    {
        $bodypage['fullname'] = $this->session->userdata('usr_efname').' '.$this->session->userdata('usr_elname');
        $bodypage['picpath'] = $this->session->userdata('usr_picpath');
        return $this->load->view('userTheme/mainHeader',$bodypage,TRUE);
    }
    function user_slideMenu($user_id='')
    {
        $bodypage['user_id'] = $user_id;
        return $this->load->view('userTheme/slideMenu',$bodypage,TRUE);
    }
    function user_mainFooter()
    {
        $bodypage = '';
        return $this->load->view('userTheme/mainFooter',$bodypage,TRUE);
    }
    // Prayong Nooyen 10/04/2015
    //ฟังก์ชันเรียกหน้า output ประกอบไปด้วย 3 param
    //1. Title ชนิด Text ของหน้านั้นๆ
    //2. page เนื้อหาในหน้านั้นๆ Text 
    //3. data ชุดข้อมูลที่อยู่ในหน้า page
    function output_user($myTile,$page, $data='')
    {
        $bodypage = '';
        
        if($this->checkUser())
        {
			
            $pageData['myTile'] = $myTile;
			$pageData['headerScriptCss'] = $this->user_headerScriptCss();
			$pageData['headerScriptJs'] = $this->user_headerScriptJs();
            $pageData['mainHeader'] = $this->user_mainheader();
            $pageData['slideMenu'] = $this->user_slideMenu(@$data['user_id']);
			
            $pageData['bodyContent'] = $this->load->view($page, $data,TRUE);
            $pageData['mainFooter'] = $this->user_mainFooter();
            $this->load->view('userTheme/blankBody', $pageData);
        }
        else
        {
            redirect("c_login");
        }
    }
    /*-------------------------------------------------------------------------------------------*/

    function output_error()
    {
     $bodypage = '';
     
     if($this->checkUser())
     {
        $pageData['myTile'] = 'Page not found';
        $pageData['headerScriptCss'] = $this->user_headerScriptCss();
        $pageData['headerScriptJs'] = $this->user_headerScriptJs();
        $pageData['mainHeader'] = $this->user_mainheader();
        $pageData['slideMenu'] = '';
        $pageData['bodyContent'] = $this->load->view('error404', '',TRUE);
        $pageData['mainFooter'] = $this->user_mainFooter();
        $this->load->view('userTheme/blankBody', $pageData);
    }
    else
    {
        redirect("c_login");
    } 
}

/*-------------------------------------------------------------------------------------------*/
/* ตรวจสอบ SESSION user*/
function checkUser()
{
    if($this->session->userdata('uaut_id'))
        return true;
    else
        return false;
}
function checkUserAdmin()
{
    if($this->session->userdata('uaut_id') && ($this->session->userdata('aut_admin') == 'Y'))
        return true;
    else
        return false;
}
}