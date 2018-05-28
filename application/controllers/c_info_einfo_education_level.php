<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_education_level extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('edl_tname','Education Level (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_ename','Education Level (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_level','edl');

			$this->edl->edl_tname = $this->input->post('edl_tname');
			$this->edl->edl_ename = $this->input->post('edl_ename');

			$this->edl->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_education_level");
		}else{
			$this->load->model('m_port_level','edl');
			$data['edl'] = $this->edl->getAll();
			$this->output_admin('Department','v_info_einfo_education_level', $data);
		}
		
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('edl_id','Department ID','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_tname','Education Level (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('edl_ename','Education Level (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_level','edl');
			$this->edl->edl_tname = $this->input->post('edl_tname');
			$this->edl->edl_ename = $this->input->post('edl_ename');
			$this->edl->edl_id = $this->input->post('edl_id');
			$this->edl->update();

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
			$result['edl_tname'] = form_error('edl_tname');
			$result['edl_ename'] = form_error('edl_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_level','edl');
		$this->edl->edl_id = $this->input->post('edl_id');
		$delete = $this->edl->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_education_level");
	}

	function getById()
	{
		$this->load->model('m_port_level','edl');
		$this->edl->edl_id = $this->input->post('edl_id');
		$edl = $this->edl->getByKey();
		echo '
		<input type="hidden" class="form-control" id="edl_id" name="edl_id" value="'.$edl['edl_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ระดับการศึกษา (TH) <small class="error edl_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="edl_tname" name="edl_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$edl['edl_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ระดับการศึกษา (EN) <small class="error edl_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="edl_ename" name="edl_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$edl['edl_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}