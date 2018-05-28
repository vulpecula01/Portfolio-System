<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_education_background extends Port_core {

	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('m_port_educationalbackground','edb');
		$this->load->model('m_port_institute','ins');
		$this->load->model('m_port_country','cou');
		$this->load->model('m_port_degree','deg');
		$this->load->model('m_port_major','maj');
		$this->load->model('m_port_level','edl');

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

		$data = '';
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');

		$this->form_validation->set_rules('edb_yeargraduate','Year Graduate','trim|required|xss_clean');
		$this->form_validation->set_rules('edb_tthesistopic','Thesis Topic (TH)','trim|xss_clean');
		$this->form_validation->set_rules('edb_ethesistopic','Thesis Topic (EN)','trim|xss_clean');
		//$this->form_validation->set_rules('edb_no','edb_no','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_id','Country','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_id','Education level','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_id','Institute','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_id','Degree','trim|required|xss_clean');
		$this->form_validation->set_rules('maj_id','Major','trim|required|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->edb->edb_yeargraduate = $this->input->post('edb_yeargraduate');
			$this->edb->edb_tthesistopic = $this->input->post('edb_tthesistopic');
			$this->edb->edb_ethesistopic = $this->input->post('edb_ethesistopic');
			// $this->edb->edb_no = $this->input->post('edb_no');
			// $this->edb->cou_id = $this->input->post('cou_id');
			$this->edb->edl_id = $this->input->post('edl_id');
			$this->edb->ins_id = $this->input->post('ins_id');
			$this->edb->deg_id = $this->input->post('deg_id');
			$this->edb->maj_id = $this->input->post('maj_id');
			$this->edb->usr_id = $usr_id;

			$this->port->trans_begin();
			$this->edb->insert();

			//insert query
			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect('c_education_background/index/'.$uid_encrypt);

		}else{
			$this->edb->usr_id = $usr_id;

			$data['edb'] = $this->edb->getByUser()->result_array();
			$data['ins'] = $this->ins->getAll(array('ins_ename' => 'ASC','ins_tname' => 'ASC'));
			$data['cou'] = $this->cou->getAll(array('cou_ename' => 'ASC','cou_tname' => 'ASC'));
			$data['deg'] = $this->deg->getAll(array('deg_ename' => 'ASC','deg_tname' => 'ASC'));
			$data['maj'] = $this->maj->getAll(array('maj_ename' => 'ASC','maj_tname' => 'ASC'));
			$data['edl'] = $this->edl->getAll();
			$data['user_id'] = $uid;


			$this->output_user('Educational Background', 'v_education_background.php', $data);
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

		$this->form_validation->set_rules('edb_yeargraduate','Year Graduate','trim|required|xss_clean');
		$this->form_validation->set_rules('edb_tthesistopic','Thesis Topic (TH)','trim|xss_clean');
		$this->form_validation->set_rules('edb_ethesistopic','Thesis Topic (EN)','trim|xss_clean');
		//$this->form_validation->set_rules('edb_no','edb_no','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_id','Country','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_id','Education level','trim|required|xss_clean');
		$this->form_validation->set_rules('ins_id','Institute','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_id','Degree','trim|required|xss_clean');
		$this->form_validation->set_rules('maj_id','Major','trim|required|xss_clean');

		if($this->form_validation->run() == true){

			$this->port = $this->load->database('port', TRUE);

			$this->edb->edb_id = $this->input->post('edb_id');
			$this->edb->edb_yeargraduate = $this->input->post('edb_yeargraduate');
			$this->edb->edb_tthesistopic = $this->input->post('edb_tthesistopic');
			$this->edb->edb_ethesistopic = $this->input->post('edb_ethesistopic');
			// $this->edb->edb_no = $this->input->post('edb_no');
			// $this->edb->cou_id = $this->input->post('cou_id');
			$this->edb->edl_id = $this->input->post('edl_id');
			$this->edb->ins_id = $this->input->post('ins_id');
			$this->edb->deg_id = $this->input->post('deg_id');
			$this->edb->maj_id = $this->input->post('maj_id');
			$this->edb->usr_id = $usr_id;
			$this->port->trans_begin();
			//update query
			$this->edb->update();

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
			$result['edb_yeargraduate'] = form_error('edb_yeargraduate');
			$result['edb_tthesistopic'] = form_error('edb_tthesistopic');
			$result['edb_ethesistopic'] = form_error('edb_ethesistopic');
			// $result['edb_no']  = form_error('edb_no');
			$result['cou_id']  = form_error('cou_id');
			$result['edl_id']  = form_error('edl_id');
			$result['ins_id']  = form_error('ins_id');
			$result['deg_id']  = form_error('deg_id');
			$result['maj_id']  = form_error('maj_id');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	public function delete_self($uid=true){
		$this->edb->edb_id = $this->input->post('edb_id');
		$this->edb->delete();
		//delete query
		redirect('c_education_background/index/'.$uid);
	}

	public function getById(){
		$this->edb->edb_id = $this->input->post('edb_id');
		// $usr_id = $this->session->userdata('usr_id');
		// $this->edb->usr_id = $usr_id;

		$ins = $this->ins->getAll(array('ins_ename' => 'ASC','ins_tname' => 'ASC'));
		$cou = $this->cou->getAll(array('cou_ename' => 'ASC','cou_tname' => 'ASC'));
		$deg = $this->deg->getAll(array('deg_ename' => 'ASC','deg_tname' => 'ASC'));
		$maj = $this->maj->getAll(array('maj_ename' => 'ASC','maj_tname' => 'ASC'));
		$edl = $this->edl->getAll();
		$edb = $this->edb->getByKey()->row_array();
		echo '<div class="form-group">
				<input type="hidden" class="form-coutrol" id="editId" name="edb_id" value="'.$edb['edb_id'].'"/>
				<div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="inputEduc">ระดับการศึกษา <small class="error edl_id"></small></label>
                                      <select id="inputEducM" name="edl_id" class="form-control" datatype="M" onchange="edl_change(this)">
                                        <option value="">Choose</option>';
                                        foreach ($edl as $value) { 
                                            echo '<option value="'.$value['edl_id'].'"'.($edb['edl_id'] == $value['edl_id']?' selected':'').'>'.$value['edl_ename'].' ('.$value['edl_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label for="inputDegree">ปริญญา <small class="error deg_id"></small></label>
                                    <select id="inputDegreeM" name="deg_id"  class="form-control" datatype="M" onchange="deg_change(this)">
                                        <option value="">Choose</option>';
                                        foreach ($deg as $value) { 
                                            echo '<option value="'.$value['deg_id'].'" dataedl="'.$value['edl_id'].'"'.($edb['deg_id'] == $value['deg_id']?' selected':'').'>'.$value['deg_ename'].' ('.$value['deg_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputDepartment">วิชาเอก <small class="error maj_id"></small></label>
                                    <select id="inputDepartment" name="maj_id"  class="form-control">
                                        <option value="">Choose</option>';
                                        foreach ($maj as $value) { 
                                            echo '<option value="'.$value['maj_id'].'"'.($edb['maj_id'] == $value['maj_id']?' selected':'').'>'.$value['maj_ename'].' ('.$value['maj_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="inputYear">ปีที่่สำเร็จการศึกษา <small class="error edb_yeargraduate"></small></label>
                                    <select name="edb_yeargraduate" class="form-control">
                                        <option value="">choose</option>';
                                        for($i = date("Y"); $i >= (date("Y")-40) ; $i-- ){
                                            echo '<option value="'.$i.'"'.($edb['edb_yeargraduate'] == $i?' selected':'').'>'.$i.'</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label for="inputCountry">ประเทศ <small class="error cou_id"></small></label>
                                    <select id="inputCountryM" name="cou_id" class="form-control" datatype="M" onchange="cou_change(this)">
                                        <option value="">Choose</option>';
                                        foreach ($cou as $value) { 
                                            echo '<option value="'.$value['cou_id'].'"'.($edb['cou_id'] == $value['cou_id']?' selected':'').'>'.$value['cou_ename'].' ('.$value['cou_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputInstitute">สถาบัน <small class="error ins_id"></small></label>
                                    <select id="inputInstituteM" name="ins_id" class="form-control" datatype="M" onchange="ins_change(this)">
                                        <option value="">Choose</option>';
                                        foreach ($ins as $value) { 
                                            echo '<option value="'.$value['ins_id'].'" datacou="'.$value['cou_id'].'"'.($edb['ins_id'] == $value['ins_id']?' selected':'').'>'.$value['ins_ename'].' ('.$value['ins_tname'].')</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                            
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputThesis">หัวข้อวิทยานิพนธ์ (TH) <small class="error edb_tthesistopic"></small></label>
                                    <input type="text" class="form-control" id="inputThesis" 
                                    name="edb_tthesistopic" value="'.$edb['edb_tthesistopic'].'" placeholder="โปรดกรอกชื่อหัวข้อวิทยานิพนธ์เป็นภาษาไทย">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputThesis">หัวข้อวิทยานิพนธ์ (EN) <small class="error edb_ethesistopic"></small></label>
                                    <input type="text" class="form-control" id="inputThesis" 
                                    name="edb_ethesistopic" value="'.$edb['edb_ethesistopic'].'" placeholder="โปรดกรอกชื่อหัวข้อวิทยานิพนธ์เป็นภาษาอังกฤษ">
                                </div>
                            </div>
                        </div>
        	  </div>';
	}

	function getDegreeByEdlId(){
		$this->deg->edl_id = $this->input->post('edl_id');
		$result = $this->deg->getByEdlId();
			echo '<option value="">Choose</option>';
		foreach ($result as $value) { 
            echo '<option value="'.$value['deg_id'].'">'.$value['deg_ename'].' ('.$value['deg_tname'].')</option>';
        }
	}

	function getInstituteByCouId(){
		$this->ins->cou_id = $this->input->post('cou_id');
		$result = $this->ins->getByCouId();
			echo '<option value="">Choose</option>';
		foreach ($result as $value) { 
            echo '<option value="'.$value['ins_id'].'">'.$value['ins_ename'].' ('.$value['ins_tname'].')</option>';
        }
	}
}