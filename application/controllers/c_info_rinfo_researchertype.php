<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_rinfo_researchertype extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rst_tname','Researcher Type (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_ename','Researcher Type (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_researchertype','rst');

			$this->rst->rst_tname = $this->input->post('rst_tname');
			$this->rst->rst_ename = $this->input->post('rst_ename');
			$this->rst->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_rinfo_researchertype");
		}else{
			$this->load->model('m_port_researchertype','rst');
			$data['rst'] = $this->rst->getAll();
			$this->output_admin('Researcher Type','v_info_rinfo_researchertype', $data);
		}
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('rst_id','ret ID','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_tname','Researcher Type (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('rst_ename','Researcher Type (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_researchertype','rst');
			$this->rst->rst_tname = $this->input->post('rst_tname');
			$this->rst->rst_ename = $this->input->post('rst_ename');
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
			$result['rst_tname'] = form_error('rst_tname');
			$result['rst_ename'] = form_error('rst_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_researchertype','rst');
		$this->rst->rst_id = $this->input->post('rst_id');
		$delete = $this->rst->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_rinfo_researchertype");
	}

	function getById()
	{
		$this->load->model('m_port_researchertype','rst');
		$this->rst->rst_id = $this->input->post('rst_id');
		$rst = $this->rst->getByKey();
		echo '
		<input type="hidden" class="form-control" id="rst_id" name="rst_id" value="'.$rst['rst_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ประเภทผู้วิจัย (TH) <small class="error rst_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rst_tname" name="rst_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$rst['rst_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ประเภทผู้วิจัย (EN) <small class="error rst_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="rst_ename" name="rst_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$rst['rst_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}