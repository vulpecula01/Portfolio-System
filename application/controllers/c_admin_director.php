<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin_director extends Port_core {


		public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('directorTH','director of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('directorEN','director of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year ','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		

		if ($this->form_validation->run() == true){



			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_director_admin','director');
			$this->load->model('m_port_user', 'user');

			$this->director->di_tname = $this->input->post('directorTH');
			$this->director->di_ename = $this->input->post('directorEN');
			$this->director->di_tlocation = $this->input->post('locationTH');
			$this->director->di_elocation = $this->input->post('locationEN');
			$this->director->di_date = $this->input->post('year');


			$this->port->trans_begin();
			$this->director->insert_data();


			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_admin_director");
		}else{
			$this->load->model('m_port_director_admin','director');
			$this->load->model('m_port_user', 'user');
			$data['director'] = $this->director->getAll();
			$data['user'] = $this->user->getAllName()->result_array();
			
	
			$this->output_admin('Director','v_admin_director', $data);
		}
	}


	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('directorTH','director of (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('directorEN','director of (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationTH','location (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('locationEN','location (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('year','Year ','trim|required|is_natural_no_zero|exact_length[4]|xss_clean');
		$this->form_validation->set_rules('researchName','Reciever','required|xss_clean');
		

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->load->model('m_port_director_admin','director');
			$this->load->model('m_port_user', 'user');
			$this->port->trans_begin();

			$this->director->di_tname = $this->input->post('directorTH');
			$this->director->di_ename = $this->input->post('directorEN');
			$this->director->di_tlocation = $this->input->post('locationTH');
			$this->director->di_elocation = $this->input->post('locationEN');
			$this->director->di_date = $this->input->post('year');
			$this->director->usr_id = $this->input->post('usr_id');
			$this->director->update();

			if ($this->port->trans_status() == FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to update data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is update!</p>');
			}

			$result['message'] = 'success';
			echo json_encode($result);
		}
		else
		{
			$result['directorTH'] = form_error('directorTH');
			$result['directorEN'] = form_error('directorEN');
			$result['locationTH'] = form_error('locationTH');
			$result['locationEN'] = form_error('locationEN');
			$result['year'] = form_error('year');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
		redirect('c_admin_director/index');
	}


	function delete()
	{
		$this->load->model('m_port_director_admin','director');
		$this->director->di_id = $this->input->post('di_id');
		$delete = $this->director->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_admin_director");
	}




	public function get(){
		$this->load->model('m_port_director_admin','director');
		$this->load->model('m_port_user', 'user');
		$name = $this->input->post('no_id');
		$director = $this->director->go($name);
		
		
		
foreach ($director as $value) { 

				echo '<div class="form-group">
		<input type="hidden" class="form-coutrol" id="editId" name="edb_id" value="'.$value['no_id'].'"/>
			 
               <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="inputletter">หัวข้อเรื่อง <small class="error letter_name"></small></label>
                                    <input type="text" class="form-control" id="let_name" 
                                    name="let_name" value="'.$value['let_name'].'" placeholder="กรอกหัวข้อเรื่อง">
                                </div>
                            </div>
                        </div>   
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
        </div>
</div>';		
                
						

								

			
		}

    }


}