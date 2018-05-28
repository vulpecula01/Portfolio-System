<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_user_information extends Port_core {
	public function index($uid_encrypt="")
	{
		// $this->session->set_userdata('adminmanage', true);
		// $this->session->set_userdata('adminuserid', $uid);
		// $uid_encrypt = strtr(
  //               $uid_encrypt,
  //               array(
  //                   '.' => '+',
  //                   '-' => '=',
  //                   '~' => '/'
  //               )
  //       );
		// $uid = $this->encrypt->decode($uid_encrypt);
		// echo $uid_encrypt; echo '<br><br>'; 
		// echo $uid; echo '<br><br>'; 
		// die();
		redirect('c_general_information/index/'.$uid_encrypt);
	}
}