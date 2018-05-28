<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_rinfo_researchlevel extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rlv_ttitle','Research Level (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rlv_etitle','Research Level (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_researchlevel','rlv');

			$this->rlv->rlv_ttitle = $this->input->post('rlv_ttitle');
			$this->rlv->rlv_etitle = $this->input->post('rlv_etitle');
			$this->rlv->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_rinfo_researchlevel");
		}else{
			$this->load->model('m_port_researchlevel','rlv');
			$data['rlv'] = $this->rlv->getAll();
			$this->output_admin('Research Level','v_info_rinfo_researchlevel', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rlv_id','ret ID','trim|required|xss_clean');
		$this->form_validation->set_rules('rlv_ttitle','Research Level (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rlv_etitle','Research Level (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_researchlevel','rlv');
			$this->rlv->rlv_ttitle = $this->input->post('rlv_ttitle');
			$this->rlv->rlv_etitle = $this->input->post('rlv_etitle');
			$this->rlv->rlv_id = $this->input->post('rlv_id');
			$this->rlv->update();

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
			$result['rlv_ttitle'] = form_error('rlv_ttitle');
			$result['rlv_etitle'] = form_error('rlv_etitle');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_researchlevel','rlv');
		$this->rlv->rlv_id = $this->input->post('rlv_id');
		$delete = $this->rlv->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_rinfo_researchlevel");
	}

	function getById()
	{
		$this->load->model('m_port_researchlevel','rlv');
		$this->rlv->rlv_id = $this->input->post('rlv_id');
		$rlv = $this->rlv->getByKey();
		echo '
		<input type="hidden" class="form-control" id="rlv_id" name="rlv_id" value="'.$rlv['rlv_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ระดับงานวิจัย (TH) <small class="error rlv_ttitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rlv_ttitle" name="rlv_ttitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$rlv['rlv_ttitle'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ระดับงานวิจัย (EN) <small class="error rlv_etitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rlv_etitle" name="rlv_etitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$rlv['rlv_etitle'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}