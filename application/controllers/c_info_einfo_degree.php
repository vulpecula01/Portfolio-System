<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_degree extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('edl_id','Education Level','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_tname','Degree (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_ename','Degree (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_tacronym','Acronyms (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_eacronym','Degree (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_degree','deg');

			$this->deg->edl_id = $this->input->post('edl_id');
			$this->deg->deg_tname = $this->input->post('deg_tname');
			$this->deg->deg_ename = $this->input->post('deg_ename');
			$this->deg->deg_tacronym = $this->input->post('deg_tacronym');
			$this->deg->deg_eacronym = $this->input->post('deg_eacronym');
			$this->deg->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_degree");
		}else{
			$this->load->model('m_port_level','edl');
			$data['edl'] = $this->edl->getAll();
			$this->load->model('m_port_degree','deg');
			$data['deg'] = $this->deg->getAll();
			$this->output_admin('Degree','v_info_einfo_degree', $data);
		}
	}



	function getById()
	{
		$this->load->model('m_port_level','edl');
		$edl = $this->edl->getAll();
		$this->load->model('m_port_degree','deg');
		$this->deg->deg_id = $this->input->post('deg_id');
		$deg = $this->deg->getByKey();
		$select = '';
		foreach ($edl as $row) {
			if($deg['edl_id'] == $row['edl_id'])
				$select  = $select.'<option value="'.$row['edl_id'].'" selected>'.$row['edl_ename'].' ('.$row['edl_tname'].')</option>';
			else
				$select  = $select.'<option value="'.$row['edl_id'].'">'.$row['edl_ename'].' ('.$row['edl_tname'].')</option>';
		}
		echo '
		<input type="hidden" class="form-control" id="deg_id" name="deg_id" value="'.$deg['deg_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="nameTH">ระดับการศึกษา <small class="error edl_id"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-file-text"></i>
					</div>
					<select name="edl_id" class="form-control" data-error="Choose Education Level" required>
					'.$select.'
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ปริญญา (TH) <small class="error deg_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="deg_tname" name="deg_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$deg['deg_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">คำย่อ (TH) <small class="error deg_tacronym"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="deg_tacronym" name="deg_tacronym" placeholder="กรุณากรอกข้อมูล ..." value="'.$deg['deg_tacronym'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ปริญญา (EN) <small class="error deg_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="deg_ename" name="deg_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$deg['deg_ename'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">คำย่อ (EN) <small class="error deg_eacronym"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="deg_eacronym" name="deg_eacronym" placeholder="กรุณากรอกข้อมูล ..." value="'.$deg['deg_eacronym'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('deg_id','deg_id','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_id','Education Level','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_tname','Degree (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_ename','Degree (EN)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_tacronym','Acronyms (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('deg_eacronym','Degree (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_degree','deg');
			$this->deg->edl_id = $this->input->post('edl_id');
			$this->deg->deg_tname = $this->input->post('deg_tname');
			$this->deg->deg_ename = $this->input->post('deg_ename');
			$this->deg->deg_tacronym = $this->input->post('deg_tacronym');
			$this->deg->deg_eacronym = $this->input->post('deg_eacronym');
			$this->deg->deg_id = $this->input->post('deg_id');
			$this->deg->update();

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
			$result['edl_id'] = form_error('edl_id');
			$result['deg_tname'] = form_error('deg_tname');
			$result['deg_ename'] = form_error('deg_ename');
			$result['deg_tacronym'] = form_error('deg_tacronym');
			$result['deg_eacronym'] = form_error('deg_eacronym');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_degree','deg');
		$this->deg->deg_id = $this->input->post('deg_id');
		$delete = $this->deg->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_degree");
	}
}