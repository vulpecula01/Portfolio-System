<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_info_einfo_country extends Port_core {

	public function index()
	{
		$data = '';
		
		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('cou_tname','Country (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_ename','Country (EN)','trim|required|xss_clean');

		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();
			$this->load->model('m_port_country','con');

			$this->con->cou_tname = $this->input->post('cou_tname');
			$this->con->cou_ename = $this->input->post('cou_ename');

			$this->con->insert();

			if ($this->port->trans_status() === FALSE) {
				$this->port->trans_rollback();
				$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to add data!</p>');
			}else {
				$this->port->trans_commit();
				$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is Added!</p>');
			}
			redirect("c_info_einfo_country");
		}else{
			$this->load->model('m_port_country','con');
			$data['con'] = $this->con->getAll();
			$this->output_admin('Department','v_info_einfo_country', $data);
		}
		
	}

	public function edit()
	{

		$this->form_validation->set_error_delimiters('<font color="red">','</font>');
		$this->form_validation->set_rules('cou_id','Department ID','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_tname','Country (TH)','trim|required|xss_clean');
		$this->form_validation->set_rules('cou_ename','Country (EN)','trim|required|xss_clean');
		if ($this->form_validation->run() == true){
			$this->port = $this->load->database('port', TRUE);
			$this->port->trans_begin();

			$this->load->model('m_port_country','con');
			$this->con->cou_tname = $this->input->post('cou_tname');
			$this->con->cou_ename = $this->input->post('cou_ename');
			$this->con->cou_id = $this->input->post('cou_id');
			$this->con->update();

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
			$result['cou_tname'] = form_error('cou_tname');
			$result['cou_ename'] = form_error('cou_ename');
			$result['message'] = 'fail';
			echo json_encode($result);
		}
	}

	function deleteById()
	{
		$this->load->model('m_port_country','con');
		$this->con->cou_id = $this->input->post('cou_id');
		$delete = $this->con->delete();
		if($delete)
			$this->session->set_flashdata('result', '<p style="color:green;font-weight: bold;text-align:center">Data is delete!</p>');
		else
			$this->session->set_flashdata('result', '<p style="color:red;font-weight: bold;text-align:center">Unable to delete data!</p>');
		redirect("c_info_einfo_country");
	}

	function getById()
	{
		$this->load->model('m_port_country','con');
		$this->con->cou_id = $this->input->post('cou_id');
		$con = $this->con->getByKey();
		echo '
		<input type="hidden" class="form-control" id="cou_id" name="cou_id" value="'.$con['cou_id'].'"/>
		<div class="row">
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="nameTH">ชื่อประเทศ (TH) <small class="error cou_tname"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="cou_tname" name="cou_tname" placeholder="กรุณากรอกข้อมูล ..." value="'.$con['cou_tname'].'">
				</div>
			</div>
			<div class="form-group col-xs-12 col-sm-12 col-md-6">
				<label for="lnameTH">ชื่อประเทศ (EN) <small class="error cou_ename"></small></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-building"></i>
					</div>
					<input type="text" class="form-control" id="cou_ename" name="cou_ename" placeholder="กรุณากรอกข้อมูล ..." value="'.$con['cou_ename'].'">
				</div>
			</div>
		</div><!-- /.form group -->
		';
	}
}