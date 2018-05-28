<?php 
class my404 extends Port_core 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
        $this->output->set_status_header('404'); 
        $this->output_error();
        //$data['content'] = 'error_404'; // View name 
        //$this->load->view('index',$data);//loading in my template 
    } 
} 
?> 