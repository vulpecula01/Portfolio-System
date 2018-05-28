<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_insignia extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_insignia_user', 'insignia');
		$this->load->model('m_port_decoration', 'dec');
	}


	public function index($uid=true){
		// edit by Sarin
		if($uid === true) {
			$usr_id = $this->session->userdata('usr_id');			
		} else {
			$uid_encrypt = $uid;
			$uid = strtr(
                $uid,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
       		);
			$uid = 	$this->encrypt->decode($uid);		
			$usr_id = $uid;
		}
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);


			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_insignia/index/'.$uid_encrypt);

		}else{
			$this->load->model('m_port_decoration', 'dec');
			$this->load->model('m_port_insignia_user', 'insignia');
			$this->insignia->usr_id = $usr_id;
			
				
			$data['insignia'] = $this->insignia->getByUser()->result_array();
			$data['dec'] = $this->dec->getAll();
			

			
			$data['user_id'] = $uid;
			$data['dec'] = $this->dec->getAll();
			$this->output_user('insignia', 'v_insignia', $data);
		}
	}

	public function update_self($uid=true){
		// edit by Sarin
		if($uid === true) {
			$usr_id = $this->session->userdata('usr_id');			
		} else {
			$uid_encrypt = $uid;
			$uid = strtr(
                $uid,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
                )
       		);
			$uid = 	$this->encrypt->decode($uid);		
			$usr_id = $uid;
		}
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			
			$this->port->trans_begin();
			//update query
			$this->insignia->update();

			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			$result['message'] = 'success';
			echo json_encode($result);

		}else{
			
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->insignia->sign_id = $this->input->post('id');
		$this->insignia->delete();
		//delete query
		redirect('c_insignia/index/'.$uid);
	}

	public function getById(){
		$this->load->model('m_port_insignia_user', 'insignia');
		$this->load->model('m_port_decoration', 'dec');
		$this->insignia->sign_id = $this->input->post('sign_id');
		$dec = $this->dec->getAll();
		$insignia = $this->insignia->getByKey()->row_array();
		
	}
}