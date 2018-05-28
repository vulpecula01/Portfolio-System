<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_director extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_director', 'director');
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

		$this->form_validation->set_rules('directorTH','director of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('directorEN','director of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year ','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->director->di_tname = $this->input->post('directorTH');
			$this->director->di_ename = $this->input->post('directorEN');
			$this->director->di_tlocation = $this->input->post('locationTH');
			$this->director->di_elocation = $this->input->post('locationEN');
			$this->director->di_date = $this->input->post('year');
			$this->director->usr_id = $usr_id;
			$this->port->trans_begin();
			$this->director->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_director/index/'.$uid_encrypt);

		}else{
			$this->director->usr_id = $usr_id;
			$data['director'] = $this->director->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('director', 'v_director', $data);
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

		$this->form_validation->set_rules('directorTH','Director of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('directorEN','Director of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','Location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','Location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('id','Director','trim|integer|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->director->di_id = $this->input->post('id');
			$this->director->di_tname = $this->input->post('directorTH');
			$this->director->di_ename = $this->input->post('directorEN');
			$this->director->di_tlocation = $this->input->post('locationTH');
			$this->director->di_elocation = $this->input->post('locationEN');
			$this->director->di_date = $this->input->post('year');
			$this->director->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->director->update();

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
			$result['directorTH'] = form_error('directorTH');
			$result['directorEN'] = form_error('directorEN');
			$result['locationTH'] = form_error('locationTH');
			$result['locationEN'] = form_error('locationEN');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->director->di_id = $this->input->post('id');
		$this->director->delete();
		//delete query
		redirect('c_director/index/'.$uid);
	}

	public function getById(){
		$this->director->di_id = $this->input->post('di_id');
		$director = $this->director->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="id" value="'.$director['di_id'].'"/>
            <div class="row">
                <div class="col-xs-6">
                    <label>เป็นกรรมการในหัวข้อ [EN] <small class="error directorEN"></small></label>
                    <input type="text" class="form-control" name="directorEN" placeholder="Enter ..." value="'.$director['di_ename'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>เป็นกรรมการในหัวข้อ [TH] <small class="error directorTH"></small></label>
                    <input type="text" class="form-control" name="directorTH" placeholder="Enter ..." value="'.$director['di_tname'].'"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ปีที่เป็นกรรมการ <small class="error year"></small></label>
                    <select class="form-control" name="year">
                        <option value="">choose</option>';
                         for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($i == $director['di_date']?' selected':'').'>'.$i.'</option>';
                         }
                    echo '</select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ตำแหน่ง [EN] <small class="error locationEN"></small></label>
                    <input type="text" class="form-control" name="locationEN" placeholder="Enter ..." value="'.$director['di_elocation'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>ตำแหน่ง [TH] <small class="error locationTH"></small></label>
                    <input type="text" class="form-control" name="locationTH" placeholder="Enter ..." value="'.$director['di_tlocation'].'"/>
                </div>
            </div>
        </div>';
	}
}