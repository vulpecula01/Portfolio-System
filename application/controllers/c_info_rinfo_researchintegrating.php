<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_rinfo_researchintegrating extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('itt_ttitle','Research Integrating (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_etitle','Research Integrating (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_integratingtype','itt');

			$this->itt->itt_ttitle = $this->input->post('itt_ttitle');
			$this->itt->itt_etitle = $this->input->post('itt_etitle');
			$this->itt->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_rinfo_researchintegrating");
		}else{
			$this->load->model('m_port_integratingtype','itt');
			$data['itt'] = $this->itt->getAll();
			$this->output_admin('Research Integrating','v_info_rinfo_researchintegrating', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('itt_id','ret ID','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_ttitle','Research Integrating (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('itt_etitle','Research Integrating (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_integratingtype','itt');
			$this->itt->itt_ttitle = $this->input->post('itt_ttitle');
			$this->itt->itt_etitle = $this->input->post('itt_etitle');
			$this->itt->itt_id = $this->input->post('itt_id');
			$this->itt->update();

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
			$result['itt_ttitle'] = form_error('itt_ttitle');
			$result['itt_etitle'] = form_error('itt_etitle');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_integratingtype','itt');
		$this->itt->itt_id = $this->input->post('itt_id');
		$delete = $this->itt->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_rinfo_researchintegrating");
	}

	function getById()
	{
		$this->load->model('m_port_integratingtype','itt');
		$this->itt->itt_id = $this->input->post('itt_id');
		$itt = $this->itt->getByKey();
		echo '
		<input type="hidden" class="form-control" id="itt_id" name="itt_id" value="'.$itt['itt_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ประเภทการประสานงาน (TH) <small class="error itt_ttitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="itt_ttitle" name="itt_ttitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$itt['itt_ttitle'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ประเภทการประสานงาน (EN) <small class="error itt_etitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="itt_etitle" name="itt_etitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$itt['itt_etitle'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}