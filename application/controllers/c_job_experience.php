<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_job_experience extends Port_core {

	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_jobexperience', 'jobex');
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

		$this->form_validation->set_rules('jobexTH','The Job Experience (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('jobexEN','The Job Experience  (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('yearFrom','Year Start','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('yearTo','Year End','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->jobex->jox_tname = $this->input->post('jobexTH');
			$this->jobex->jox_ename = $this->input->post('jobexEN');
			$this->jobex->jox_fromdate = $this->input->post('yearFrom');
			$this->jobex->jox_todate   = $this->input->post('yearTo');
			$this->jobex->usr_id = $usr_id;
			$this->port->trans_begin();
			$this->jobex->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_job_experience/index/'.$uid_encrypt);

		}else{
			$this->jobex->usr_id = $usr_id;
			$data['jobex'] = $this->jobex->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('Job Experience', 'v_job_experience', $data);
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

		$this->form_validation->set_rules('jobexTH','The Job Experience (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('jobexEN','The Job Experience  (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('yearFrom','Year Start','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('yearTo','Year End','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->jobex->jox_id = $this->input->post('jox_id');
			$this->jobex->jox_tname = $this->input->post('jobexTH');
			$this->jobex->jox_ename = $this->input->post('jobexEN');
			$this->jobex->jox_fromdate = $this->input->post('yearFrom');
			$this->jobex->jox_todate   = $this->input->post('yearTo');
			$this->jobex->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->jobex->update();

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
			$result['jobexTH'] = form_error('jobexTH');
			$result['jobexEN'] = form_error('jobexEN');
			$result['yearFrom'] = form_error('yearFrom');
			$result['yearTo'] = form_error('yearTo');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->jobex->jox_id = $this->input->post('jox_id');
		$this->jobex->delete();
		//delete query
		redirect('c_job_experience/index/'.$uid);
	}

	public function getById(){
		$this->jobex->jox_id = $this->input->post('jox_id');
		$jobex = $this->jobex->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="jox_id" value="'.$jobex['jox_id'].'"/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6"> 
                    <div class="form-group">
                        <label for="fromyear">ปีที่เริ่มทำงาน <small class="error yearFrom"></small></label>
                        <select name="yearFrom" id="fromyear" onchange="onFromYearClick(this)" temp="_id" class="form-control">
                            <option value="">start year</option>';
                            for($i = date("Y"); $i >= (date("Y")-50) ; $i-- ){
                                echo '<option value="'.$i.'"';
                                echo ($jobex['jox_fromdate'] == $i?' selected':'');
                                echo '>'.$i.'</option>';
                            }
                        echo '</select>
                    </div><!-- /.form group -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6"> 
                    <div class="form-group">
                        <label for="toyear_id">ปีที่สิ้นสุด <small class="error yearTo"></small></label>
                        <select name="yearTo" id="toyear_id" class="form-control">
                            <option value="">stop year</option>';
                            echo '<option value="'.$jobex['jox_todate'].'"'.($jobex['jox_todate'] == '9999'?'selected':'').'>present</option>';
                            for($i = date("Y"); $i >= $jobex['jox_fromdate'] ; $i-- ){
                                echo '<option value="'.$i.'"';
                                echo ($jobex['jox_todate'] == $i?' selected':'');
                                echo '>'.$i.'</option>';
                            }
                            
                        echo '</select>
                    </div><!-- /.form group -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label>ประสบการณ์การทำงาน (TH) <small class="error jobexTH"></small></label>
                        <input type="text" class="form-control" name="jobexTH" value="'.$jobex['jox_tname'].'" placeholder="โปรดกรอกประสบการณ์เป็นภาษาไทย"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label>ประสบการณ์การทำงาน (EN) <small class="error jobexEN"></small></label>
                        <input type="text" class="form-control" name="jobexEN" value="'.$jobex['jox_ename'].'" placeholder="โปรดกรอกประสบการณ์เป็นภาษาอังกฤษ"/>
                    </div>
                </div>
            </div>
        </div>';
	}
}