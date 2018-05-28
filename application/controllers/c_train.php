<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_train extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_train', 'train');
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

		$this->form_validation->set_rules('trainTH','Train of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('trainEN','Train of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','Location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Hours','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of train','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->train->tr_tname = $this->input->post('trainTH');
			$this->train->tr_ename = $this->input->post('trainEN');
			$this->train->tr_tlocation = $this->input->post('locationTH');
			$this->train->tr_elocation = $this->input->post('locationEN');
			$this->train->tr_hour = $this->input->post('hour');
			$this->train->tr_date = $this->input->post('year');
			$this->train->usr_id = $usr_id;
			$this->port->trans_begin();
			$this->train->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_train/index/'.$uid_encrypt);

		}else{
			$this->train->usr_id = $usr_id;
			$data['train'] = $this->train->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('train', 'v_train', $data);
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

		$this->form_validation->set_rules('trainTH','Train of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('trainEN','Train of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','Location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of train','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('hour','Hours','trim|required|xss_clean');
		$this->form_validation->set_rules('id','train of (TH)','trim|integer|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->train->tr_id = $this->input->post('id');
			$this->train->tr_tname = $this->input->post('trainTH');
			$this->train->tr_ename = $this->input->post('trainEN');
			$this->train->tr_tlocation = $this->input->post('locationTH');
			$this->train->tr_elocation = $this->input->post('locationEN');
			$this->train->tr_hour = $this->input->post('hour');
			$this->train->tr_date = $this->input->post('year');
			$this->train->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->train->update();

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
			$result['trainTH'] = form_error('trainTH');
			$result['trainEN'] = form_error('trainEN');
			$result['locationTH'] = form_error('locationTH');
			$result['locationEN'] = form_error('locationEN');
			$result['hour'] = form_error('hour');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->train->tr_id = $this->input->post('id');
		$this->train->delete();
		//delete query
		redirect('c_train/index/'.$uid);
	}

	public function getById(){
		$this->train->tr_id = $this->input->post('tr_id');
		$train = $this->train->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="id" value="'.$train['tr_id'].'"/>
            <div class="row">
                <div class="col-xs-6">
                    <label>ชื่อการอบรม [EN] <small class="error trainEN"></small></label>
                    <input type="text" class="form-control" name="trainEN" placeholder="Enter ..." value="'.$train['tr_ename'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>ชื่อการอบรม [TH] <small class="error trainTH"></small></label>
                    <input type="text" class="form-control" name="trainTH" placeholder="Enter ..." value="'.$train['tr_tname'].'"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ปีที่อบรม <small class="error year"></small></label>
                    <select class="form-control" name="year">
                        <option value="">choose</option>';
                         for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($i == $train['tr_date']?' selected':'').'>'.$i.'</option>';
                         }
                    echo '</select>
                </div>
				<div class="col-xs-6">
                    <label>ชั่วโมงการอบรม <small class="error hour"></small></label>
                    <input type="text" class="form-control" name="hour" placeholder="Enter ..." value="'.$train['tr_hour'].'"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>สถานที่อบรม [EN] <small class="error locationEN"></small></label>
                    <input type="text" class="form-control" name="locationEN" placeholder="Enter ..." value="'.$train['tr_elocation'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>สถานที่อบรม [TH] <small class="error locationTH"></small></label>
                    <input type="text" class="form-control" name="locationTH" placeholder="Enter ..." value="'.$train['tr_tlocation'].'"/>
                </div>
            </div>
        </div>';
	}
}