<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_rinfo_researchstatus extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rst_ttitle','Research Status (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_etitle','Research Status (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_researchstatus','rst');

			$this->rst->rst_ttitle = $this->input->post('rst_ttitle');
			$this->rst->rst_etitle = $this->input->post('rst_etitle');
			$this->rst->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_rinfo_researchstatus");
		}else{
			$this->load->model('m_port_researchstatus','rst');
			$data['rst'] = $this->rst->getAll();
			$this->output_admin('Research Status','v_info_rinfo_researchstatus', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rst_id','ret ID','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_ttitle','Research Status (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_etitle','Research Status (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_researchstatus','rst');
			$this->rst->rst_ttitle = $this->input->post('rst_ttitle');
			$this->rst->rst_etitle = $this->input->post('rst_etitle');
			$this->rst->rst_id = $this->input->post('rst_id');
			$this->rst->update();

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
			$result['rst_ttitle'] = form_error('rst_ttitle');
			$result['rst_etitle'] = form_error('rst_etitle');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_researchstatus','rst');
		$this->rst->rst_id = $this->input->post('rst_id');
		$delete = $this->rst->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_rinfo_researchstatus");
	}

	function getById()
	{
		$this->load->model('m_port_researchstatus','rst');
		$this->rst->rst_id = $this->input->post('rst_id');
		$rst = $this->rst->getByKey();
		echo '
		<input type="hidden" class="form-control" id="rst_id" name="rst_id" value="'.$rst['rst_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">สถานะงานวิจัย (TH) <small class="error rst_ttitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rst_ttitle" name="rst_ttitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$rst['rst_ttitle'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">สถานะงานวิจัย (EN) <small class="error rst_etitle"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rst_etitle" name="rst_etitle" placeholder="กรุณากรอกข้อมูล ..." value="'.$rst['rst_etitle'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}