<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require('port.php');
class C_taught extends Port_core {

	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_subject', 'subject');
		$this->load->model('m_port_tech', 'teach');
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

		$this->form_validation->set_rules('subject','Subject','trim|required|integer|xss_clean');
		$this->form_validation->set_rules('semeter','Semeter','trim|alpha_numeric|required|xss_clean');
		$this->form_validation->set_rules('year','Year of award','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');


		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->teach->usr_id = $usr_id;
			$this->teach->tec_year = $this->input->post('year');
			$this->teach->tec_semester = $this->input->post('semeter');
			$this->teach->sub_id = $this->input->post('subject');
			$this->port->trans_begin();
			$this->teach->insert();

		//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_taught/index/'.$uid_encrypt);

		}else{
			$this->teach->usr_id = $usr_id;
			$data['subject'] = $this->subject->getAll();
			$data['teach'] = $this->teach->getAllWithSubjectByUser()->result_array();
			$data['user_id'] = $uid;
			$this->output_user('Teaching Experience', 'v_taught', $data);
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

		$this->form_validation->set_rules('subject','Subject','trim|required|integer|xss_clean');
		$this->form_validation->set_rules('semeter','Semeter','trim|alpha_numeric|required|xss_clean');
		$this->form_validation->set_rules('year','Year of award','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('id','','trim|integer|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);
			$this->teach->tec_id = $this->input->post('id');
			$this->teach->usr_id = $usr_id;
			$this->teach->sub_id = $this->input->post('subject');
			$this->teach->tec_year = $this->input->post('year');
			$this->teach->tec_semester = $this->input->post('semeter');
			
			$this->port->trans_begin();
			$this->teach->update();

		//update query
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
			$result['subject'] = form_error('subject');
			$result['semeter'] = form_error('semeter');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}
	public function delete_self($uid=true){
		$this->teach->tec_id = $this->input->post('id');
		$this->teach->delete();
		//delete query
		redirect('c_taught/index/'.$uid);
	}

	public function getById(){
		$this->teach->tec_id = $this->input->post('tec_id');
		$teach = $this->teach->getById()->row_array();
		$subject = $this->subject->getAll();
        echo '<div class="form-group">
            <input type="hidden" class="form-control" id="editId" name="id" value="'.$teach['tec_id'].'"/>
            <div class="row">
                <div class="col-xs-6">
                    <label>Year of teaching <small class="error year"></small></label>
                    <select class="form-control" name="year">
                        <option value="">Choose</option>';
                        for($i = date("Y"); $i >= (date("Y")-60) ; $i-- ){
                            echo '<option value="'.$i.'"'.($teach['tec_year']==$i?' selected':'').'>'.$i.'</option>';
                        }
                    echo '</select>
                </div>
                <div class="col-xs-6">
                    <label>Semester of teaching <small class="error semeter"></small></label>
                    <select class="form-control" name="semeter">
                        <option value="">Choose</option>
                        <option value="1"'.($teach['tec_semester']==1?' selected':'').'>1</option>
                        <option value="2"'.($teach['tec_semester']==2?' selected':'').'>2</option>
                        <option value="Sum"'.($teach['tec_semester']=='Sum'?' selected':'').'>Summer</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <label>Name of subject <small class="error subject"></small></label>
                    <select class="form-control" name="subject">
                        <option value="">Choose</option>';
                        foreach ($subject as $value) {
                            echo '<option value="'.$value['sub_id'].'"'.($teach['sub_id']==$value['sub_id']?' selected':'').'>'.$value['sub_ename'].'&nbsp;('.$value['sub_tname'].')</option>';
                        }
                    echo '</select>
                </div>
            </div>
        </div>';
    }
}