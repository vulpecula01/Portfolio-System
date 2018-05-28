<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_interest extends Port_core {
	
	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_interest', 'itr');
		$this->load->model('m_port_interesttype','itt');
	}
	
	public function index($uid=true)
	{
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

		$this->form_validation->set_rules('int_tname','Interest (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('int_ename','Interest (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('int_type','Interest Type','trim|required|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->itr->int_tname = $this->input->post('int_tname');
			$this->itr->int_ename = $this->input->post('int_ename');
			$this->itr->itt_id = $this->input->post('int_type');
			$this->itr->usr_id = $usr_id;

			$this->port->trans_begin();
			$this->itr->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_interest/index/'.$uid_encrypt);

		}else{
			$this->itr->usr_id = $usr_id;
			$data['itt'] = $this->itt->getAll();
			$data['itr'] = $this->itr->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('Interests', 'v_interest', $data);
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

		$this->form_validation->set_rules('int_tname','Interest (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('int_ename','Interest (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('int_type','Interest Type','trim|required|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->itr->int_id = $this->input->post('int_id');
			$this->itr->int_tname = $this->input->post('int_tname');
			$this->itr->int_ename = $this->input->post('int_ename');
			$this->itr->itt_id = $this->input->post('int_type');
			$this->itr->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->itr->update();

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
			$result['int_tname'] = form_error('int_tname');
			$result['int_ename'] = form_error('int_ename');
			$result['int_type']  = form_error('int_type');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->itr->int_id = $this->input->post('int_id');
		$this->itr->delete();
		//delete query
		redirect('c_interest/index/'.$uid);
	}

	public function getById(){
		$this->itr->int_id = $this->input->post('int_id');
		$usr_id = $this->session->userdata('usr_id');
		$this->itr->usr_id = $usr_id;

		$itt = $this->itt->getAll();
		$itr = $this->itr->getById()->row_array();
		echo '<div class="form-group">
				<input type="hidden" class="form-control" id="editId" name="int_id" value="'.$itr['int_id'].'"/>
				<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>ประเภทความสนใจ <small class="error int_type"></small></label>
                                <select class="form-control" name="int_type">
                                    <option value="">Choose</option>';
                                    foreach ($itt as $value) {  
                                        echo '<option value="'.$value['itt_id'].'"'.($itr['itt_id'] == $value['itt_id']?' selected':'').'>'.$value['itt_ename'].' ('.$value['itt_tname'].')</option>';
                                    }
                                echo '</select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>ความสนใจ (TH) <small class="error int_tname"></small></label>
                            <input type="text" class="form-control" name="int_tname" value="'.$itr['int_tname'].'" placeholder="โปรดกรอกชื่อความสนใจเป็นภาษาไทย" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>ความสนใจ (EN) <small class="error int_ename"></small></label>
                            <input type="text" class="form-control" name="int_ename" value="'.$itr['int_ename'].'" placeholder="โปรดกรอกชื่อความสนใจเป็นอังกฤษ" />
                        </div>
                    </div>
                </div>
        	</div>';
	}
}