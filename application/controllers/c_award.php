<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_award extends Port_core {


	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_award', 'award');
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

		$this->form_validation->set_rules('titleTh','Project Title (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('titleEn','Project Title (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('factorTh','Institutional (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('factorEn','Institutional (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of award','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->award->awd_tname = $this->input->post('titleTh');
			$this->award->awd_ename = $this->input->post('titleEn');
			$this->award->awd_tinsitute = $this->input->post('factorTh');
			$this->award->awd_einsitute = $this->input->post('factorEn');
			$this->award->awd_date = $this->input->post('year');
			$this->award->usr_id = $usr_id;
			$this->port->trans_begin();
			$this->award->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_award/index/'.$uid_encrypt);

		}else{
			$this->award->usr_id = $usr_id;
			$data['award'] = $this->award->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('Award', 'v_award', $data);
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

		$this->form_validation->set_rules('titleTh','Project Title (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('titleEn','Project Title (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('factorTh','Institutional (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('factorEn','Institutional (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year of award','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('id','Project Title (TH)','trim|integer|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->award->awd_id = $this->input->post('id');
			$this->award->awd_tname = $this->input->post('titleTh');
			$this->award->awd_ename = $this->input->post('titleEn');
			$this->award->awd_tinsitute = $this->input->post('factorTh');
			$this->award->awd_einsitute = $this->input->post('factorEn');
			$this->award->awd_date = $this->input->post('year');
			$this->award->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->award->update();

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
			$result['titleTh'] = form_error('titleTh');
			$result['titleEn'] = form_error('titleEn');
			$result['factorTh'] = form_error('factorTh');
			$result['factorEn'] = form_error('factorEn');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->award->awd_id = $this->input->post('id');
		$this->award->delete();
		//delete query
		redirect('c_award/index/'.$uid);
	}

	public function getById(){
		$this->award->awd_id = $this->input->post('awd_id');
		$award = $this->award->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="id" value="'.$award['awd_id'].'"/>
            <div class="row">
                <div class="col-xs-6">
                    <label>ชื่อรางวัล [EN] <small class="error titleEn"></small></label>
                    <input type="text" class="form-control" name="titleEn" placeholder="Enter ..." value="'.$award['awd_ename'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>ชื่อรางวัล [TH] <small class="error titleTh"></small></label>
                    <input type="text" class="form-control" name="titleTh" placeholder="Enter ..." value="'.$award['awd_tname'].'"/>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ปีที่ได้รับรางวัล <small class="error year"></small></label>
                    <select class="form-control" name="year">
                        <option value="">choose</option>';
                         for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($i == $award['awd_date']?' selected':'').'>'.$i.'</option>';
                         }
                    echo '</select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <label>ปัจจัยทางสถาบันที่ได้รับรางวัล [EN] <small class="error factorEn"></small></label>
                    <input type="text" class="form-control" name="factorEn" placeholder="Enter ..." value="'.$award['awd_einsitute'].'"/>
                </div>
                <div class="col-xs-6">
                    <label>ปัจจัยทางสถาบันที่ได้รับรางวัล [TH] <small class="error factorTh"></small></label>
                    <input type="text" class="form-control" name="factorTh" placeholder="Enter ..." value="'.$award['awd_tinsitute'].'"/>
                </div>
            </div>
        </div>';
	}
}