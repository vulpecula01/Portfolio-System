<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_activity extends Port_core {

	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_activity', 'jobex');
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

		$this->form_validation->set_rules('jobexTH','Activity (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('jobexENG','Activity (ENG)','trim|required|xss_clean');
		
		$this->form_validation->set_rules('yearFrom','Year Start','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		
		
		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->jobex->at_name = $this->input->post('jobexTH');
			$this->jobex->at_ename = $this->input->post('jobexENG');
			
			$this->jobex->at_date = $this->input->post('yearFrom');
			
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
			redirect('c_activity/index/'.$uid_encrypt);

		}else{
			$this->jobex->usr_id = $usr_id;
			$data['jobex'] = $this->jobex->getByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('Activity', 'v_activity', $data);
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

		$this->form_validation->set_rules('jobexTH','Activity','trim|required|xss_clean');
		$this->form_validation->set_rules('jobexENG','Activity','trim|required|xss_clean');
	
		$this->form_validation->set_rules('yearFrom','Year Start','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');


		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->jobex->at_id = $this->input->post('at_id');
			$this->jobex->at_name = $this->input->post('jobexTH');
			$this->jobex->at_ename = $this->input->post('jobexENG');
			
			$this->jobex->at_date = $this->input->post('yearFrom');
		
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
			$result['jobexTH'] = form_error('jobexENG');
			$result['yearFrom'] = form_error('yearFrom');
			
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->jobex->at_id = $this->input->post('at_id');
		$this->jobex->delete();
		//delete query
		redirect('c_activity/index/'.$uid);
	}

	public function getById(){
		$this->jobex->at_id = $this->input->post('at_id');
		$jobex = $this->jobex->getById()->row_array();
		echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="at_id" value="'.$jobex['at_id'].'"/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6"> 
                    <div class="form-group">
                        <label for="fromyear">ปีที่เริ่มกิจกรรม <small class="error yearFrom"></small></label>
                        <select name="yearFrom" id="fromyear" onchange="onFromYearClick(this)" temp="_id" class="form-control">
                            <option value="">start year</option>';
                            for($i = date("Y"); $i >= (date("Y")-50) ; $i-- ){
                                echo '<option value="'.$i.'"';
                                echo ($jobex['at_date'] == $i?' selected':'');
                                echo '>'.$i.'</option>';
                            }
                        echo '</select>
                    </div><!-- /.form group -->
                </div>
				</div>
				 <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label>ชื่อกิจกรรม (ENG) <small class="error jobexENG"></small></label>
                        <input type="text" class="form-control" name="jobexENG" value="'.$jobex['at_ename'].'" placeholder="โปรดใส่ชื่อกิจกรรมเป็นภาษาอังกฤษ"/>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12"> 
                    <div class="form-group">
                        <label>ชื่อกิจกรรม(TH) <small class="error jobexTH"></small></label>
                        <input type="text" class="form-control" name="jobexTH" value="'.$jobex['at_name'].'" placeholder="โปรดใส่ชื่อกิจกรรมเป็นภาษาไทย"/>
                    </div>
                </div>
            
            
        </div>';
	}
}