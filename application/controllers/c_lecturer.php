<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_lecturer extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_lecturer', 'lecturer');
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

		$this->form_validation->set_rules('lecturerTH','Lecturer of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('lecturerEN','Lecturer of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','Location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of lecturer','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->lecturer->lec_tname = $this->input->post('lecturerTH');
			$this->lecturer->lec_ename = $this->input->post('lecturerEN');
			$this->lecturer->lec_tlocation = $this->input->post('locationTH');
			$this->lecturer->lec_elocation = $this->input->post('locationEN');
			$this->lecturer->lec_date = $this->input->post('year');
			$this->lecturer->usr_id = $usr_id;
			$this->port->trans_begin();
			$this->lecturer->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_lecturer/index/'.$uid_encrypt);

		}else{
			$this->lecturer->usr_id = $usr_id;
			$data['lecturer'] = $this->lecturer->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('lecturer', 'v_lecturer', $data);
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

		$this->form_validation->set_rules('lecturerTH','Lecturer of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('lecturerEN','Lecturer of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','Location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of lecturer','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('id','Lecturer of (TH)','trim|integer|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->lecturer->lec_id = $this->input->post('id');
			$this->lecturer->lec_tname = $this->input->post('lecturerTH');
			$this->lecturer->lec_ename = $this->input->post('lecturerEN');
			$this->lecturer->lec_tlocation = $this->input->post('locationTH');
			$this->lecturer->lec_elocation = $this->input->post('locationEN');
			$this->lecturer->lec_date = $this->input->post('year');
			$this->lecturer->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->lecturer->update();

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
			$result['lecturerTH'] = form_error('lecturerTH');
			$result['lecturerEN'] = form_error('lecturerEN');
			$result['locationTH'] = form_error('locationTH');
			$result['locationEN'] = form_error('locationEN');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->lecturer->lec_id = $this->input->post('id');
		$this->lecturer->delete();
		//delete query
		redirect('c_lecturer/index/'.$uid);
	}

	public function getById(){
		$this->lecturer->lec_id = $this->input->post('lec_id');
		$lecturer = $this->lecturer->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="id" value="'.$lecturer['lec_id'].'"/>
            <div class="row">
                <div class="col-xs-6">
                    <label>วิทยากรในหัวข้อ [EN] <small class="error lecturerEN"></small></label>
                    <input type="text" class="form-control" name="lecturerEN" placeholder="Enter ..." value="'.$lecturer['lec_ename'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>วิทยากรในหัวข้อ [TH] <small class="error lecturerTH"></small></label>
                    <input type="text" class="form-control" name="lecturerTH" placeholder="Enter ..." value="'.$lecturer['lec_tname'].'"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ปีที่เป็นวิทยากร <small class="error year"></small></label>
                    <select class="form-control" name="year">
                        <option value="">choose</option>';
                         for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($i == $lecturer['lec_date']?' selected':'').'>'.$i.'</option>';
                         }
                    echo '</select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>สถานที่ [EN] <small class="error locationEN"></small></label>
                    <input type="text" class="form-control" name="locationEN" placeholder="Enter ..." value="'.$lecturer['lec_elocation'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>สถานที่ [TH] <small class="error locationTH"></small></label>
                    <input type="text" class="form-control" name="locationTH" placeholder="Enter ..." value="'.$lecturer['lec_tlocation'].'"/>
                </div>
            </div>
        </div>';
	}
}