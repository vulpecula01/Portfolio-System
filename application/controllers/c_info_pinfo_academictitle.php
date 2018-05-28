<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_pinfo_academictitle extends Port_core {
	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('acr_tname','Academic Title (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_ename','Academic Title (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_tacronym','Acronyms (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_eacronym','Acronyms (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_academictitle','acat');

			$this->acat->acr_tname = $this->input->post('acr_tname');
			$this->acat->acr_ename = $this->input->post('acr_ename');
			$this->acat->acr_tacronym = $this->input->post('acr_tacronym');
			$this->acat->acr_eacronym = $this->input->post('acr_eacronym');

			$this->acat->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_pinfo_academictitle");
		}else{
			$this->load->model('m_port_academictitle','acat');
			$data['academictitle'] = $this->acat->getAll("port_user_authen.uaut_username");
			$this->output_admin('จัดการข้อมูลพื้นฐาน Academic Title','v_info_pinfo_academictitle', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('acr_tname','Academic Title (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_ename','Academic Title (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_tacronym','Acronyms (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('acr_eacronym','Acronyms (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_academictitle','acat');
			$this->acat->acr_tname = $this->input->post('acr_tname');
			$this->acat->acr_ename = $this->input->post('acr_ename');
			$this->acat->acr_tacronym = $this->input->post('acr_tacronym');
			$this->acat->acr_eacronym = $this->input->post('acr_eacronym');
			$this->acat->acr_id = $this->input->post('acr_id');
			$this->acat->update();

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
			$result['acr_tname'] = form_error('acr_tname');
			$result['acr_ename'] = form_error('acr_ename');
			$result['acr_tacronym'] = form_error('acr_tacronym');
			$result['acr_eacronym'] = form_error('acr_eacronym');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_academictitle','acat');
		$this->acat->acr_id = $this->input->post('acr_id');
		$delete = $this->acat->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_pinfo_academictitle");
	}

	function getById()
	{
		$this->load->model('m_port_academictitle','acat');
		$this->acat->acr_id = $this->input->post('acr_id');
		$acat = $this->acat->getByKey();
		echo '
		<input type="hidden" class="form-control" id="acr_id" name="acr_id" value="'.$acat['acr_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อเรื่องวิชาการ (TH) <small class="error acr_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<input type="text" class="form-control" id="acr_tname" name="acr_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$acat['acr_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">คำย่อ (TH) <small class="error acr_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<input type="text" class="form-control" id="acr_ename" name="acr_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$acat['acr_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameENG">ชื่อเรื่องวิชาการ (EN) <small class="error acr_tacronym"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<input type="text" class="form-control" id="acr_tacronym" name="acr_tacronym" placeholder="กรุณากรอกข้อมูล ..." value="'.$acat['acr_tacronym'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameENG">คำย่อ (EN) <small class="error acr_eacronym"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<input type="text" class="form-control" id="acr_eacronym" name="acr_eacronym" placeholder="กรุณากรอกข้อมูล ..." value="'.$acat['acr_eacronym'].'">
				</div>
			</div>
		</div>
		';
	}
}