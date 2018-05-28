<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_pinfo_department extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('dep_tname','Department name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('dep_ename','Department name (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_department','dep');

			$this->dep->dep_tname = $this->input->post('dep_tname');
			$this->dep->dep_ename = $this->input->post('dep_ename');

			$this->dep->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_pinfo_department");
		}else{
			$this->load->model('m_port_department','dep');
			$data['dep'] = $this->dep->getAll("port_department.dep_ename");
			$this->output_admin('Department','v_info_pinfo_department', $data);
		}
		
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('dep_id','Department ID','trim|required|xss_clean');
		$this->form_validation->set_rules('dep_tname','Department name (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('dep_ename','Department name (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_department','dep');
			$this->dep->dep_tname = $this->input->post('dep_tname');
			$this->dep->dep_ename = $this->input->post('dep_ename');
			$this->dep->dep_id = $this->input->post('dep_id');
			$this->dep->update();

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
			$result['dep_tname'] = form_error('dep_tname');
			$result['dep_ename'] = form_error('dep_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_department','dep');
		$this->dep->dep_id = $this->input->post('dep_id');
		$delete = $this->dep->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_pinfo_department");
	}

	function getById()
	{
		$this->load->model('m_port_department','dep');
		$this->dep->dep_id = $this->input->post('dep_id');
		$dep = $this->dep->getByKey();
		echo '
		<input type="hidden" class="form-control" id="dep_id" name="dep_id" value="'.$dep['dep_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อภาควิชา (TH) <small class="error dep_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="dep_tname" name="dep_tname" placeholder="Fill department name in Thai" value="'.$dep['dep_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ชื่อภาควิชา (EN) <small class="error dep_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="dep_ename" name="dep_ename" placeholder="Fill department name in English" value="'.$dep['dep_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}